<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Subscriptionplan</h1>
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
                                    <label for="plan_name">Plan name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="plan_name"
                                            placeholder="Enter Plan name"
                                            :value="item.plan_name"
                                            @input="updatePlan_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="plan_amount">Plan amount</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="plan_amount"
                                            placeholder="Enter Plan amount"
                                            :value="item.plan_amount"
                                            @input="updatePlan_amount"
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
        ...mapGetters('SubscriptionplansSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('SubscriptionplansSingle', ['storeData', 'resetState', 'setPlan_name', 'setPlan_amount']),
        updatePlan_name(e) {
            this.setPlan_name(e.target.value)
        },
        updatePlan_amount(e) {
            this.setPlan_amount(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'subscriptionplans.index' })
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
