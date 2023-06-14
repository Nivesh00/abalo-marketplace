export default{
    props: ['middle'],
    data(){
        return{

        }
    },
    emits: ['clicked-impressum'],
    methods: {
        back(){
            history.back();
        },
        toggleImpressum(){
            this.$emit('clicked-impressum');
        }
    },
    template:
        `<div style="display: flex; justify-content: space-between;
        bottom: 0; left: 0; right: 0; position: fixed; background-color: lightgrey;
        border-top: 2px solid black; min-height: 30px">
         <div @click="back">&#8617; Zurück</div>
         <div>{{ middle }}</div>
         <div @click="toggleImpressum">Impressum</div>
        </div>`
}
