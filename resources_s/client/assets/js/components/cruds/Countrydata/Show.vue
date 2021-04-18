<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Countrydata</h1>
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
                                            <th>Code</th>
                                            <td>{{ item.code }}</td>
                                            </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ item.name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Continent</th>
                                            <td>{{ item.continent }}</td>
                                            </tr>
                                        <tr>
                                            <th>Region</th>
                                            <td>{{ item.region }}</td>
                                            </tr>
                                        <tr>
                                            <th>Surfacearea</th>
                                            <td>{{ item.surfacearea }}</td>
                                            </tr>
                                        <tr>
                                            <th>Indepyear</th>
                                            <td>{{ item.indepyear }}</td>
                                            </tr>
                                        <tr>
                                            <th>Population</th>
                                            <td>{{ item.population }}</td>
                                            </tr>
                                        <tr>
                                            <th>Lifeexpectancy</th>
                                            <td>{{ item.lifeexpectancy }}</td>
                                            </tr>
                                        <tr>
                                            <th>Gnp</th>
                                            <td>{{ item.gnp }}</td>
                                            </tr>
                                        <tr>
                                            <th>Gnpold</th>
                                            <td>{{ item.gnpold }}</td>
                                            </tr>
                                        <tr>
                                            <th>Localname</th>
                                            <td>{{ item.localname }}</td>
                                            </tr>
                                        <tr>
                                            <th>Governmentform</th>
                                            <td>{{ item.governmentform }}</td>
                                            </tr>
                                        <tr>
                                            <th>Headofstate</th>
                                            <td>{{ item.headofstate }}</td>
                                            </tr>
                                        <tr>
                                            <th>Capital</th>
                                            <td>{{ item.capital }}</td>
                                            </tr>
                                        <tr>
                                            <th>Code2</th>
                                            <td>{{ item.code2 }}</td>
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
        ...mapGetters('CountrydataSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('CountrydataSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
