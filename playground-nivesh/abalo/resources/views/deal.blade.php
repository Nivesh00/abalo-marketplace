<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta id="csrf" content="{{ csrf_token() }}">
    <title>Angebot anzeigen</title>
</head>
<body>

@vite('resources/js/deal.js')

    <table id="deal">
        <thead>
        <tr>
            <th>Name</th>
            <th>Preis</th>
            <th>Beschreibung</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $row)
        <tr>
            <td>{{ $row->ab_name }}</td>
            <td>{{ $row->ab_price }}</td>
            <td>{{ $row->ab_description }}</td>
            <td><button id="{{ $row->id }}" @click="addDeal({{$row->id}})">
                    Angebot anbieten</button></td>
        </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>
