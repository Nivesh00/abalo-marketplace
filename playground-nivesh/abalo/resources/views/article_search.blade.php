<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/article_search.css') }}">
    <script src="{{ asset('js/vue.js') }}"></script>
    <title>Artikel Suche</title>
</head>
<body>

<div id="big-container">
    <div id="category">
        <select @change="update_data" v-model="current_category" name="article-category">
            <option selected value="*">Keine Kategorie</option>
            <option v-for="category in categories" :value="category" :key="category.id">
                @{{category}}</option>
        </select>
    </div>
    <div id="search-bar">
        <input v-model="current_input" @input="update_data"
               id="search-article" type="text" placeholder="Artikel suchen">
        <ul id="results">
            <li class="article-item" v-for="data in current_data" :key="data.id"
                @click="current_input = data.name; current_data = [data]">
                <div class="item-name">@{{ data.name }}</div>
                <div class="item-category">@{{ data.category }}</div>
            </li>
        </ul>
    </div>
    <div @click="GoToItem" id="search-icon">
        <label for="search-article">
            <img  src="{{ asset
            ('storage/image_folder/Images_misc/search-icon.png') }}"
                 alt="search icon">
        </label>
    </div>
</div>

<script>

    'use strict';
    let all_items = {};
    let all_articles = [];
    let all_categories = [];

    let xhttp_categories = new XMLHttpRequest();
    xhttp_categories.open('GET', 'api/categories/*');
    xhttp_categories.setRequestHeader('Accept', 'application/json');
    xhttp_categories.onreadystatechange = () => {
        if(xhttp_categories.readyState === 4){
            let data = JSON.parse(xhttp_categories.responseText);
            for(let row of data){
                if(!all_categories.includes(row['ab_name']))
                    all_categories.push(row['ab_name'])
            }
        }
    }

    xhttp_categories.send();

    let big_container = Vue.createApp({
        data(){
            return{
                current_data: null,
                current_input: null,
                categories: all_categories,
                current_category: '*'
            };
        },
        methods:{
            update_data(){

                if(this.$data.current_input === null || this.$data.current_input === ''
                || this.$data.current_input.length < 3) {
                    this.$data.current_data = null;
                    return;
                }

                let new_data = {};
                let letter = this.$data.current_input;
                let cat = this.$data.current_category || '*';
                let i = 0;

                let xhttp = new XMLHttpRequest();
                xhttp.open('GET', 'api/name/' + letter + '/category/' + cat);
                xhttp.setRequestHeader('Accept', 'application/json');
                xhttp.onreadystatechange = () => {
                    if(xhttp.readyState === 4){
                        let data = JSON.parse(xhttp.responseText);
                        let i = 0;
                        for(let row in data){
                                new_data[i] = {
                                    name: data[row]['article_name'],
                                    category: data[row]['article_category']
                                }
                                i++;
                            }
                        this.$data.current_data = new_data;
                    }
                }
                xhttp.send();
            },
            GoToItem(){
                window.location.replace("/articles?search="+ this.$data.current_input);
            }
        }
    }).mount('#big-container')


    let get_categories = setInterval(function(){
        if(all_categories.length) {
            clearInterval(get_categories);
            big_container.$data.categories = all_categories;
            big_container.$forceUpdate();
        }
    }, 50);

</script>

</body>
</html>
