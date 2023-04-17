"use strict";


class NavMenu
{
    static data =
    {
        home$: 'Home',
        kategorien: 'Kategorien',
        verkaufen: 'Verkaufen',
        unternehmen:
            {
                philosophie: 'Philosophie',
                karriere: 'Karriere'
            }
    }

    static make_NavMenu()
    {
        let full_html = '<ul>';

        for(let key in this.data)
        {
            if(this.data[key] instanceof Object)
            {
                full_html +=

                    '<li>'
                    + key.at(0).toUpperCase() + key.slice(1)
                    + '<ul>';

                for(let key1 in this.data[key])
                {
                    full_html += '<li>' + this.data[key][key1] +'</li>';
                }

                full_html += '</ul></li>';
            }
            else
            {
                full_html += '<li>' + this.data[key] + '</li>';
            }
        }

        full_html += '</ul>';
        console.log(full_html);
        document.body.innerHTML = full_html;
    }
}

window.onload = () => NavMenu.make_NavMenu();

