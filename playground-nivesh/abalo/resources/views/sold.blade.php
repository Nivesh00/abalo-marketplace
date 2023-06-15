<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Artikel verkauft!</title>
    <script>
        document.cookie = "user=5"
    </script>
</head>
<body>

<div id="app">
    <h4>Verkaufte Artikeln</h4>
    <hr/>
    <ul id="log"></ul>
</div>



<script>
    let user = document.cookie.split('user=')[1].split(';')[0];
    let conn = new WebSocket('ws://localhost:8085/sold/user=' + user );
    conn.onmessage = (msg) => {
        let li = document.createElement('li');
        li.innerText = msg.data;
        document.getElementById('log').append(li);
    }
</script>

</body>
</html>
