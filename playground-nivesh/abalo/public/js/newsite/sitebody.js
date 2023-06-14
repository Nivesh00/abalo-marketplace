export default{
    methods: {
        searchPic(name)
        {

        }
    },
    props: ['allarticles'],
    template:
        `
        <table id="a-articles">
        <thead>
        <tr>
            <th></th><th></th><th></th><th></th><th></th>
        </tr>
        </thead>
        <tbody>
        <tr class="article-row" v-for="article in allarticles" :key="article.id">
            <td class="a-num">{{ article.num }}</td>
            <td class="a-pic"><img src="" alt="Artikel Bild"></td>
            <td class="a-name">{{ article.name }}</td>
            <td class="a-price">{{ article.price}}</td>
            <td class="a-descr">{{ article.descr }}</td>
        </tr>
        </tbody>
        </table>
        `
};

/*
<div class="article-row" v-for="article in allarticles" :key="article.id" >
        <div class="a-num">{{ article.num }}</div>
        <div class="a-pic"><img src="" alt="Artikel Bild"></div>
        <div class="a-name">{{ article.name }}</div>
        <div class="a-price">{{ article.price}}</div>
        <div class="a-descr">{{ article.descr }}</div>
        </div>
*/

export function get_articles(name = null, category = null, page = null)
{

}
