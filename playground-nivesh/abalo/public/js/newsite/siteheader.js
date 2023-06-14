export default {
    data() {
        return {
            menu : [
                { title: "Home", link: "/newsite" },
                { title: "Articles", link: "/articles" },
                { title: "Kategorien", link: "/newsite", showchildren: false,
                    children: [
                        {title: "Auswahl", link: "/newsite"},
                    ],
                },
                { title: "Verkaufen", link: "/newarticle", showchildren: false,
                    children: [
                        {title: "test", link: "/newsite"},
                    ],
                },
                {
                    title: "Unternehmen", link: "/newsite", showchildren: false,
                    children: [
                        { title: "Philosophie", link: "/newsite" },
                        { title: "Karriere", link: "/newsite" },
                    ],
                },
            ]
        };
    },
    methods: {
        showChildren(title)
        {
            for(let row of this.$data.menu)
            {
                if (row.title === title)
                {
                    row.showchildren = true;
                    break;
                }
            }
        },
        hideChildren(title)
        {
            for(let row of this.$data.menu)
            {
                if (row.title === title)
                {
                    row.showchildren = false;
                    break;
                }
            }
        }
    },
    template:
        `
        <div style="display: flex; justify-content: space-evenly;">
        <div class="menu-0" v-for="item in menu" :key="item.id">
        <div class="menu-0-div" @mouseover="showChildren(item.title)" @mouseout="hideChildren(item.title)">
            <a :href="item.link" class="title">{{ item.title }}</a>
                <div style="position: absolute;"  v-if="item.children && item.showchildren"
                     @mouseover="showChildren(item.title)" @mouseout="hideChildren(item.title)" class="menu-1-div">
                    <ul><li v-for="child in item.children">
                            <a :href="child.link">{{ child.title }}</a>
                        </li></ul>
                </div>
        </div>
        </div>
        </div>
        `
};

/*

<ul>
        <li v-for="item in menu" :key="item.title">
            <a :href="item.link">{{ item.title }}</a>
            <ul v-if="item.children && item.show_children">
                <li v-for="child in item.children" :key="child.title">
                    <a :href="child.link">{{ child.title }}</a>
                </li>
            </ul>
        </li>
        </ul>
 */
