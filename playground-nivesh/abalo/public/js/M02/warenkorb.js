"use strict";

function Warenkorb()
{
    /*
    let empty_box = document.createElement('div');
    empty_box.setAttribute('id', 'empty_box');
    empty_box.style.height = '100px';
    document.body.prepend(empty_box);
    */

    let big_box = document.getElementById('big_container');
    big_box.style.position = 'fixed';
    big_box.style.width = '100%';

    let korb = document.createElement('div');
    korb.setAttribute('id', 'korb');

    let basket = document.getElementById('warenkorb');
    basket.style.padding = '10px';
    basket.style.height = '35px';
    basket.style.backgroundColor = 'red';
    basket.style.textAlign = 'center';
    basket.style.borderRadius = '20px';
    basket.style.minWidth = '80px';
    basket.style.maxWidth = '150px';
    basket.style.marginLeft = 'auto';
    basket.style.marginRight = '10px';
    basket.style.lineHeight = '2';

    korb.style.display = 'none';
    korb.style.height = '200px';
    korb.style.width = '20%';
    korb.style.marginRight = '0';
    korb.style.textAlign = 'center';
    korb.style.border = '2px solid black';

    korb.innerHTML =

        '<div id="items" style="text-align: center; height: 60px; font-weight: bolder;' +
        ' background-color:' +
        ' lightblue;"></br>In meinem Warenkorb</div>';

    basket.addEventListener('mouseover', function ()
    {
        basket.style.backgroundColor = 'black';

        korb.style.display = 'block';
        korb.style.position = 'absolute';
        korb.style.top = '30px';
        korb.style.right = '10px';
        korb.style.width = '400px';
        korb.style.height = '600px';
        korb.style.backgroundColor = 'lightgrey';
        document.body.style.cursor = 'pointer';
    });

    basket.addEventListener('mouseout', function ()
    {
        basket.style.backgroundColor = 'red';

        korb.style.display = 'none';
    });

    korb.addEventListener('mouseout', function ()
    {
        korb.style.display = 'none';
    });


    let item_list = [];
    let table = document.getElementById('my_table');

    for(let row of table.rows)
    {
        let item_name = null;
        for(let cell of row.cells)
        {
            if(cell.id === 'name')
                item_name = cell.innerText;
            if(cell.id === 'add')
            {
                let add_btn = document.createElement('button');
                add_btn.innerText = '+';
                add_btn.style.marginLeft = '10px';
                add_btn.setAttribute('value', item_name);
                add_btn.addEventListener('click', function ()
                {
                    if(add_btn.innerText === '+')
                    {
                        cartAction(add_btn.value, "add");

                        add_btn.innerText = '-';
                        item_list.push(add_btn.value);

                        let in_korb = document.createElement('div');
                        in_korb.innerText = add_btn.value;
                        in_korb.setAttribute('id', add_btn.value);
                        in_korb.setAttribute('class', 'my_items');
                        in_korb.style.display = 'block';
                        in_korb.style.padding = '5px';
                        in_korb.style.textAlign = 'center';
                        korb.append(in_korb);

                        let my_items = document.getElementsByClassName('my_items');
                        for(let i of my_items)
                        {
                            i.addEventListener('mouseover', function()
                            {
                                i.style.backgroundColor = 'white';
                            });
                            i.addEventListener('mouseout', function()
                            {
                                i.style.backgroundColor = 'lightgray';
                            });

                        }
                    }
                    else
                    {
                        cartAction(add_btn.value, "remove");
                        add_btn.innerText = '+';
                        let index = item_list.indexOf(add_btn.value);
                        if (index > -1)
                        { // only splice array when item is found
                            item_list.splice(index, 1);
                            // 2nd parameter means remove one item only
                        }

                        let in_korb = document.getElementById(add_btn.value);
                        in_korb.remove();

                    }
                });
                cell.append(add_btn);
            }
        }
    }


    let names = document.querySelectorAll('[id="name"]');
    let adds = document.querySelectorAll('[id="btn"]');


    basket.append(korb);
}

function cartAction(article, action)
{
    let xhttp = new XMLHttpRequest();
    let csrf_token = document.getElementById('X-CSRF-TOKEN').getAttribute('content');
    let body_json =
        {
            "article":article,
            "action":action
        }


    xhttp.open('POST', '/api/cartAction');
    xhttp.setRequestHeader("Content-Type", "application/json; charset=utf-8");
    xhttp.setRequestHeader("Accept", "application/json");
    xhttp.setRequestHeader("X-CSRF-TOKEN", csrf_token);
    xhttp.send(JSON.stringify(body_json));

    xhttp.onreadystatechange = () =>
    {
        if(xhttp.readyState === 4)
            console.log(xhttp);
    }
}

window.onload = () => Warenkorb();
