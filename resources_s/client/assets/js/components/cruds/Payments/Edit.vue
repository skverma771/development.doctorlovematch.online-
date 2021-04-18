<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Payments</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="user_id">User id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="user_id"
                                            placeholder="Enter User id"
                                            :value="item.user_id"
                                            @input="updateUser_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            placeholder="Enter First name"
                                            :value="item.first_name"
                                            @input="updateFirst_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            placeholder="Enter Last name"
                                            :value="item.last_name"
                                            @input="updateLast_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="zipcode">Zipcode</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="zipcode"
                                            placeholder="Enter Zipcode"
                                            :value="item.zipcode"
                                            @input="updateZipcode"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="country"
                                            placeholder="Enter Country"
                                            :value="item.country"
                                            @input="updateCountry"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="payment_status">Payment status</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="payment_status"
                                            placeholder="Enter Payment status"
                                            :value="item.payment_status"
                                            @input="updatePayment_status"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="txn_id">Txn id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="txn_id"
                                            placeholder="Enter Txn id"
                                            :value="item.txn_id"
                                            @input="updateTxn_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="txn_type">Txn type</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="txn_type"
                                            placeholder="Enter Txn type"
                                            :value="item.txn_type"
                                            @input="updateTxn_type"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="payer_email">Payer email</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="payer_email"
                                            placeholder="Enter Payer email"
                                            :value="item.payer_email"
                                            @input="updatePayer_email"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="payment_gross">Payment gross</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="payment_gross"
                                            placeholder="Enter Payment gross"
                                            :value="item.payment_gross"
                                            @input="updatePayment_gross"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="created">Created</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="created"
                                            placeholder="Enter Created"
                                            :value="item.created"
                                            @input="updateCreated"
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
        ...mapGetters('PaymentsSingle', ['item', 'loading']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('PaymentsSingle', ['fetchData', 'updateData', 'resetState', 'setUser_id', 'setFirst_name', 'setLast_name', 'setZipcode', 'setCountry', 'setPayment_status', 'setTxn_id', 'setTxn_type', 'setPayer_email', 'setPayment_gross', 'setCreated']),
        updateUser_id(e) {
            this.setUser_id(e.target.value)
        },
        updateFirst_name(e) {
            this.setFirst_name(e.target.value)
        },
        updateLast_name(e) {
            this.setLast_name(e.target.value)
        },
        updateZipcode(e) {
            this.setZipcode(e.target.value)
        },
        updateCountry(e) {
            this.setCountry(e.target.value)
        },
        updatePayment_status(e) {
            this.setPayment_status(e.target.value)
        },
        updateTxn_id(e) {
            this.setTxn_id(e.target.value)
        },
        updateTxn_type(e) {
            this.setTxn_type(e.target.value)
        },
        updatePayer_email(e) {
            this.setPayer_email(e.target.value)
        },
        updatePayment_gross(e) {
            this.setPayment_gross(e.target.value)
        },
        updateCreated(e) {
            this.setCreated(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'payments.index' })
                    this.$eventHub.$emit('update-success')
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
