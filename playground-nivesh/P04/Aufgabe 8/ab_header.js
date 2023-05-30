export default {
    props: ['page', 'title', 'id'],
    methods: {
        showT(){
            this.$data.show = true;
        },
        hideT(){
            this.$data.show = false;
        }

    },
    data(){
        return {
            show: false
        }
    },
    template:
        `<div style="text-align: center;" @mouseout="hideT" @mouseover="showT">
        {{ page }}
         <p v-if="show" @mouseout="hideT" @mouseover="showT">
         {{ title }}</p>
         </div>`
}