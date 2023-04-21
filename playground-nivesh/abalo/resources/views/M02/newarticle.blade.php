<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/M02/newarticle.js') }}"></script>
    <title>Aufgabe 9</title>
</head>
<body>

<div id="big_box">
@if(isset($status))
    @if($status)
        <div id="right_msg">Daten wurden gespeichert!</div>
    @else
        <div id="wrong_msg">Daten sind falsch! Bitte erneut versuchen
            .</div>
    @endif
@endif
<form id="my_form" style="width: 100%;">
    @csrf
</form>
    <div id="add_content"></div>
</div>
</body>
</html>
