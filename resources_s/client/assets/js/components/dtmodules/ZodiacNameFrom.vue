<template>
    <span>{{name}}</span>
</template>


<script>
    export default {
        props: ['row', 'xprops'],
        data() {
            return {
                name:'',
            }
        },
        created() {

            axios.get('/api/fetch_zodiac_sign_name?id='+this.row.signfrom)
                .then(response => {
                    this.name=response.data;
                })
        },

    }
</script>


<style scoped>

</style>
