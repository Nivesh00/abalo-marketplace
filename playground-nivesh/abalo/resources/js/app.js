/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

/*

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

*/

const app = createApp({
    data(){
        return {
            rows: [
                { name: 'name', boxtype:'input',  label: 'Artikelname:', placeholder: 'Name des' +
                        ' Artikels', required: 'true', errorMsg: '',
                    type: 'text', maxlength: '50', value: ''},
                { name: 'price', boxtype:'input', label: 'Artikelpreis (€):', placeholder:
                        'Preis des Artikels, z.B. 16.3', required: 'true', type: 'text', maxlength: 'maxL',
                    value: '', errorMsg: '',},
                { name: 'description', boxtype:'textarea', label: 'Artikelbeschreibung:', placeholder:
                        'Beschreibung des Artikels', required: 'false',
                    type: '', maxlength: '200', value: '', errorMsg: '',}
            ],
            nameCorrect: false,
            priceCorrect: false,
            msg: ''
        }
    },
    methods: {
        checkChar(name, value){
            for(let row of this.$data.rows){
                if(name === row.name){
                    if(name === 'name'){
                        if(row.value.trim() === '') {
                            row.errorMsg = 'Bitte Name schreiben';
                            this.$data.nameCorrect = false;
                        }
                        else {
                            row.errorMsg = '';
                            this.$data.nameCorrect = true;
                        }
                    }
                    else if(name === 'price'){
                        const regex = /^[0-9]+$/
                        if(regex.test(value)) {
                            this.$data.priceCorrect = true;
                            row.errorMsg = ''
                        }
                        else {
                            this.$data.priceCorrect = false;
                            row.errorMsg = 'Bitte nur Zahlen eingeben'
                        }
                    }
                }
            }

        },
        submit() {
            if (this.$data.nameCorrect && this.$data.priceCorrect) {

                let csrf = document.getElementById('csrf_id').content;
                let xhttp = new XMLHttpRequest();
                xhttp.open('POST', '/api/articles');
                xhttp.setRequestHeader('X_CSRF_TOKEN', csrf);
                xhttp.setRequestHeader('Content-type', 'application/json');

                xhttp.onreadystatechange = () => {
                    if(xhttp.readyState === 4){
                        let response = JSON.parse(xhttp.responseText);
                        if(response['id'])
                            this.$data.msg = 'Artikel hinzugefügt!';
                        else {
                            this.$data.msg = 'Ein Fehler ist aufgetreten, bitte später versuchen!';
                            console.log(xhttp.responseText)
                        }
                    }
                }

                let data = {
                    name: this.$data.rows[0].value,
                    price: this.$data.rows[1].value,
                    description: this.$data.rows[2].value
                }
                xhttp.send(JSON.stringify(data));
            }
            else
                this.$data.msg = 'Bitte alle Eingabefelder erfüllen';
        }
    }
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#myApp');
