"use strict";
function NewArticle()
{
    let form = document.getElementById('my_form');
    form.setAttribute('method', 'post');
    form.setAttribute('action', '/newarticle_verify');
    form.setAttribute('id', 'article_form');

    let form_content = document.createElement('div');
    form_content.innerHTML =

        //'<input type="hidden" name="_token" value="{{ csrf_token() }}"' +
        '<table>' +
        '<thead><tr><th></th><th></th></tr></thead>' +
        '<tbody>' +

        '<tr>' +
        '<td><label for="name">Name des Articles</label></td>' +
        '<td><input id="name" name="name" type="text"  placeholder="z.B. Auto"></td>' +
        '</tr>' +

        '<tr>' +
        '<td><label for="price">Preis des Articles</label></td>' +
        '<td><input id="price" name="price" type="text"  placeholder="z.B. 100"></td>' +
        '</tr>' +

        '<tr>' +
        '<td><label for="description">Beschreibung</label></td>' +
        '<td><textarea id="description" name="description" type="text"' +
        ' placeholder="optional"></textarea></td>' +
        '</tr>' +

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

        if(name_akl.length <= 0 && price_akl <= 0)
        {
            wrong_name.style.display = 'block';
            wrong_price.style.display = 'block';
            event.preventDefault();
        }
        else if (name_akl.length <= 0)
        {
            wrong_name.style.display = 'block';
            wrong_price.style.display = 'none';
            event.preventDefault();
        }
        else if (price_akl <= 0)
        {
            wrong_name.style.display = 'none';
            wrong_price.style.display = 'block';
            event.preventDefault();
        }
        else
            document.getElementById('article_form').submit();
    });

    form.append(form_content, submit_btn);
    document.body.append(form, wrong_name, wrong_price);
}

window.onload = () => NewArticle();
