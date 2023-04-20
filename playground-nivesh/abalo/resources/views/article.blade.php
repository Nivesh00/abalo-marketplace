<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/M02/warenkorb.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/M02/warenkorb.css') }}">
    <title>Aufgabe 10</title>
</head>
<body>

<header>
    <div id="big_container">
        <div></div>
        <div></div>
        <div id="warenkorb">Mein Warenkorb</div>
        <div></div>
    </div>
</header>
    <div id="big_page">
    <div></div>
    <div>
    <main>
    <h1>Artikelübersicht</h1>

    @if(empty($myResult))
        <img src="{{ '../storage/image_folder/Images_misc/no_result.jpg' }}"
             alt="Leeres Paket">
        <br/>
        Kein Artikel gefunden!
        Bitte versuchen Sie erneut.
    @else
        <table id="my_table">
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Preis</th>
                <th>Beschreibung</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($myResult as $result)
                <tr>
                    <td id="img_cell">
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
                    <td id="name">{{$result->ab_name}}</td>
                    <td id="price">{{$result->ab_price}}€</td>
                    <td id="description">{{$result->ab_description}}</td>
                    <td id="add"></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

</main>
    </div>
    <div></div>
    </div>
</body>
</html>
