<template>
    <div class="btn-group btn-group-xs">
        {{user_name}}
    </div>
</template>


<script>
    export default {
        props: ['row', 'xprops'],
        data() {
            return {
                // Code...
                user_name:'',
            }
        },
        created() {
            axios.get('/api/fetch_user_name?id='+this.row.member_id)
                .then(response => {
                    this.user_name=response.data+' ('+this.row.member_id+')';
                })
        },

        methods: {

        }
    }
</script>


<style scoped>

</style>
