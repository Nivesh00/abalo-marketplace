<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta id="csrf_id" name="csrf-token" content="{{ csrf_token() }}" />
    <script src="{{ asset('js/M02/newarticle.js') }}"></script>
    <title>Aufgabe 9</title>
</head>
<body>

<div id="big_box">
        <div id="right_msg"></div>
<form id="my_form" style="width: 100%;">
    @csrf
</form>
    <div id="add_content"></div>
</div>
</body>
</html>
