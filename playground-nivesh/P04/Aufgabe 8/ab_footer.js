export default{
    props: ['middle'],
    data(){
        return{

        }
    },
    methods: {
        back(){
            history.back();
        }
    },
    template:
        `<div style="display: flex; justify-content: space-between;
        bottom: 0; left: 0; right: 0; position: fixed; background-color: lightgrey">
         <div @click="back">&#8617; Zurück</div>
         <div>{{ middle }}</div>
         <div>Mein Konto</div>
        </div>`
}