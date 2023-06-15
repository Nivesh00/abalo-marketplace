<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/warenkorb.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/M02/warenkorb.css') }}">
    <link rel="stylesheet" href="{{ asset('css/article_search.css') }}">
    <title>Aufgabe 10</title>
</head>
<body>
{{--}}

<div id="big-container" style="margin-top: 200px">

    <!--<div id="category">
        <select @change="update_data" v-model="current_category" name="article-category">
            <option selected value="*">Keine Kategorie</option>
            <option v-for="category in categories" :value="category" :key="category.id">
                @{{category}}</option>
        </select>
    </div>-->
    <div id="search-bar">
        <input v-model="current_input" @input="update_data" @keyup.enter="GoToItem"
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

{{--}}
<div id="article-app">

<div id="showAll" @click="toggleShowAll" :style="{ marginTop: showTop}">
<div></div>
</div>

<div id="cart_div" v-show="showAll">
    <div id="col-1">OTHERS</div>
    <div id="col-2">HOME</div>
    <div id="col-3">WARENKORB</div>
</div>

    <div id="deal" style="margin-top: 200px"></div>

<div id="mybody" :style="{ marginTop: showTop, marginBottom: tableBottom }" style="margin-top:
20px">
    @if(empty($myResult))
        <div id="no_res">
        <div id="no_msg" style="z-index: 0">Kein Artikel gefunden!
            Bitte versuchen Sie erneut.</div>
        </div>
    @else
        <table id="my_table" >
            <caption><h1>Artikelübersicht</h1></caption>
            <thead>
            <tr>
                <th id="img_th"></th>
                <th>Name</th>
                <th>Preis</th>
                <th>Beschreibung</th>
                <th id="add_th"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($myResult as $result)
                <tr>
                    <td class="img_cell">
                        @if(file_exists(public_path('/storage/image_folder/M1_pictures/' .
                        $result->id .'
                        .png')))

                            <img src="{{ '../storage/image_folder/M1_pictures/' .
                            $result->id .'.png' }}"
                                 alt="Bild konnte nicht geladen werden für png">

                        @elseif(file_exists(public_path('/storage/image_folder/M1_pictures/'
                        . $result->id .'.jpg')))

                            <img class="product" src="{{ '../storage/image_folder/M1_pictures/' .
                            $result->id .'.jpg' }}"
                                 alt="Bild konnte nicht geladen werden für jpg">

                        @else
                            <img class="product" src="{{ '../storage/image_folder/Images_misc/no_image_found.png' }}"
                                 alt="Kein Bild verfügbar">
                        @endif
                    </td>
                    <td class="name" id="{{'id is ' . $result->id}}">{{$result->ab_name}}</td>
                    <td class="price">{{$result->ab_price}}€</td>
                    <td class="description">{{$result->ab_description}}</td>
                    <td class="add" id="{{$result->id}}"></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif
</div>

<footer v-if="showAll">
    <a class="f-act" id="f-back"
       href="/articles?search={{$search}}&page={{$page - 1}}">&#171;</a>
    <div id="f-middle">

        @if($pagerange[0] > 1)
            <div class="pg"><a href="/articles?search={{$search}}&page=1">1</a></div>
        @endif
        @if($pagerange[0] - 1 > 1)
            <div class="dots">...</div>
        @endif

        @foreach($pagerange as $pg)
            <div class="pg">
                <a  @if($pg == $page) id="pg-curr" @endif
                href="/articles?search={{$search}}&page={{ $pg }}">{{ $pg }}</a>
            </div>
        @endforeach

        @if($pages - end($pagerange) > 1)
            <div class="dots">...</div>
        @endif
        @if(end($pagerange) < $pages)
            <div class="pg">
                <a href="/articles?search={{$search}}&page={{ $pages }}">{{ $pages }}</a>
            </div>
        @endif

    </div>
    <a class="f-act" id="f-next"
       href="/articles?search={{$search}}&page={{$page + 1}}">&#187;</a>
</footer>

</div>
</body>
</html>


<script>
    'use strict';

    let article_app = Vue.createApp({
        data(){
            return{
                showAll: true,
                tableBottom: '100px',
                showTop: '150px'
            }
        },
        methods: {
            toggleShowAll(){
                this.$data.showAll = !this.$data.showAll;
                this.$data.tableTop = this.$data.tableTop === '150px' ? '10px' : '150px';
                this.$data.tableBottom = this.$data.tableBottom === '100px' ? '10px' : '100px';
                this.$data.showTop = this.$data.showTop === '150px' ? '10px' : '150px';

                document.getElementById('big-container').style.marginTop =
                    document.getElementById('big-container').style.marginTop === '200px' ?
                        '20px' : '200px';
            }
        }
    }).mount('#article-app');

    let all_items = {};
    let all_articles = [];
    let all_categories = [];

    let conn = new WebSocket('ws://localhost:8085/deal');
    conn.onmessage = msg => {

        if(msg.data.includes('Der Artikel')){

            let deal = document.getElementById('deal');

            let array = document.getElementsByClassName('name');
            for (let name of array){
                if ('Der Artikel ' + name.innerText +
                ' wird nun günstiger angeboten! Greifen Sie schnell zu' !== msg.data)
                    continue;
                deal.innerText = msg.data;
            }

            deal.addEventListener('click', function(){
                article_app.$data.showAll = value;
                deal.style.display = 'none';
            });
        }
        else{
            document.getElementById(msg.data).parentElement.style.backgroundColor = 'yellow';
            console.log(msg.data)
        }
    }

    /*
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
                current_category: '*',
                conTop: '300px'

            };
        },
        methods:{
            update_data(){

                if(this.$data.current_input === null || this.$data.current_input === ''
                    || this.$data.current_input.length < 1) {
                    this.$data.current_data = [];
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
        */
    /*
    let get_categories = setInterval(function(){
        if(all_categories.length) {
            clearInterval(get_categories);
            big_container.$data.categories = all_categories;
            big_container.$forceUpdate();
        }
    }, 50);
    */
</script>
