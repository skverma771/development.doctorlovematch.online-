<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Payments</h1>
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
                // { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'User id', field: 'user_id', sortable: true },
                { title: 'First name', field: 'first_name', sortable: true },
                { title: 'Last name', field: 'last_name', sortable: true },
                { title: 'Zipcode', field: 'zipcode', sortable: true },
                { title: 'Country', field: 'country', sortable: true },
                { title: 'Payment status', field: 'payment_status', sortable: true },
                { title: 'Txn id', field: 'txn_id', sortable: true },
                { title: 'Txn type', field: 'txn_type', sortable: true },
                { title: 'Payer email', field: 'payer_email', sortable: true },
                { title: 'Payment gross', field: 'payment_gross', sortable: true },
                // { title: 'Actions', tdComp: DatatableActions, visible: true, thClass: 'text-right', tdClass: 'text-right', colStyle: 'width: 130px;' }
            ],
            query: { sort: 'user_id', order: 'asc' },
            xprops: {
                module: 'PaymentsIndex',
                route: 'payments',
                permission_prefix: 'payment_'
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
        ...mapGetters('PaymentsIndex', ['data', 'total', 'loading', 'relationships']),
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
        ...mapActions('PaymentsIndex', ['fetchData', 'setQuery', 'resetState']),
    }
}
</script>


<style scoped>

</style>
