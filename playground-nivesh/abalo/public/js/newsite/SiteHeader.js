export default{
    model: {

    },
    data(){
        return {
            highlight: 'white'
        }
    },
    template: `<li @click="highlight = 'yellow'" :style="{backgroundColor: highlight}"></li>`
}
