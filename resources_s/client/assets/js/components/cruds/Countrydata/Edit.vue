<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Countrydata</h1>
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
                                    <label for="code">Code</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="code"
                                            placeholder="Enter Code"
                                            :value="item.code"
                                            @input="updateCode"
                                            >
                                </div>
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
                                    <label for="continent">Continent</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="continent"
                                            placeholder="Enter Continent"
                                            :value="item.continent"
                                            @input="updateContinent"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="region">Region</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="region"
                                            placeholder="Enter Region"
                                            :value="item.region"
                                            @input="updateRegion"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="surfacearea">Surfacearea</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="surfacearea"
                                            placeholder="Enter Surfacearea"
                                            :value="item.surfacearea"
                                            @input="updateSurfacearea"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="indepyear">Indepyear</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="indepyear"
                                            placeholder="Enter Indepyear"
                                            :value="item.indepyear"
                                            @input="updateIndepyear"
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
                                <div class="form-group">
                                    <label for="lifeexpectancy">Lifeexpectancy</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="lifeexpectancy"
                                            placeholder="Enter Lifeexpectancy"
                                            :value="item.lifeexpectancy"
                                            @input="updateLifeexpectancy"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="gnp">Gnp</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="gnp"
                                            placeholder="Enter Gnp"
                                            :value="item.gnp"
                                            @input="updateGnp"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="gnpold">Gnpold</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="gnpold"
                                            placeholder="Enter Gnpold"
                                            :value="item.gnpold"
                                            @input="updateGnpold"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="localname">Localname</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="localname"
                                            placeholder="Enter Localname"
                                            :value="item.localname"
                                            @input="updateLocalname"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="governmentform">Governmentform</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="governmentform"
                                            placeholder="Enter Governmentform"
                                            :value="item.governmentform"
                                            @input="updateGovernmentform"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="headofstate">Headofstate</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="headofstate"
                                            placeholder="Enter Headofstate"
                                            :value="item.headofstate"
                                            @input="updateHeadofstate"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="capital">Capital</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="capital"
                                            placeholder="Enter Capital"
                                            :value="item.capital"
                                            @input="updateCapital"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="code2">Code2</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="code2"
                                            placeholder="Enter Code2"
                                            :value="item.code2"
                                            @input="updateCode2"
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
        ...mapGetters('CountrydataSingle', ['item', 'loading']),
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
        ...mapActions('CountrydataSingle', ['fetchData', 'updateData', 'resetState', 'setCode', 'setName', 'setContinent', 'setRegion', 'setSurfacearea', 'setIndepyear', 'setPopulation', 'setLifeexpectancy', 'setGnp', 'setGnpold', 'setLocalname', 'setGovernmentform', 'setHeadofstate', 'setCapital', 'setCode2']),
        updateCode(e) {
            this.setCode(e.target.value)
        },
        updateName(e) {
            this.setName(e.target.value)
        },
        updateContinent(e) {
            this.setContinent(e.target.value)
        },
        updateRegion(e) {
            this.setRegion(e.target.value)
        },
        updateSurfacearea(e) {
            this.setSurfacearea(e.target.value)
        },
        updateIndepyear(e) {
            this.setIndepyear(e.target.value)
        },
        updatePopulation(e) {
            this.setPopulation(e.target.value)
        },
        updateLifeexpectancy(e) {
            this.setLifeexpectancy(e.target.value)
        },
        updateGnp(e) {
            this.setGnp(e.target.value)
        },
        updateGnpold(e) {
            this.setGnpold(e.target.value)
        },
        updateLocalname(e) {
            this.setLocalname(e.target.value)
        },
        updateGovernmentform(e) {
            this.setGovernmentform(e.target.value)
        },
        updateHeadofstate(e) {
            this.setHeadofstate(e.target.value)
        },
        updateCapital(e) {
            this.setCapital(e.target.value)
        },
        updateCode2(e) {
            this.setCode2(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'countrydatas.index' })
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
