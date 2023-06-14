export default{
    props: ['prev', 'next'],
    emits: ['new-page'],
    template:
        `
        <div id="page-select">
        <div id="page-back" @click="changePage(prev)">&#171;</div>
        <div id="page-next" @click="changePage(next)">&#187;</div>
        </div>
        `,
    methods: {
        changePage(newpage){
            this.$emit('new-page', newpage)
        }
    }
}
