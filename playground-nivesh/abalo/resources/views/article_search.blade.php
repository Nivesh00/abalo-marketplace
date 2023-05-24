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
    <div id="search-icon">
        <label for="search-article">

        </label>
    </div>
    <div id="search-bar">
        <input v-model="current_input" @input="update_data" id="search-article" type="text"
               placeholder="Artikel suchen">
        <ul id="results">
            <li v-for="data in current_data" :key="data.id" @click="current_input = data">
                @{{ data }}
            </li>
        </ul>
    </div>
    <div id="search-button">
        suchen
    </div>
</div>

<script>

    'use strict';
    let all_articles = []
    let data = [];

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'api/articles/*');
    xhttp.setRequestHeader('Accept', 'application/json');
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === 4){
            all_articles = JSON.parse(xhttp.responseText);
            for(let row of all_articles){
                data.push(row['ab_name']);
            }
            all_articles = data;
            console.log(data, all_articles);
        }
    }

    xhttp.send();

    let big_container = Vue.createApp({
        data(){
            return{
                current_data: null,
                current_input: null
            };
        },
        methods:{
            update_data(){

                if(this.$data.current_input === '') {
                    this.$data.current_data = null;
                    return;
                }

                let new_data = [];
                for(let name of all_articles){
                    if(!name.toLowerCase().indexOf(this.$data.current_input.toLowerCase())){
                        new_data.push(name);
                    }
                }
                this.$data.current_data = new_data;

            }
        }
    }).mount('#big-container')

</script>

</body>
</html>
