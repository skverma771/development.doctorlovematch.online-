<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Userspaymentsplan</h1>
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
                                    <label for="payment_id">Payment id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="payment_id"
                                            placeholder="Enter Payment id"
                                            :value="item.payment_id"
                                            @input="updatePayment_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="plan_id">Plan id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="plan_id"
                                            placeholder="Enter Plan id"
                                            :value="item.plan_id"
                                            @input="updatePlan_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="plan_date">Plan date</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="plan_date"
                                            placeholder="Enter Plan date"
                                            :value="item.plan_date"
                                            @input="updatePlan_date"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="expire_date">Expire date</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="expire_date"
                                            placeholder="Enter Expire date"
                                            :value="item.expire_date"
                                            @input="updateExpire_date"
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
        ...mapGetters('UserspaymentsplansSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('UserspaymentsplansSingle', ['storeData', 'resetState', 'setUser_id', 'setPayment_id', 'setPlan_id', 'setPlan_date', 'setExpire_date']),
        updateUser_id(e) {
            this.setUser_id(e.target.value)
        },
        updatePayment_id(e) {
            this.setPayment_id(e.target.value)
        },
        updatePlan_id(e) {
            this.setPlan_id(e.target.value)
        },
        updatePlan_date(e) {
            this.setPlan_date(e.target.value)
        },
        updateExpire_date(e) {
            this.setExpire_date(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'userspaymentsplans.index' })
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
