const menu = [
    { title: "Home", link: "#" },
    { title: "Articles", link: "/articles" },
    { title: "Kategorien", link: "#" },
    { title: "Verkaufen", link: "/newarticle",
        children: [
            {title: "test", link: "#"},
        ],
    },
    {
        title: "Unternehmen", link: "#",
        children: [
            { title: "Philosophie", link: "#" },
            { title: "Karriere", link: "#" },
        ],
    },
];

function generateMenu(menu) {
    var listItems = "";
    for (var i = 0; i < menu.length; i++)
    {
        var item = menu[i];
        var subMenu = "";

        if (item.children) {
            for (var j = 0; j < item.children.length; j++)
            {
                var child = item.children[j];
                subMenu += "<li><a href='" + child.link + "'>" + child.title + "</a></li>";
            }
            subMenu = "<ul>" + subMenu + "</ul>";
        }
        listItems += "<li><a href='" + item.link + "'>" + item.title + "</a>" + subMenu + "</li>";
    }
    return "<ul>" + listItems + "</ul>";
}

const menuHtml = generateMenu(menu);
document.getElementById("menu").innerHTML = menuHtml;
