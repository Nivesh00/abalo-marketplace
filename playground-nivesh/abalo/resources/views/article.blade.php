<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta id="X-CSRF-TOKEN" content="{{ csrf_token() }}">
    <script src="{{ asset('js/M02/warenkorb.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/M02/warenkorb.css') }}">
    <title>Aufgabe 10</title>
</head>
<body>

<div id="cart_div">
    <div id="col-1">OTHERS</div>
    <div id="col-2">HOME</div>
    <div id="col-3">WARENKORB</div>
</div>

<div id="mybody">
    @if(empty($myResult))
        <div id="no_res">
        <div id="no_msg">Kein Artikel gefunden!
            Bitte versuchen Sie erneut.</div>
            {{--}}
        <img src="{{ '../storage/image_folder/Images_misc/no_result.jpg' }}"
             alt="Leeres Paket"> {{--}}
        </div>
    @else
        <table id="my_table">
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

</body>
</html>
