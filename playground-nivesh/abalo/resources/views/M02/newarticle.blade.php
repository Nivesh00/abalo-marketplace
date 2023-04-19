<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/M02/newarticle.js') }}"></script>
    <title>Aufgabe 9</title>
</head>
<body>
@if(isset($status))
    @if($status)
        <div>Daten wurden gespeichert!</div>
    @else
        <div>Daten sind falsch oder Name existiert bereits! Bitte erneut versuchen.</div>
    @endif
@endif
<form id="my_form">
    @csrf
</form>
</body>
</html>
