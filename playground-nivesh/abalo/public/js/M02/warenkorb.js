"use strict";

function Warenkorb()
{
    let korb = document.createElement('div');
    korb.setAttribute('id', 'korb');

    let basket = document.getElementById('warenkorb');

    korb.style.display = 'none';
    korb.style.height = '200px';
    korb.style.width = '20%';
    korb.style.marginRight = '0';
    korb.style.textAlign = 'center';
    korb.style.border = '2px solid black';

    korb.innerHTML =

        '<div id="items" style="text-align: center; height: 50px; font-weight: bolder; background-color:' +
        ' lightblue;"></br>In meinem Warenkorb</div>';

    basket.addEventListener('mouseover', function ()
    {
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

window.onload = () => Warenkorb();
