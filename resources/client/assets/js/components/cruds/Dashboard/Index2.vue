<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Dashboard</h1>
        </section>

        <section class="content">
            <div class="row">

            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {

    },
    mounted() {
        this.$router.push({ name: 'users.index' })
        },
    created() {
        this.fetchStatesAll()

    },
    destroyed() {
        this.resetState()
    },
    methods: {

    }
}
</script>


<style scoped>

</style>
