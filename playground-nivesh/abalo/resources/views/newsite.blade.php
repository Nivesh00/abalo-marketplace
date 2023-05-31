<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <script src="{{ asset('js/vue.js') }}"></script>
    <title>Willkommen bei Abalo!</title>
</head>
<body>

<script src="{{ asset('build/assets/app-df85b70d.js') }}"></script>

<header id="app">

    <!--<site-header v-for="item in header_items" :key="item.id">
        @{{ item.name }}
    </site-header>-->
    <site-header></site-header>
</header>

<main id="ab-main"></main>

<footer id="ab-footer"></footer>



</body>
</html>

<script type="module">

    import SiteHeader from "../js/components/SiteHeader";
    let ab_header = Vue.createApp({
        components: {
            SiteHeader,
            //ExampleComponent
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
    }).mount('#app');
    export default {
        components: {SiteHeader}
    }
</script>
