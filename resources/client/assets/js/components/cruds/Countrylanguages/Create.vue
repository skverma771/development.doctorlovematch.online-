<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Countrylanguage</h1>
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
                                    <label for="countrycode">Countrycode</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="countrycode"
                                            placeholder="Enter Countrycode"
                                            :value="item.countrycode"
                                            @input="updateCountrycode"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="language">Language</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="language"
                                            placeholder="Enter Language"
                                            :value="item.language"
                                            @input="updateLanguage"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="isofficial">Isofficial</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="isofficial"
                                            placeholder="Enter Isofficial"
                                            :value="item.isofficial"
                                            @input="updateIsofficial"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="percentage">Percentage</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="percentage"
                                            placeholder="Enter Percentage"
                                            :value="item.percentage"
                                            @input="updatePercentage"
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
        ...mapGetters('CountrylanguagesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CountrylanguagesSingle', ['storeData', 'resetState', 'setCountrycode', 'setLanguage', 'setIsofficial', 'setPercentage']),
        updateCountrycode(e) {
            this.setCountrycode(e.target.value)
        },
        updateLanguage(e) {
            this.setLanguage(e.target.value)
        },
        updateIsofficial(e) {
            this.setIsofficial(e.target.value)
        },
        updatePercentage(e) {
            this.setPercentage(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'countrylanguages.index' })
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
