"use strict";


class NavMenu
{

    static data =
    {
        Home: '',
        Kategorie:
            {
                Auto: {},
                Elektronik: {},
                Immobilien: {}
            },
        Verkaufen: '',
        Unternehmen:
            {
                Philosophie: {},
                Karriere: {}
            }
    }

    static big_box = document.createElement('div');

    static data_to_list()
    {
        let box = document.createElement('ul');
        box.setAttribute('id', 'sections');

        for(let cat in this.data)
        {
            let list_item = document.createElement('li');
            list_item.setAttribute('class', 'main_item');

            let link_item = document.createElement('a');
            link_item.setAttribute('href', '#');
            link_item.setAttribute('target', '_self');
            link_item.innerText = cat;
            list_item.append(link_item);
            console.log(this.data[cat]);
            if(this.data[cat] !== '')
            {
                list_item.setAttribute('class', 'main_item parent_item_0');
                list_item.innerHTML = list_item.innerHTML + '&#9660;';
                let inner_box = document.createElement('ul');
                inner_box.setAttribute('class', 'subsections');

                for (let subcat in this.data[cat])
                {
                    let list_item_inner = document.createElement('li');
                    list_item_inner.setAttribute('class', 'sub_item');

                    let link_item_inner = document.createElement('a');
                    link_item_inner.setAttribute('class', 'sub_link');
                    link_item_inner.setAttribute('href', '#');
                    link_item_inner.setAttribute('target', '_self');
                    link_item_inner.innerText = subcat;

                    list_item_inner.append(link_item_inner);
                    inner_box.append(list_item_inner);
                    list_item.append(inner_box);
                }
            }

            box.append(list_item);
        }

        return box;

    }

    static new_NavMenu()
    {
        let form_box = this.data_to_list();

        this.big_box.setAttribute('id', 'big_box');

        this.big_box.append(form_box);
        document.body.append(this.big_box);
        console.log(this.big_box.innerHTML);

        this.new_NavMenu_css();

        for(let i = 0; i < 10; i++)
        {
            this.lip_sum();
        }
    }

    static new_NavMenu_css()
    {
        this.big_box.style.fontFamily = 'Bahnschrift, serif';
        this.big_box.style.position = 'fixed';
        this.big_box.style.backgroundColor = 'lightcyan';
        this.big_box.style.top = '0';
        this.big_box.style.left = '0';
        this.big_box.style.right = '0';
        //this.big_box.style.borderBottomLeftRadius = '60px';
        //this.big_box.style.borderBottomRightRadius = '60px';

        let ul_arr = this.big_box.getElementsByTagName('ul');
        for(let ul of ul_arr)
        {
            ul.style.listStyleType = 'none';
            ul.style.alignContent = 'none';
            ul.style.display = 'flex';
            ul.style.justifyContent = 'space-between';

            if(ul.className === 'subsections')
            {
                ul.style.listStyleType = 'square';
                ul.style.display = 'block';
            }
        }

        let a_arr = this.big_box.getElementsByTagName('a');
        for(let a of a_arr)
        {
            a.style.textDecorationLine = 'none';
            a.style.color = 'brown';
            a.style.padding = '10px 5px';
            a.style.borderBottom = '1px solid black';
            a.style.borderRadius = '5px';

            if(a.className === 'sub_link')
            {
                a.style.color = 'brown';
                a.style.padding = '5px 3px';
                a.style.borderBottom = '1px solid black';
            }

            a.addEventListener('mouseover', function ()
            {
                a.style.backgroundColor = 'lightblue';
            })
            a.addEventListener('mouseout', function ()
            {
                a.style.backgroundColor = 'initial';
            })
        }
        let listings = document.getElementById('sections');

        let li_arr = NavMenu.big_box.getElementsByTagName('li');
        for(let li of li_arr)
        {
            if (li.className.indexOf('parent_item_0') > 0)
            {
                let child_li_arr = li.getElementsByClassName('sub_item');
                for (let child_li of child_li_arr)
                {
                    child_li.style.display = 'none';
                }

            }
        }

        listings.addEventListener('mouseover', function()
        {

            let li_arr = NavMenu.big_box.getElementsByTagName('li');
            for(let li of li_arr)
            {
                if(li.className.indexOf('parent_item_0') > 0)
                {
                    let child_li_arr = li.getElementsByClassName('sub_item');

                    for(let child_li of child_li_arr)
                    {

                        //child_li.style.position = 'absolute';
                        child_li.style.display = 'list-item';
                        child_li.style.listStyleType = 'square';
                        child_li.style.marginTop = '15px';
                        child_li.style.fontSize = 'smaller';
                    }

                    listings.addEventListener('mouseout', function()
                    {
                        for(let child_li of child_li_arr)
                        {
                            child_li.style.display = 'none';
                            empty_div.style.height = '80px';
                        }
                    })

                }

                li.style.paddingLeft = '2%';
                li.style.paddingRight = '2%';
            }
        });

        let expand = document.createElement('div');
        expand.setAttribute('id', 'expand');
        expand.innerText = 'Menü ausblenden';
        expand.style.width = '100%';
        expand.style.textAlign = 'center';
        expand.style.backgroundColor = 'lightgrey';
        expand.style.border = '1px solid black';
        expand.style.fontSize = 'small';
        expand.style.textDecorationLine = 'underline';
        expand.style.padding = '1%';
        expand.style.top = '0';
        expand.style.left = '0';
        expand.style.right = '0';
        expand.style.fontFamily = 'Bahnschrift, serif';
        expand.style.cursor = 'pointer';
        expand.addEventListener('click', function (event)
        {
            if(expand.innerText === 'Menü ausblenden')
            {
                NavMenu.big_box.style.display = 'none';
                empty_div.style.height = '0px';
                expand.innerText = 'Menü einblenden';
                expand.style.padding = '0';
                expand.style.width = '100%';
                expand.style.position = 'fixed';
                expand.style.top = '0';
                expand.style.left = '0';
                expand.style.right = '0';
                expand.style.backgroundColor = 'darkgrey';

                document.body.append(expand);
            }
            else
            {
                NavMenu.big_box.style.display =  'initial';
                empty_div.style.height = '80px';
                expand.style.position = 'initial';
                expand.innerText = 'Menü ausblenden';
                expand.style.backgroundColor = 'lightgrey';
                expand.style.padding = '1%';

               NavMenu.big_box.append(expand);
            }
        })



        let empty_div = document.createElement('div');
        empty_div.setAttribute('id', 'empty_div');
        empty_div.style.width = '100%';
        empty_div.style.height = '80px';
        this.big_box.append(expand);


        document.body.append(empty_div);
    }


    static lip_sum()
    {
        let lipsum = document.createElement('div');

        lipsum.innerText = '\n' +
            '\n' +
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sit amet semper nisi. Morbi ultricies non metus eu tempus. Sed ut fermentum eros. Donec vulputate auctor nisl, eget efficitur risus placerat non. Curabitur pretium varius accumsan. Curabitur eget nunc in metus efficitur feugiat. Mauris gravida leo mauris, et consectetur odio aliquet eget. In congue ex ut nulla sodales, et sollicitudin tellus fringilla. Duis euismod volutpat libero. Aliquam venenatis aliquet lacus venenatis suscipit. Fusce congue ac risus eget cursus. Quisque nec commodo ligula, efficitur sollicitudin sem. Morbi nec ullamcorper leo.\n' +
            '\n' +
            'In eget pharetra lorem, eget convallis nisi. Sed pharetra eget ex quis maximus. Suspendisse euismod lorem a lacus scelerisque, ac viverra augue varius. Nulla viverra nisi sed lectus aliquet dapibus. Sed lobortis mauris ut maximus pharetra. Donec viverra viverra nulla, id congue turpis hendrerit quis. Phasellus vel arcu massa. Etiam vehicula, diam vitae hendrerit facilisis, neque risus rhoncus nisi, sit amet tempus est mauris vel lacus. Proin odio mi, egestas vel euismod id, volutpat sit amet dolor. Proin mollis nisl nunc, a sodales nibh varius ut. Vestibulum a sollicitudin sem. Cras lacinia commodo erat, at porttitor felis mollis a. Sed non rhoncus ipsum, nec tincidunt lorem.\n' +
            '\n' +
            'Proin tortor sapien, rhoncus vitae enim at, ultricies iaculis metus. Integer sit amet mauris tellus. Fusce suscipit pulvinar placerat. Integer dapibus commodo erat sit amet efficitur. Vivamus id erat non quam vulputate scelerisque nec ut urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras sit amet varius orci. Nullam vitae dolor rhoncus, dapibus magna in, pretium enim. Vestibulum eu purus bibendum, semper massa vel, porta erat.\n' +
            '\n' +
            'Aenean purus augue, mollis non odio non, consequat blandit ipsum. Vivamus facilisis odio sit amet mi laoreet, quis dictum sapien auctor. Nullam sed consequat erat, vel placerat lectus. Duis placerat, massa non hendrerit rhoncus, lorem magna sollicitudin eros, at ultrices massa urna sit amet justo. Fusce ultrices nisl at risus porta fringilla. Ut luctus risus ac malesuada pulvinar. Phasellus purus velit, varius malesuada malesuada ac, consequat quis nunc. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus ante, fringilla non ante nec, finibus volutpat eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras ligula nulla, mollis ac blandit nec, euismod sit amet dolor. Aliquam fermentum feugiat nisl nec laoreet. Donec congue pharetra sollicitudin.\n' +
            '\n' +
            'Etiam condimentum posuere magna non imperdiet. Fusce ac faucibus est. Cras sodales semper velit, id sagittis ex scelerisque at. Nunc magna turpis, varius in neque et, posuere euismod nisi. Ut vel eleifend diam. Curabitur eros leo, mollis eget diam ac, gravida accumsan felis. Quisque commodo ex non libero maximus, et eleifend nibh viverra. Aliquam nec pulvinar sem, in suscipit ante. '

        //document.body.append(lipsum);
    }
}

window.onload = () => NavMenu.new_NavMenu();

