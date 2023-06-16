export default {
    template: `

        <div>
        <h1>Artikelübersicht</h1>
        <!-- <link rel="stylesheet" href="/build/assets/artikelsuche-c3131965.css">-->
        <div id="app">
            <input v-model="searchTerm" @input="filterArticles" type="text" placeholder="Artikelsuche"
                   class="articleInput">
            <table class="articleTable">
                <thead>
                <tr class="articleTable__headerRow">
                    <th class="articleTable__headerCell">Bild</th>
                    <th class="articleTable__headerCell">Name</th>
                    <th class="articleTable__headerCell">Preis</th>
                    <th class="articleTable__headerCell">Kaufen</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="article in filteredArticles" :key="article.id" class="articleTable__row">
                    <td class="articleTable__cell articleTable__imageCell">
                        <img :src="'/storage/image_folder/M1_pictures/' + article.id + '.jpg'" alt="Bild nicht geladen" class="articleTable__image">
                    </td>
                    <td class="articleTable__cell">{{ article.name }}</td>
                    <td class="articleTable__cell">{{ article.price }}€</td>
                    <td class="articleTable__buy"><button id="verkaufButton" @click="verkaufSimulieren(article.id)">+</button></td>
                </tr>
                </tbody>
            </table>
            <div class="navButton">
                <button @click="decrementOffset" class="navButton__prev">&lt;</button>
                <button @click="incrementOffset" class="navButton__next">&gt;</button>
            </div>
        </div>
        </div>
    `,
    data() {
        return {
            searchTerm: '',
            articles: [],
            offset: 0,
        };
    },
    created() {
        this.websocket = new WebSocket('ws://localhost:8086/verkauf');

        this.websocket.onmessage = (event) => {
            const message = JSON.parse(event.data);
        };

        this.websocket.onerror = (error) => {
            console.error('WebSocket Error:', error);
        };
    },


    methods: {
        verkaufSimulieren(articleId) {
            const message = {
                event: 'verkauf_simulieren',
                data: {
                    articleId: articleId
                }
            };

            console.log(articleId, "wurde verkauft");

            fetch(`/api/articles/${articleId}/sold`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(message)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Request failed with status ' + response.status);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Article sold:', data);
                })
                .catch(error => {
                    console.error('Error selling article:', error);
                    // Log the response text for further analysis
                    error.response.text().then(text => {
                        console.log('Response text:', text);
                    });
                });
        },




        filterArticles() {
            if (this.searchTerm.length >= 3) {
                fetch(`/api/articles?search=${this.searchTerm}&offset=0`)
                    .then(response => response.json())
                    .then(data => {
                        this.articles = data;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            } else {
                this.getAllArticles();
            }
        },
        getAllArticles() {
            fetch(`/api/articles?offset=${this.offset}`)
                .then(response => response.json())
                .then(data => {
                    this.articles = data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        incrementOffset() {
            this.offset += 5;
            this.filterArticles(); //suche mit neuem offset
        },
        decrementOffset() {
            if (this.offset >= 5) {
                this.offset -= 5;
            } else {
                this.offset = 0;
            }
            this.filterArticles(); //suche mit neuem offset
        },
    },

    // ...

    beforeDestroy() {
        // WebSocket-Verbindung schließen
        this.websocket.close();
    },


    computed: {
        filteredArticles() {
            if (this.searchTerm.length >= 3) {
                return this.articles.filter(article => {
                    return article.name.toLowerCase().includes(this.searchTerm.toLowerCase());
                });
            } else {
                return this.articles;
            }
        }
    },
    mounted() {
        this.getAllArticles();
    }

};
