<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Groupsmembers</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Groupid</th>
                                            <td>{{ item.groupid }}</td>
                                            </tr>
                                        <tr>
                                            <th>Memberid</th>
                                            <td>{{ item.memberid }}</td>
                                            </tr>
                                        <tr>
                                            <th>Approved</th>
                                            <td>{{ item.approved }}</td>
                                            </tr>
                                        <tr>
                                            <th>Requestrecbyid</th>
                                            <td>{{ item.requestrecbyid }}</td>
                                            </tr>
                                        <tr>
                                            <th>Created</th>
                                            <td>{{ item.created }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('GroupsmembersSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('GroupsmembersSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
