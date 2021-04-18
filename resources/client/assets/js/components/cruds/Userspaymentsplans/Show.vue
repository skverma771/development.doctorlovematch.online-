<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Userspaymentsplan</h1>
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
                                            <th>User id</th>
                                            <td>{{ item.user_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Payment id</th>
                                            <td>{{ item.payment_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Plan id</th>
                                            <td>{{ item.plan_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Plan date</th>
                                            <td>{{ item.plan_date }}</td>
                                            </tr>
                                        <tr>
                                            <th>Expire date</th>
                                            <td>{{ item.expire_date }}</td>
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
        ...mapGetters('UserspaymentsplansSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('UserspaymentsplansSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
