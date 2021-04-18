<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Messageconection</h1>
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
                                            <th>Msg id</th>
                                            <td>{{ item.msg_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Sender id</th>
                                            <td>{{ item.sender_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Receiver id</th>
                                            <td>{{ item.receiver_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Notifystatus</th>
                                            <td>{{ item.notifystatus }}</td>
                                            </tr>
                                        <tr>
                                            <th>Notifycancelstatus</th>
                                            <td>{{ item.notifycancelstatus }}</td>
                                            </tr>
                                        <tr>
                                            <th>Paymentstatus</th>
                                            <td>{{ item.paymentstatus }}</td>
                                            </tr>
                                        <tr>
                                            <th>Readstatus</th>
                                            <td>{{ item.readstatus }}</td>
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
        ...mapGetters('MessageconectionsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('MessageconectionsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
