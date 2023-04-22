"use strict";
/*
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
*/

const essential = true;

class CookieClass{

    static interest = false;
    static advertisement = false;

    static description =
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet semper nisi.' +
        ' Morbi ultricies non metus eu tempus. Sed ut fermentum eros. Donec vulputate auctor nisl, ' +
        'eget efficitur risus placerat non. Curabitur pretium varius accumsan. Curabitur eget nunc in ' +
        'metus efficitur feugiat. Mauris gravida leo mauris, et consectetur odio aliquet eget. In congue ' +
        'ex ut nulla sodales, et sollicitudin tellus fringilla. Duis euismod volutpat libero. Aliquam venenatis ' +
        'aliquet lacus venenatis suscipit. Fusce congue ac risus eget cursus. Quisque nec commodo ligula, efficitur ' +
        'sollicitudin sem. Morbi nec ullamcorper leo.' +
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet semper nisi.' +
        ' Morbi ultricies non metus eu tempus. Sed ut fermentum eros. Donec vulputate auctor nisl, ' +
        'eget efficitur risus placerat non. Curabitur pretium varius accumsan. Curabitur eget nunc in ' +
        'metus efficitur feugiat. Mauris gravida leo mauris, et consectetur odio aliquet eget. In congue ' +
        'ex ut nulla sodales, et sollicitudin tellus fringilla. Duis euismod volutpat libero. Aliquam venenatis ' +
        'aliquet lacus venenatis suscipit. Fusce congue ac risus eget cursus. Quisque nec commodo ligula, efficitur ' +
        'sollicitudin sem. Morbi nec ullamcorper leo.'
       ;

    static CookieBox()
    {
        document.body.style.fontFamily = 'Bahnschrift, Serif, serif';

        let empty_div = document.createElement('div');
        empty_div.style.height = '170px';


        let c_box = document.createElement('div');
        c_box.setAttribute('id', 'c_box');

        c_box.style.backgroundColor = 'lightcyan';
        c_box.style.display = 'grid';
        c_box.style.gridTemplateColumns = '300px 300px';
        c_box.style.width = '600px'
        c_box.style.height = '400px';
        //c_box.style.marginLeft = (window.innerWidth - 600) * 0.5 + 'px';
        c_box.style.columnGap = '0';
        c_box.style.marginLeft = 'auto';
        c_box.style.marginRight = 'auto';
        c_box.style.padding = '20px';
        c_box.style.borderRadius = '20px';
        c_box.style.border = '2px solid red';


        document.body.append(c_box);
        document.body.insertBefore(empty_div, c_box);
    }


    static CookieDescription()
    {
        let c_box = document.getElementById('c_box');

        let c_description = document.createElement('div');
        c_description.setAttribute('id', 'c_description');

        let inner_text = document.createElement('div');
        inner_text.setAttribute('id', 'inner_text');
        inner_text.style.margin = '30px 20px 0 20px';
        inner_text.style.padding = '20px';
        inner_text.style.height = '300px';
        inner_text.style.overflowY = 'auto';
        inner_text.style.background = 'white';
        inner_text.style.border = '2px solid black'
        inner_text.style.borderRadius = '20px';
        inner_text.innerText = this.description;

        //c_description.style.w

        c_description.append(inner_text);
        c_box.append(c_description);

    }


    static CookieChoice()
    {
        let c_box = document.getElementById('c_box');

        let c_choice = document.createElement('div');
        c_choice.setAttribute('id', 'c_choice');
        c_choice.style.borderLeft = '2px solid lightgrey';
        c_choice.style.padding = '20px';

        let close_div = document.createElement('div');
        close_div.setAttribute('id', 'close_div');

        close_div.innerHTML =
            '<button style="color: red;border: none; float: right; padding:' +
            ' 10px;' +
            ' background-color:' +
            ' lightcyan;"' +
            ' type="button"' +
            ' id="close">&#10006;</button>'

        let cross = close_div.getElementsByTagName('button');

        for(let btn of cross)
        {
            btn.addEventListener('mouseover', function ()
            {
                document.body.style.cursor = 'pointer';
                close_div.style.background = 'black';
            })
            btn.addEventListener('mouseout', function ()
            {
                document.body.style.cursor = 'default';
                close_div.style.background = 'lightcyan';
            })
            btn.addEventListener('click', function () {
                c_box.style.display = 'none';
                document.cookie = 'essential=true';

            })
        }
        //cross.style.border = '1px solid black';
        //cross.style.backgroundColor = 'lightcyan';

        c_choice.append(close_div);

        let empty_cookie = document.createElement('div');
        empty_cookie.setAttribute('id', 'empty_cookie');
        empty_cookie.style.height = '50px';

        c_choice.append(empty_cookie);

        let auswahl = document.createElement('dic');
        auswahl.setAttribute('id', 'auswahl');

        auswahl.innerHTML =
            '<table style="width: 250px">' +
            '<caption style="text-align: center; font-weight: bold">Cookie Auswahl</caption>' +
            '<thead><tr><th><th></th></th></tr></thead>'
            + '<tbody>'
            + '<tr>'
            + '<td>Essentielle Cookies </br>(immer an)</td>'
            + '<td class="cb"><input type="checkbox" value="essential=true" checked disabled></td>'
            + '</tr>'

            + '<tr>'
            + '<td>Werbung Cookies</td>'
            + '<td class="cb"><input id="adv" type="checkbox" value="advertisement=true"></td>'
            + '</tr>'

            + '<tr>'
            + '<td>Interesse Cookies</td>'
            + '<td class="cb"><input id="int" type="checkbox" value="interest=true"></td>'
            + '</tr>'

            + '</tbody>'
            + '</table>';

        let tr_arr = auswahl.getElementsByTagName('tr');
        for(let tr of tr_arr)
        {
            tr.style.height = '50px';

        }

        let cb_arr = auswahl.getElementsByClassName('cb');
        for(let cb of cb_arr)
        {
           cb.style.lineHeight = '3';
        }

        let speichern = document.createElement('div');
        speichern.setAttribute('id', 'speicher');
        speichern.style.height = '30px';
        speichern.innerHTML =
            '<button id="speichern" style="margin-left: 30px;padding: 10px;border-radius:' +
            ' 10px;margin-top:' +
            ' 50px;width:' +
            ' 210px;border: 2px' +
            ' solid' +
            ' saddlebrown;' +
            ' background-color:' +
            ' lightsalmon;' +
            ' text-align: center"' +
            ' type="button">Auswahl' +
            ' speichern</button>'


        //let speichern_btn = document.getElementById('speichern');
        let speichern_btn = speichern.getElementsByTagName('button')[0];

        speichern_btn.addEventListener('mouseover', function ()
        {
            document.body.style.cursor = 'pointer';
            speichern_btn.style.backgroundColor = 'lightgreen';
        })
        speichern_btn.addEventListener('mouseout', function ()
        {
            document.body.style.cursor = 'initial';
            speichern_btn.style.backgroundColor = 'lightsalmon';
        })
        speichern_btn.addEventListener('click', function()
        {
            let selection = document.querySelectorAll('input[type=checkbox]:checked');

            document.cookie = 'essential=true';
            for(let ckie of selection) {
                if (ckie.value === 'advertisement=true') {
                    CookieClass.advertisement = true;
                    document.cookie = 'advertisement=true';
                }
                if (ckie.value === 'interest=true')
                {
                    CookieClass.interest = true;
                    document.cookie = 'interest=true';
                }
            }


            speichern_btn.innerHTML = speichern_btn.innerHTML.replace('Auswahl speichern',
                'Auswahl gespeichert &#10004;');
            speichern_btn.style.backgroundColor = 'lightgrey';
            speichern_btn.addEventListener('mouseover', function ()
            {
                document.body.style.cursor = 'pointer';
                speichern_btn.style.backgroundColor = 'lightgray';
            })
            speichern_btn.addEventListener('mouseout', function ()
            {
                document.body.style.cursor = 'initial';
                speichern_btn.style.backgroundColor = 'lightgray';
            })


            setTimeout(function ()
            {
                c_box.style.display = 'none';

            },2000);

        })

        c_choice.append(auswahl);

        c_choice.append(speichern);

        c_box.append(c_choice);
    }

    static CreateCookiePopUp()
    {
        this.CookieBox();
        this.CookieDescription();
        this.CookieChoice();
    }
}

window.onload = () => setTimeout(function ()
{
    if(document.cookie.indexOf('essential=true') === -1)
        CookieClass.CreateCookiePopUp();
}, 2000);
