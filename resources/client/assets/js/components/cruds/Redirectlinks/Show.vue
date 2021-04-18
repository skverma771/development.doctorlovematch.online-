<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Redirectlinks</h1>
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
                                            <th>Old url</th>
                                            <td>{{ item.old_url }}</td>
                                            </tr>
                                        <tr>
                                            <th>New url</th>
                                            <td>{{ item.new_url }}</td>
                                            </tr>
                                        <tr>
                                            <th>Referer</th>
                                            <td>{{ item.referer }}</td>
                                            </tr>
                                        <tr>
                                            <th>Comment</th>
                                            <td>{{ item.comment }}</td>
                                            </tr>
                                        <tr>
                                            <th>Hits</th>
                                            <td>{{ item.hits }}</td>
                                            </tr>
                                        <tr>
                                            <th>Published</th>
                                            <td>{{ item.published }}</td>
                                            </tr>
                                        <tr>
                                            <th>Created date</th>
                                            <td>{{ item.created_date }}</td>
                                            </tr>
                                        <tr>
                                            <th>Modified date</th>
                                            <td>{{ item.modified_date }}</td>
                                            </tr>
                                        <tr>
                                            <th>Header</th>
                                            <td>{{ item.header }}</td>
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
        ...mapGetters('RedirectlinksSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('RedirectlinksSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
