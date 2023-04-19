"use strict";

function CookieBox()
{
    let bigger_box = document.createElement('div');
    //bigger_box.style.position = 'absolute';
    bigger_box.style.top = '50%';
    bigger_box.style.left = '50%';
    bigger_box.style.marginRight = '-50%';
    bigger_box.style.transform = 'translate(15%, 10%)';
    bigger_box.style.padding = '10%';
    bigger_box.style.minWidth = '800px';

    let big_box = document.createElement('div');
    big_box.setAttribute('id', 'big_box');
    big_box.style.display = 'grid';
    big_box.style.gridTemplateColumns = 'auto 40%';
    big_box.style.bottom = '20%';
    big_box.style.width = '100%';
    big_box.style.height = '200px';
    big_box.style.backgroundColor = 'orange';
    big_box.style.padding = '3%';
    big_box.style.borderRadius = '30px';
    big_box.style.fontFamily = 'Bahnschrift, serif';
    big_box.style.minWidth = '530px';
    big_box.style.maxWidth = '800px';

    let col1 = document.createElement('div');
    col1.setAttribute('id', 'col1');
    col1.style.overflowX = 'hidden';
    col1.style.overflowY = 'scroll';
    col1.style.border = '2px solid black';
    col1.style.padding = '2%';
    col1.style.backgroundColor = 'lightblue';
    col1.innerText = '\nSo I\'m ready to attack, gonna lead the pack' +
        'Gonna get a touchdown, gonna take you out' +
        'That\'s right, put your pom-poms downs' +
        'Getting everybody fired up' +
        'A few times I\'ve been around that track' +
        'So it\'s not just gonna happen like that' +
        '\'Cause I ain\'t no hollaback girl' +
        'I ain\'t no hollaback girl' +
        '\nSo I\'m ready to attack, gonna lead the pack' +
        'Gonna get a touchdown, gonna take you out' +
        'That\'s right, put your pom-poms downs' +
        'Getting everybody fired up' +
        'A few times I\'ve been around that track' +
        'So it\'s not just gonna happen like that' +
        '\'Cause I ain\'t no hollaback girl' +
        'I ain\'t no hollaback girl' +
        '\nSo I\'m ready to attack, gonna lead the pack' +
        'Gonna get a touchdown, gonna take you out' +
        'That\'s right, put your pom-poms downs' +
        'Getting everybody fired up' +
        'A few times I\'ve been around that track' +
        'So it\'s not just gonna happen like that' +
        '\'Cause I ain\'t no hollaback girl' +
        'I ain\'t no hollaback girl';

    let col2 = document.createElement('div');
    col2.setAttribute('id', 'col2');
    big_box.append(col1, col2);

    col2.style.padding = '2%';
    col2.style.marginLeft = '5%';

    let check_box = document.createElement('div');
    check_box.setAttribute('id', 'check_box');
    check_box.innerHTML =

          '<table><thead><tr><th><th></th></th></tr></thead>'
        + '<tbody>'
        + '<tr>'
        + '<td>Essential cookies (Always on)</td>'
        + '<td class="cb"><input type="checkbox" value="essential=true" checked disabled></td>'
        + '</tr>'

        + '<tr>'
        + '<td>Advertisement cookies</td>'
        + '<td class="cb"><input id="adv" type="checkbox" value="advertisement=true"></td>'
        + '</tr>'

        + '<tr>'
        + '<td>Interest cookies</td>'
        + '<td class="cb"><input id="int" type="checkbox" value="interest=true"></td>'
        + '</tr>'

        + '</tbody>'
        + '</table>'

    check_box.style.backgroundColor = 'lightgrey';
    check_box.style.height = '60%';
    check_box.style.fontWeight = 'bold';
    check_box.style.borderRadius = '10px';
    check_box.style.padding = '2%';
    check_box.style.border = '2px solid white';

    col2.append(check_box);

    let empty_box = document.createElement('div');
    empty_box.style.height = '20%';
    col2.append(empty_box);

    let confirm = document.createElement('div');
    confirm.setAttribute('id', 'confirm');
    confirm.innerHTML =
        'Accept cookies';
    confirm.style.cursor = 'pointer';
    confirm.style.textAlign = 'center';
    confirm.style.borderColor = 'black';
    confirm.style.backgroundColor = 'red';
    confirm.style.borderRadius = '20px';
    confirm.style.padding = '10px';
    confirm.style.boxShadow = '3px 5px';

    confirm.addEventListener('click', function ()
    {
        confirm.style.boxShadow = '1px 3px';
        confirm.style.backgroundColor = 'green';
        let selection = document.querySelectorAll('input[type=checkbox]:checked');
        for(let i of selection)
        {
            document.cookie = i.value;
        }

        setTimeout(function ()
        {
            big_box.style.display = 'none';
        }, 1000);

    })
    col2.append(confirm);

    bigger_box.append(big_box);

    document.body.append(bigger_box);
}

window.onload = () => setTimeout(function ()
{
    CookieBox();
}, 1500);
