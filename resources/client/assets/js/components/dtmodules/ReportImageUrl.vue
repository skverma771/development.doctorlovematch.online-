<template>
    <div class="btn-group btn-group-xs">

        <a class="btn btn-success" :href="row.image_url" target="_blank">Click To View Image</a>
    </div>
</template>


<script>
    export default {
        props: ['row', 'xprops'],
        data() {
            return {
                // Code...

            }
        },
        created() {

        },

        methods: {

        }
    }
</script>


<style scoped>

</style>
