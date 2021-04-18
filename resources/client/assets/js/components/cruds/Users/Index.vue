<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Users</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">List</h3>
                        </div>

                        <div class="box-body">
                            <div class="btn-group">
<!--                                <router-link-->
<!--                                        v-if="$can(xprops.permission_prefix + 'create')"-->
<!--                                        :to="{ name: xprops.route + '.create' }"-->
<!--                                        class="btn btn-success btn-sm"-->
<!--                                        >-->
<!--                                    <i class="fa fa-plus"></i> Add new-->
<!--                                </router-link>-->

                                <button type="button" class="btn btn-default btn-sm" @click="fetchData">
                                    <i class="fa fa-refresh" :class="{'fa-spin': loading}"></i> Refresh
                                </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="row" v-if="loading">
                                <div class="col-xs-4 col-xs-offset-4">
                                    <div class="alert text-center">
                                        <i class="fa fa-spin fa-refresh"></i> Loading
                                    </div>
                                </div>
                            </div>

                            <datatable
                                    v-if="!loading"
                                    :columns="columns"
                                    :data="data"
                                    :total="total"
                                    :query="query"
                                    :xprops="xprops"
                                    />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '../../dtmodules/DatatableActions'
import DatatableSingle from '../../dtmodules/DatatableSingle'
import DatatableList from '../../dtmodules/DatatableList'
import DatatableCheckbox from '../../dtmodules/DatatableCheckbox'


export default {
    data() {
        return {
            columns: [
                { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'Name', field: 'name', sortable: true },
                { title: 'Email', field: 'email', sortable: true },
                { title: 'Role', field: 'role', tdComp: DatatableList },
                // { title: 'Cancelmembership', field: 'cancelmembership', sortable: true },
                // { title: 'Unsubscribeemail', field: 'unsubscribeemail', sortable: true },
                // { title: 'Usersubscribe', field: 'usersubscribe', sortable: true },
                // { title: 'Shareedit', field: 'shareedit', sortable: true },
                // { title: 'Sharetime', field: 'sharetime', sortable: true },
                // { title: 'Block', field: 'block', sortable: true },
                // { title: 'Sendemail', field: 'sendemail', sortable: true },
                // { title: 'Lastvisitdate', field: 'lastvisitdate', sortable: true },
                // { title: 'Activation', field: 'activation', sortable: true },
                // { title: 'Params', field: 'params', sortable: true },
                // { title: 'Lastresettime', field: 'lastresettime', sortable: true },
                // { title: 'Resetcount', field: 'resetcount', sortable: true },
                // { title: 'Otpkey', field: 'otpkey', sortable: true },
                // { title: 'Otep', field: 'otep', sortable: true },
                // { title: 'Requirereset', field: 'requirereset', sortable: true },
                // { title: 'Lookingfor', field: 'lookingfor', sortable: true },
                // { title: 'Ethnicity', field: 'ethnicity', sortable: true },
                // { title: 'Country', field: 'country', tdComp: DatatableSingle },
                // { title: 'State', field: 'state', tdComp: DatatableSingle },
                // { title: 'City', field: 'city', tdComp: DatatableSingle },
                // { title: 'Gender', field: 'gender', sortable: true },
                // { title: 'Personality', field: 'personality', sortable: true },
                // { title: 'Aboutme', field: 'aboutme', sortable: true },
                // { title: 'Dob', field: 'dob', sortable: true },
                // { title: 'Devicetype', field: 'devicetype', sortable: true },
                // { title: 'Devicetoken', field: 'devicetoken', sortable: true },
                // { title: 'Facebookid', field: 'facebookid', sortable: true },
                // { title: 'Gmailid', field: 'gmailid', sortable: true },
                // { title: 'Ntcount', field: 'ntcount', sortable: true },
                { title: 'Actions', tdComp: DatatableActions, visible: true, thClass: 'text-right', tdClass: 'text-right', colStyle: 'width: 130px;' }
            ],
            query: { sort: 'id', order: 'asc' },
            xprops: {
                module: 'UsersIndex',
                route: 'users',
                permission_prefix: 'user_'
            }
        }
    },
    created() {
        this.$root.relationships = this.relationships
        this.fetchData()
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('UsersIndex', ['data', 'total', 'loading', 'relationships']),
    },
    watch: {
        query: {
            handler(query) {
                this.setQuery(query)
            },
            deep: true
        }
    },
    methods: {
        ...mapActions('UsersIndex', ['fetchData', 'setQuery', 'resetState']),
    }
}
</script>


<style scoped>

</style>

