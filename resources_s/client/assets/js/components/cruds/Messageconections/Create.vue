<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Messageconection</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="msg_id">Msg id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="msg_id"
                                            placeholder="Enter Msg id"
                                            :value="item.msg_id"
                                            @input="updateMsg_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="sender_id">Sender id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="sender_id"
                                            placeholder="Enter Sender id"
                                            :value="item.sender_id"
                                            @input="updateSender_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="receiver_id">Receiver id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="receiver_id"
                                            placeholder="Enter Receiver id"
                                            :value="item.receiver_id"
                                            @input="updateReceiver_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="notifystatus">Notifystatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="notifystatus"
                                            placeholder="Enter Notifystatus"
                                            :value="item.notifystatus"
                                            @input="updateNotifystatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="notifycancelstatus">Notifycancelstatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="notifycancelstatus"
                                            placeholder="Enter Notifycancelstatus"
                                            :value="item.notifycancelstatus"
                                            @input="updateNotifycancelstatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="paymentstatus">Paymentstatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="paymentstatus"
                                            placeholder="Enter Paymentstatus"
                                            :value="item.paymentstatus"
                                            @input="updatePaymentstatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="readstatus">Readstatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="readstatus"
                                            placeholder="Enter Readstatus"
                                            :value="item.readstatus"
                                            @input="updateReadstatus"
                                            >
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
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
    computed: {
        ...mapGetters('MessageconectionsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('MessageconectionsSingle', ['storeData', 'resetState', 'setMsg_id', 'setSender_id', 'setReceiver_id', 'setNotifystatus', 'setNotifycancelstatus', 'setPaymentstatus', 'setReadstatus']),
        updateMsg_id(e) {
            this.setMsg_id(e.target.value)
        },
        updateSender_id(e) {
            this.setSender_id(e.target.value)
        },
        updateReceiver_id(e) {
            this.setReceiver_id(e.target.value)
        },
        updateNotifystatus(e) {
            this.setNotifystatus(e.target.value)
        },
        updateNotifycancelstatus(e) {
            this.setNotifycancelstatus(e.target.value)
        },
        updatePaymentstatus(e) {
            this.setPaymentstatus(e.target.value)
        },
        updateReadstatus(e) {
            this.setReadstatus(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'messageconections.index' })
                    this.$eventHub.$emit('create-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
