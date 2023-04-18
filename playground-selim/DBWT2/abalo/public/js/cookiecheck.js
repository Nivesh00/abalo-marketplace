var cookiemodal = document.getElementById("cookie_modal");
var cookies = document.cookie.split(';');
console.log(cookies);
var cookie_exist;

for (var i = 0; i < cookies.length; i++)
{
    if(cookies[i] === " cookieName=cookieAccepted")
        cookie_exist = true;
    else
        cookie_exist = false;
}

if(!cookie_exist)
    cookiemodal.show()

function cookie_accept()
{
    document.cookie = "cookieName=cookieAccepted; expires=Fri, 16 Apr 2024 23:59:59 GMT; path=/";
    console.log("Cookie Set");
    cookiemodal.close();
}

function close_cookie_modal()
{
    cookiemodal.close();
}

