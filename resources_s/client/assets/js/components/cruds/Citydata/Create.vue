<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Citydata</h1>
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
                                    <label for="name">Name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="name"
                                            placeholder="Enter Name"
                                            :value="item.name"
                                            @input="updateName"
                                            >
                                </div>
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
                                    <label for="district">District</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="district"
                                            placeholder="Enter District"
                                            :value="item.district"
                                            @input="updateDistrict"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="population">Population</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="population"
                                            placeholder="Enter Population"
                                            :value="item.population"
                                            @input="updatePopulation"
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
        ...mapGetters('CitydataSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('CitydataSingle', ['storeData', 'resetState', 'setName', 'setCountrycode', 'setDistrict', 'setPopulation']),
        updateName(e) {
            this.setName(e.target.value)
        },
        updateCountrycode(e) {
            this.setCountrycode(e.target.value)
        },
        updateDistrict(e) {
            this.setDistrict(e.target.value)
        },
        updatePopulation(e) {
            this.setPopulation(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'citydatas.index' })
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
