<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8"/>
    <meta id="csrf_id" name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="./css/newsite.css">
    <script src="./js/vue.js"></script>
</head>
<body>


<div id="app">

    <site-header></site-header>

    <div id="search-box">
    <div id="search-items">
        <div id="search-category" @click="show_items.categories = !show_items.categories">
            @{{ search_params.category }}
        </div>
        <div id="search-bar">
            <input v-model="search_params.name" @input="suggestions" type="text" maxlength="150"
                   required
                   placeholder="Artikelsuche">
        </div>
        <div id="search-it">search</div>
    </div>
        <div id="search-var">
        <ul v-if="show_items.categories">
            <li v-for="category in http_requests.categories">@{{ category.ab_name }}</li>
        </ul>
        <ul v-if="show_items.suggestions">
            <li v-for="suggestion in http_requests.suggestions_found">@{{ suggestion.name }}</li>
        </ul>
        </div>
    </div>

    <div v-if="!show_items.impressum" id="main_articles">
    <site-body :allarticles=http_requests.articles></site-body>
    <page-select :prev="search_params.page - 1" :next="search_params.page + 1"
                 @new-page="findPage"></page-select>
    </div>

    <div v-if="show_items.impressum">
        <impressum ></impressum>
    </div>

    <site-footer @clicked-impressum="toggleImpressum" :middle="misc.window_title"></site-footer>


</div>
<script type="module">
    import SiteHeader from './js/newsite/siteheader.js';
    import SiteBody from './js/newsite/sitebody.js';
    import SiteFooter from './js/newsite/sitefooter.js';
    import Impressum from './js/newsite/impressum.js';
    import PageSelect from './js/newsite/pageselect.js';

    let vm = Vue.createApp({
        components: {
            SiteHeader,
            SiteBody,
            SiteFooter,
            Impressum,
            PageSelect
        },
        data() {
            return {
                show_items: {
                    impressum: false,
                    suggestions: false,
                    categories: false
                },
                search_params: {
                    name: null,
                    category: 'Kategorie',
                    page: 1
                },
                http_requests: {
                    articles: {},
                    images: {},
                    suggesions: {},
                    categories: {},
                },
                misc: {
                    window_title: document.title
                }
            };
        },
        methods: {
            toggleImpressum() {
                this.$data.show_items.show_impressum = !this.$data.show_items.show_impressum;
            },
            getCategories(){
                let xhttp = new XMLHttpRequest();
                xhttp.open('GET', 'api/categories/*');
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.onreadystatechange = () => {
                    if(xhttp.readyState === 4) {
                        this.$data.http_requests.categories = JSON.parse(xhttp.responseText);
                    }
                }
                xhttp.send();
            },
            findPage(page){
                if (page > 3) this.$data.search_params.page = 3;
                else if(page < 1) this.$data.search_params.page = 1;
                else {
                    this.$data.search_params.page = page;
                    this.loadNewPage('*', '*');
                }
            },
            loadNewPage(name = '*') {

                let xhttp = new XMLHttpRequest();
                xhttp.open('GET', 'api/name/' + name + '/category/' + this.search_params.category +
                    '/page/' + this.$data.search_params.page);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.onreadystatechange = () => {
                    if(xhttp.readyState === 4) {
                        this.$data.http_requests.articles = JSON.parse(xhttp.responseText);
                    }
                }
                xhttp.send();
            },
            loadNewImages() {
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', 'api/name/' + name + '/category/' + category + '/page/' + page);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.setRequestHeader('X-CSRF-TOKEN', document.getElementById('csrf_id').content);
                xhttp.onreadystatechange = () => {
                    if(xhttp.readyState === 4) {
                        this.$data.images_path = JSON.parse(xhttp.responseText);
                    }
                }
                xhttp.send();
            },
            suggestions(){
                this.$data.show_Suggestion = true;

                if(this.$data.searchterm === null){
                    this.$data.show_Suggestion = false;
                    return;
                }


                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', 'api/name/' + this.$data.searchterm + '/category/' + category +
                    '/page/' +
                    page);
                xhttp.setRequestHeader('Content-Type', 'application/json');
                xhttp.setRequestHeader('X-CSRF-TOKEN', document.getElementById('csrf_id').content);
                xhttp.onreadystatechange = () =>
                {
                    if(xhttp.readyState === 4)
                    {
                        this.$data.suggestions = JSON.parse(xhttp.responseText);
                        this.$forceUpdate();
                        console.log(this.$data.articles);
                    }
                }
                xhttp.send();
            }
        }
    }).mount('#app');

    vm.getCategories();
    vm.loadNewPage();


</script>
</body>
</html>
