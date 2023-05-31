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
    <title>Aufgabe 10</title>
</head>
<body id="article-app">

<div id="showAll" @click="toggleShowAll" :style="{ marginTop: showTop}">
<div></div>
</div>

<div id="cart_div" v-show="showAll">
    <div id="col-1">OTHERS</div>
    <div id="col-2">HOME</div>
    <div id="col-3">WARENKORB</div>
</div>

<div id="mybody">
    @if(empty($myResult))
        <div id="no_res">
        <div id="no_msg">Kein Artikel gefunden!
            Bitte versuchen Sie erneut.</div>
        </div>
    @else
        <table id="my_table" :style="{ marginTop: tableTop, marginBottom: tableBottom }">
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
                    <td class="name">{{$result->ab_name}}</td>
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

</body>
</html>


<script>
    let article_app = Vue.createApp({
        data(){
            return{
                showAll: true,
                tableTop: '150px',
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
            }
        }
    }).mount('#article-app');
</script>
