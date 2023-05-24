<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/article_search.css') }}">
    <title>Artikel Suche</title>
</head>
<body>

<div id="big-container">
    <div id="search-icon">
        <label for="search-article">

        </label>
    </div>
    <div id="search-bar">
        <input id="search-article" type="text" placeholder="Artikel suchen">
    </div>
    <div id="search-button">
        suchen
    </div>
</div>

<script>

    'use strict';

    let data = {};

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', 'api/articles');
    xhttp.setRequestHeader('Accept', 'application/json');
    xhttp.onreadystatechange = () => {
        if(xhttp.readyState === 4){
            data = xhttp.responseText;
            console.log(data);
        }
    }

    xhttp.send();

</script>

</body>
</html>
