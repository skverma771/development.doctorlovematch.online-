<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Astrologycalcsign</h1>
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
import DatatableActionssign from '../../dtmodules/DatatableActionssign'
import DatatableSingle from '../../dtmodules/DatatableSingle'
import DatatableList from '../../dtmodules/DatatableList'
import DatatableCheckbox from '../../dtmodules/DatatableCheckbox'
import ZodiacNameFrom from "../../dtmodules/ZodiacNameFrom";
import ZodiacNameTo from "../../dtmodules/ZodiacNameTo";
export default {
    data() {
        return {
            columns: [
                { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                { title: 'Signto', tdComp: ZodiacNameTo, visible: true, thClass: 'text-center', tdClass: 'text-center', colStyle: 'width: 50px;' },
                { title: 'Signfrom', tdComp: ZodiacNameFrom, visible: true, thClass: 'text-center', tdClass: 'text-center', colStyle: 'width: 50px;' },


                { title: 'Description', field: 'description', sortable: true , thClass: 'text-center', tdClass: 'text-left', colStyle: 'width: 400px;' },
                { title: 'Actions', tdComp: DatatableActionssign, visible: true, thClass: 'text-right', tdClass: 'text-right', colStyle: 'width: 50px;' }
            ],
            query: { sort: 'id', order: 'asc' },
            xprops: {
                module: 'AstrologycalcsignsIndex',
                route: 'astrologycalcsigns',
                permission_prefix: 'astrologycalcsign_'
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
        ...mapGetters('AstrologycalcsignsIndex', ['data', 'total', 'loading', 'relationships']),
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
        ...mapActions('AstrologycalcsignsIndex', ['fetchData', 'setQuery', 'resetState']),
    }
}
</script>


<style scoped>

</style>
