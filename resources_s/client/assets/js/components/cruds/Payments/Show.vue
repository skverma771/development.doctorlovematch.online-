<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Payments</h1>
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
                                            <th>First name</th>
                                            <td>{{ item.first_name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Last name</th>
                                            <td>{{ item.last_name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Zipcode</th>
                                            <td>{{ item.zipcode }}</td>
                                            </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>{{ item.country }}</td>
                                            </tr>
                                        <tr>
                                            <th>Payment status</th>
                                            <td>{{ item.payment_status }}</td>
                                            </tr>
                                        <tr>
                                            <th>Txn id</th>
                                            <td>{{ item.txn_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Txn type</th>
                                            <td>{{ item.txn_type }}</td>
                                            </tr>
                                        <tr>
                                            <th>Payer email</th>
                                            <td>{{ item.payer_email }}</td>
                                            </tr>
                                        <tr>
                                            <th>Payment gross</th>
                                            <td>{{ item.payment_gross }}</td>
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
        ...mapGetters('PaymentsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('PaymentsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
