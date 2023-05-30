export default {

    props: ['id', 'label', 'price'],
    emits: ['GetItem'],
    methods: {
        ZoomItem(){
            this.$emit('GetItem', this.$props.id);
        }
    },
    template: `<div @clicked="ClickHandler" style="font-size: 50px">
                {{label}}
                </div>`
}