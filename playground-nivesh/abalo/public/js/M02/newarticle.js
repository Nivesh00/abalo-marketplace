"use strict";
function NewArticle()
{
    let form = document.getElementById('my_form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '/newarticle_verify');
    //form.setAttribute('id', 'article_form');

    let form_content = document.createElement('div');
    form_content.style.width = '100%';
    form_content.innerHTML =

        //'<input type="hidden" name="_token" value="{{ csrf_token() }}"' +
        '<table id="add_table" style="width: 100%">' +
        '<thead><tr><th></th><th></th></tr></thead>' +
        '<tbody>' +

        '<tr>' +
        '<td class="lbl"><label for="name">Name des Articles<sup>*</sup></label></td>' +
        '<td><input class="inp" id="name" name="name" type="text"  placeholder="z.B. Auto"></td>' +
        '</tr>' +

        '<tr>' +
        '<td class="lbl"><label for="price">Preis des Articles<sup>*</sup></label></td>' +
        '<td><input class="inp" id="price" name="price" type="text"  placeholder="z.B.' +
        ' 100"></td>' +
        '</tr>' +

        '<tr>' +
        '<td class="lbl"><label for="description">Beschreibung</label></td>' +
        '<td><textarea class="inp" id="description" name="description" type="text"' +
        ' placeholder="Eine Beschreibung des Artikels"></textarea></td>' +
        '</tr>' +

        '<tr><td style="font-weight: lighter; font-size: small">Felder makiert mit <su' +
        'p>*</sup> sind' +
        ' pflicht</td><td></td></tr>' +

        '</tbody>' +
        '</table>';

    let wrong_name = document.createElement('div');
    wrong_name.setAttribute('id', 'wrong_name');
    wrong_name.style.display = 'none';
    wrong_name.innerText = 'Name ist falsch oder ungültig';

    let wrong_price = document.createElement('div');
    wrong_price.setAttribute('id', 'wrong_price');
    wrong_price.style.display = 'none';
    wrong_price.innerText = 'Preis ist falsch oder ungültig';

    let submit_btn = document.createElement('button');
    //submit_btn.setAttribute('textContent', 'speichern');
    submit_btn.setAttribute('id', 'submit_btn');
    submit_btn.innerText = 'speichern';
    submit_btn.addEventListener('click', function (event) {
        let name_akl = document.getElementById('name').value.trim();
        let price_akl = document.getElementById('price').value.trim();

        wrong_name.style.display = 'none';
        if(document.getElementById('right_msg') != null)
            document.getElementById('right_msg').style.display ='none';
        //document.getElementById('right_msg').style.display = 'none';

        //document.getElementById('wrong_msg').style.display = 'block';
        if(name_akl.length <= 0 && price_akl <= 0)
        {

            wrong_name.innerText = 'Name und Preis sind falsch oder ungültig!';
            setTimeout(function()
            {
                wrong_name.style.display = 'block';
            }, 1000);
            event.preventDefault();
        }
        else if (name_akl.length <= 0)
        {
            wrong_name.innerText = 'Name ist falsch oder ungültig';
            setTimeout(function()
            {
                wrong_name.style.display = 'block';
            }, 1000);
            event.preventDefault();
        }
        else if (price_akl <= 0)
        {
            wrong_name.innerText = 'Preis ist falsch oder ungültig!';
            setTimeout(function()
            {
                wrong_name.style.display = 'block';
            }, 1000);
            event.preventDefault();
        }
        else
            document.getElementById('article_form').submit();

        console.log(name_akl, price_akl);
    });


    let content_box = document.getElementById('big_box');
    content_box.style.top = '0';
    content_box.style.left = '0';
    content_box.style.height = '100%';
    content_box.style.display = 'grid';
    content_box.style.marginTop = '100px';
    content_box.style.columnGap = '0';


    let div_width_empty = window.innerWidth/3;

    content_box.style.gridTemplateColumns = 'auto' + div_width_empty + 'px';

    let add_content = document.getElementById('add_content');
    add_content.style.gridColumnStart = '2';
    add_content.style.gridColumnEnd = '2';
    add_content.style.borderLeft = '2px solid black';


    form.append(form_content, submit_btn);
    content_box.append(form, wrong_name);

    Add_css();
}

function Add_css()
{
    let my_form = document.getElementById('my_form');
    //my_form.style.marginLeft = 'auto';
    //my_form.style.marginRight = 'auto';
    //my_form.style.width = '50%';
    my_form.style.gridColumnStart = '1';
    my_form.style.gridColumnEnd = '1';


    let input_arr = document.getElementsByClassName('inp');
    for(let input of input_arr)
    {
        input.style.width = '80%';
        input.style.height = '30px';

        if(input.tagName === 'TEXTAREA')
        {
            input.style.height = '150px';
            input.style.resize = 'none';

        }
    }

    let atx_arr = document.getElementsByTagName('sup');
    for(let atx of atx_arr)
    {
        atx.style.color = 'red';
    }

    let label_arr = document.getElementsByClassName('lbl');
    for(let label of label_arr)
    {
        label.style.textAlign = 'left';
        label.style.width = '30%';
        label.style.padding = '5%';
    }


    let submit_btn = document.getElementById('submit_btn');
    submit_btn.style.float = 'right';
    submit_btn.style.marginTop = '20px';

    //my_form.style.marginTop = '100px';

    let wrong_msg = document.createElement('div');
    if(document.getElementById('wrong_name') != null)
        wrong_msg = document.getElementById('wrong_name');

    let right_msg = document.createElement('div');
    if(document.getElementById('right_msg') != null)
        right_msg = document.getElementById('right_msg');


    wrong_msg.style.lineHeight = '6';
    wrong_msg.style.height = '100px';
    wrong_msg.style.left = '0';
    wrong_msg.style.right = '0';
    wrong_msg.style.top = '0';
    wrong_msg.style.position = 'fixed';
    wrong_msg.style.textAlign = 'center';
    wrong_msg.style.backgroundColor = 'crimson';

    right_msg.style.lineHeight = '6';
    right_msg.style.height = '100px';
    right_msg.style.left = '0';
    right_msg.style.right = '0';
    right_msg.style.top = '0';
    right_msg.style.position = 'fixed';
    right_msg.style.textAlign = 'center';
    right_msg.style.backgroundColor = 'green';


}

window.onload = () => NewArticle();
