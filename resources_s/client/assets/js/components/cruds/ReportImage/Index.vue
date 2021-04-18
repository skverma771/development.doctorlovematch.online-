<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Report Problem</h1>
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
    import ReportImageUser from "../../dtmodules/ReportImageUserName";
    import ReportImageMemberName from "../../dtmodules/ReportImageMemberName";
    import ReportImageUrl from "../../dtmodules/ReportImageUrl";
    export default {
        data() {
            return {
                columns: [
                    { title: '#', field: 'id', sortable: true, colStyle: 'width: 50px;' },
                    { title: 'Who Reported', tdComp: ReportImageUser, visible: true, colStyle: 'width: 130px;' },
                    { title: 'Whose Reported', tdComp: ReportImageMemberName, visible: true, colStyle: 'width: 130px;' },
                    { title: 'Image Url ', field: 'image_url', sortable: true },
                    { title: 'Action', tdComp: ReportImageUrl, visible: true, colStyle: 'width: 130px;' },

                ],
                query: { sort: 'id', order: 'asc' },
                xprops: {
                    module: 'ReportImageIndex',
                    route: 'reportimage',
                    permission_prefix: 'reportimage_'
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
            ...mapGetters('ReportImageIndex', ['data', 'total', 'loading', 'relationships']),
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
            ...mapActions('ReportImageIndex', ['fetchData', 'setQuery', 'resetState']),
        }
    }
</script>


<style scoped>

</style>
