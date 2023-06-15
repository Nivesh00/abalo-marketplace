<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>WebSocket: Client</title>
</head>
<body>
  {{--}}
  <div id="app">
    <input id="input" type="text" size="40">
    <button id="send">Send</button>
    <hr>
    <ul id="log"></ul>
  </div>
  {{--}}
  <?php $msg =
"In Kürze verbessern wir Abalo für Sie!
Nach einer kurzen Pause sind wir wieder für Sie da!
Versprochen."
  ?>
  <div id="app">
      <textarea id="input" disabled cols="75" rows="5" style="resize: none">
{{$msg}}
      </textarea>
      <br/>
      <button id="send">Send</button>
      <button id="clear">Clear</button>
      <hr>
      <ul id="log"></ul>
  </div>
<script>
    function show(direction, msg) {
        let li = document.createElement('li');
        li.innerHTML = direction + ': ' + msg;
        document.getElementById('log').append(li);
    }

    let conn = new WebSocket('ws://localhost:8085/maintenance');
    conn.onmessage = function(e) {
        console.log('Received', e.data);
        show('received', e.data);
    };
    /*
    conn.onopen = function(e) {
        conn.send('I entered the room!');
    };
    */
    document.getElementById('send').addEventListener('click', () => {
        const msg = document.getElementById('input').value;
        conn.send(msg);
        show('sent', msg);
    });
    document.getElementById('clear').addEventListener('click', () => {
        document.getElementById('log').innerHTML = '';
    });
</script>
</body>
</html>
