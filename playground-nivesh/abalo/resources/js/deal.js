import './bootstrap';
import { createApp } from 'vue';
import {Axios} from "axios";


const deal = createApp({

    data(){
        return{

        }
    },
    methods: {
        addDeal(id){
            axios.defaults.headers.post['X-CSRF-Token'] = document.getElementById('csrf').content;
            axios.post('/api/articles/' + id + '/deal')
                .then(response => console.log(response.data))
                .catch(reason => { console.log(reason) })
                .then(() => {})
        }
    }
}).mount('#deal')
