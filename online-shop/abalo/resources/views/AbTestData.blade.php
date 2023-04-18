<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aufgabe 5</title>
</head>
<body>
<main>
    <h1>Testdaten</h1>

    @foreach($all_equipment as $equipment)
        id: {{ $equipment->id }} && ab_testname: {{ $equipment->ab_testname }}
        <br/>
    @endforeach

</main>
</body>
</html>

