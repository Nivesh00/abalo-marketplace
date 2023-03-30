<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aufgabe 10</title>
</head>
<body>
<main>
    <h1>Artikelübersicht</h1>

    @if(empty($myResult))
        <img src="{{ '../storage/image_folder/Images_misc/no_result.jpg' }}"
             alt="Leeres Paket">
        <br/>
        Kein Artikel gefunden!
        Bitte versuchen Sie erneut.
    @else
        <table>
            <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Preis</th>
                <th>Beschreibung</th>
            </tr>
            </thead>
            <tbody>
            @foreach($myResult as $result)
                <tr>
                    <td>
                        @if(file_exists(public_path('/storage/image_folder/M1_pictures/' .
                        $result->id .'
                        .png')))

                            <img src="{{ '../storage/image_folder/M1_pictures/' .
                            $result->id .'.png' }}"
                                 alt="Bild konnte nicht geladen werden für png">

                        @elseif(file_exists(public_path('/storage/image_folder/M1_pictures/'
                        . $result->id .'.jpg')))

                            <img src="{{ '../storage/image_folder/M1_pictures/' .
                            $result->id .'.jpg' }}"
                                 alt="Bild konnte nicht geladen werden für jpg">

                        @else
                            <img src="{{ storage_path
                            ('../storage/Images_misc/no_image_found.png') }}"
                                 alt="Kein Bild verfügbar">
                        @endif
                    </td>
                    <td>{{$result->ab_name}}</td>
                    <td>{{$result->ab_price}}</td>
                    <td>{{$result->ab_description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @endif

</main>
</body>
</html>
