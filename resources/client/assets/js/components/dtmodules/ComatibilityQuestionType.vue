<template>
    <span v-if="row.questions_type==0"> Single Select </span>
    <span v-else> Multi Select </span>
</template>


<script>
    export default {

        props: ['row', 'xprops'],
        data() {
            return {

            }
        },
        created() {


        },

    }
</script>


<style scoped>

</style>
