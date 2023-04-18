<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Loggin Page</title>
</head>
<body>

<form id="my_form" action="/login_verify" method="post">

    @csrf
    <table>
        <thead>
        <tr><th></th><th></th></tr>
        </thead>

        <tbody>
        <tr>
            <td><label for="email">Emailadresse</label></td>
            <td><input id="email" type="email" name="useremail" required
                placeholder="e.g. user@email.com"></td>
        </tr>
        <tr>
            <td><label for="pass">Passwort</label></td>
            <td><input id="pass" type="password" name="password"
                       placeholder="no password available"></td>
        </tr>
        </tbody>
    </table>

    <button id="submit_btn" type="submit">Einloggen</button>
</form>

@if(isset($loggin) && !$loggin)
    <div>Email oder Passwort ist falsch</div>
    <script>
        //document.cookie = 'submitted' + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    </script>
@endif

<script>
    /*
    "use strict";
    let my_form = document.getElementById('my_form');
    let msg = document.getElementById('msg');

    if(document.cookie.indexOf('submitted=true') === -1)
    {
        my_form.style.display = 'initial';
        msg.style.display = 'none';
    }
    else
    {
        my_form.style.display = 'none';
        msg.style.display = 'initial';
    }

    my_form.addEventListener('submit', function()
    {
        setTimeout(function (){}, 1500);
        document.cookie = 'submitted=true';

    })
     */
</script>
</body>
</html>
