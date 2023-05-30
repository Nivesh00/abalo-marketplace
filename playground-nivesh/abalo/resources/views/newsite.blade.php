<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <!--<script src="{{ asset('js/vue.js') }}"></script>-->
    <title>Willkommen bei Abalo!</title>
</head>
<body>

<header id="ab-header">

        <!--<example-component v-for="item in header_items" :key="item.id">
            @{{ item.name }}
        </example-component>-->
    <div id="app">
        <example-component></example-component>
    </div>

</header>

<main id="ab-main"></main>

<footer id="ab-footer"></footer>

<script type="module" src="../js/components/ExampleComponent.vue">
//import SiteHeader from "../js/components/header.vue";
import ExampleComponent from "../js/components/ExampleComponent.vue";

let ab_header = Vue.createApp({
    components : {
        //SiteHeader,
        ExampleComponent
    },
    data(){
        return{
            header_items: [
                {id: 0, name: 'Neue Deals'},
                {id: 1, name: 'Home'},
                {id: 2, name: 'Über uns'}
            ]
        }
    }
}).mount('#ab-header');

/*
import ExampleComponent from "../js/components/ExampleComponent";
window.vm = new Vue({
    el: '#app',
    data: {
        message: 'Hello'
    },
    components: {
        ExampleComponent
    }
})
*/
</script>

</body>
</html>
