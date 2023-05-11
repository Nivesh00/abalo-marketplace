"use strict";

function Warenkorb()
{
    let col3 = document.getElementById('col-3');
    let cart = document.createElement('div');
    cart.setAttribute('id', 'cart');
    cart.innerHTML =
        '<div style="text-align: center; text-decoration-line: underline;' +
        'font-weight: bold; border-radius: 15px 15px 0 0;">'+
        'In meinem Warenkorb</div>'
    cart.style.width = '500px';
    cart.style.border = '2px solid black';
    cart.style.height = '600px';
    cart.style.position = 'fixed';
    cart.style.right = '15px';
    cart.style.marginTop = '0';
    cart.style.backgroundColor = 'blue';
    cart.style.borderRadius = '15px';
    cart.style.backgroundColor = 'lightgrey';
    cart.style.overflowY = 'auto';
    cart.style.display = 'none';


    col3.addEventListener('mouseover', ()=>
    {
        if(window.innerWidth > 530)
        {
            cart.style.display = 'block';
            col3.style.backgroundColor = 'lightgrey';
        }
    });
    col3.addEventListener('mouseout', () =>
    {
        cart.style.display = 'none';
        col3.style.backgroundColor = 'lightcyan';
    });


    cart.addEventListener('mouseover', () =>
    {
        cart.style.display = 'block';
    });
    cart.addEventListener('mouseout', () =>
    {
        cart.style.display = 'none';
    });

    col3.append(cart);

    populateCart();
    addButtons();
}

function addButtons()
{
    let add_div = document.getElementsByClassName('add');


    for(let cell of add_div)
    {
        let add_btn = document.createElement('div');
        add_btn.setAttribute('class', 'add_btn');
        add_btn.innerHTML = '&uarr;';
        add_btn.style.width = '20px';
        add_btn.style.height = '23px';
        add_btn.style.display = 'inline-block';
        add_btn.style.backgroundColor = 'lawngreen';
        add_btn.style.borderRadius = '5px';


        let rmv_btn = document.createElement('div');
        rmv_btn.setAttribute('class', 'rmv_btn');
        rmv_btn.style.marginRight = '2px';
        rmv_btn.innerHTML = '&darr;';
        rmv_btn.style.width = '20px';
        rmv_btn.style.height = '23px';
        rmv_btn.style.display = 'inline-block';
        rmv_btn.style.backgroundColor = 'lightgrey';
        rmv_btn.style.borderRadius = '5px';



        add_btn.addEventListener('click', () => {
            if (add_btn.style.backgroundColor === 'lawngreen')
            {
                rmv_btn.style.backgroundColor = 'crimson';
                add_btn.style.backgroundColor = 'lightgrey';
                addToCart(cell.id);
            }
        });
        rmv_btn.addEventListener('click', () => {
            if(rmv_btn.style.backgroundColor === 'crimson')
            {
                rmv_btn.style.backgroundColor = 'lightgrey';
                add_btn.style.backgroundColor = 'lawngreen';
                removeFromCart(cell.id);
            }
        });


        let div = document.createElement('div');
        div.addEventListener('mouseover', ()=>
        {
            div.style.cursor = 'pointer';
        });
        div.addEventListener('mouseout', ()=>
        {
            div.style.cursor = 'initial';
        });


        div.append(rmv_btn, add_btn);
        cell.append(div);
    }

}

function populateCart()
{
    let cart = document.getElementById('cart');
    cart.innerHTML =
        '<div style="text-align: center; text-decoration-line: underline;' +
        'font-weight: bold; border-radius: 15px 15px 0 0;">'+
        'In meinem Warenkorb</div>';
    /*
    User id nicht implementiert
     */
    let user_id =  1;

    let xhttp = new XMLHttpRequest();
    xhttp.open('GET', '/api/shoppingcart/' + user_id);
    xhttp.send();

    xhttp.onreadystatechange = () =>
    {
        if(xhttp.readyState === 4)
        {

            let myArr = JSON.parse(xhttp.responseText);


            if(!myArr.hasOwnProperty('message_empty'))
                for (let key in myArr)
                {
                    let div = document.createElement('div');
                    div.setAttribute('name', myArr[key]['id']);
                    div.innerText = myArr[key]['ab_name'];
                    div.style.textAlign = 'left';
                    div.style.padding = '20px';

                    div.addEventListener('mouseover', ()=>
                    {
                        div.style.backgroundColor = 'white';
                        div.style.cursor = 'pointer';

                    });
                    div.addEventListener('mouseout', ()=>
                    {
                        div.style.backgroundColor = 'lightgrey';
                        div.style.cursor = 'initial';
                    })

                    let link = document.createElement('a');
                    link.innerText = 'entfernen';
                    link.style.textDecorationLine = 'none';
                    link.style.color = 'lightsalmon';
                    link.style.float = 'right';

                    link.addEventListener('click', (event) =>
                    {
                        event.preventDefault();
                        let mydiv = document.getElementById(myArr[key]['id']).childNodes[0].childNodes;
                        console.log(mydiv);
                        for(let btn of mydiv)
                        {

                            if(btn.style.backgroundColor === 'lightgrey')
                                btn.style.backgroundColor = 'lawngreen';
                            else
                                btn.style.backgroundColor = 'lightgrey';
                        }

                        removeFromCart(myArr[key]['id']);
                    });

                    link.addEventListener('mouseover', () =>
                    {
                        link.style.textDecorationLine = 'underline';
                    })
                    link.addEventListener('mouseout', () =>
                    {
                        link.style.textDecorationLine = 'none';
                    })


                    let btn_cnt = document.getElementById(myArr[key]['id']).childNodes[0].childNodes;
                    for(let btn of btn_cnt)
                    {
                        if (btn.getAttribute('class') === 'add_btn')
                            btn.style.backgroundColor = 'lightgrey';
                        else
                            btn.style.backgroundColor = 'crimson';

                    }

                    div.append(link);
                    cart.append(div);

                }

        }
    }
}

function addToCart(id)
{
    let article_id = id;

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '/api/shoppingcart/');
    xhttp.setRequestHeader('Content-type', 'application/json');
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.getElementById('X-CSRF-TOKEN').getAttribute('content'));

    xhttp.send(JSON.stringify(
        {
            "id":article_id
        }
    ));

    xhttp.onreadystatechange = () =>
    {
        if(xhttp.readyState === 4)
        {
            populateCart();
        }
    }
}

function  removeFromCart(id)
{
    /*
    User id nicht implementiert
     */
    let user_id =  1;

    let xhttp = new XMLHttpRequest();
    xhttp.open('DELETE', '/api/shoppingcart/' + 1 + '/articles/' + id);
    xhttp.setRequestHeader('X-CSRF-TOKEN', document.getElementById('X-CSRF-TOKEN').getAttribute('content'));
    xhttp.send();

    xhttp.onreadystatechange = () =>
    {
        if(xhttp.readyState === 4)
        {
            populateCart();
        }
    }
}

window.onload = () => Warenkorb();

