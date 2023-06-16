<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <script src="./js/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!--<link rel="stylesheet" href="/build/assets/artikeleingabe-520a972e.css">-->
    @vite(['public/css/artikeleingabe.scss'])
</head>
<body>
<div id="app">
    <article-input></article-input>
</div>
<script>
    const app = Vue.createApp({});

    app.component('ArticleInput', {
        template: `
            <div class="article-form">
            <h2 class="article-form__title">Artikeleingabe</h2>
            <form class="article-form__form" @submit.prevent="submitArticle">
                <div class="article-form__field">
                    <label for="name" class="article-form__label">Name:</label>
                    <input type="text" id="name" v-model="article.name" class="article-form__input" required>
                </div>
                <div class="article-form__field">
                    <label for="price" class="article-form__label">Preis:</label>
                    <input type="number" id="price" v-model="article.price" class="article-form__input" required>
                </div>
                <div class="article-form__field">
                    <label for="description" class="article-form__label">Beschreibung:</label>
                    <textarea id="description" v-model="article.description" class="article-form__input" required></textarea>
                </div>
                <div class="article-form__field">
                    <button type="submit" class="article-form__button">Artikel hinzufügen</button>
                </div>
            </form>
            </div>

        `,
        data() {
            return {
                article: {
                    name: '',
                    price: 0,
                    description: ''
                }
            };
        },
        methods: {
            submitArticle() {
                const jsonData = JSON.stringify(this.article);

                axios.post('/api/articles', jsonData, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => {
                        console.log(response.data);
                        this.article = {
                            name: '',
                            price: 0,
                            description: ''
                        };
                    })
                    .catch(error => {
                        console.error(error);
                    });
            }
        },
        mounted() {
        }
    });

    app.mount('#app');
</script>
</body>
</html>
