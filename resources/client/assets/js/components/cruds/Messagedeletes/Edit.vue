<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Messagedelete</h1>
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
                                    <label for="from_user_id">From user id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="from_user_id"
                                            placeholder="Enter From user id"
                                            :value="item.from_user_id"
                                            @input="updateFrom_user_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="to_id">To id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="to_id"
                                            placeholder="Enter To id"
                                            :value="item.to_id"
                                            @input="updateTo_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="msg_id">Msg id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="msg_id"
                                            placeholder="Enter Msg id"
                                            :value="item.msg_id"
                                            @input="updateMsg_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="status"
                                            placeholder="Enter Status"
                                            :value="item.status"
                                            @input="updateStatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="datetime">Datetime</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="datetime"
                                            placeholder="Enter Datetime"
                                            :value="item.datetime"
                                            @input="updateDatetime"
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
        ...mapGetters('MessagedeletesSingle', ['item', 'loading']),
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
        ...mapActions('MessagedeletesSingle', ['fetchData', 'updateData', 'resetState', 'setFrom_user_id', 'setTo_id', 'setMsg_id', 'setStatus', 'setDatetime']),
        updateFrom_user_id(e) {
            this.setFrom_user_id(e.target.value)
        },
        updateTo_id(e) {
            this.setTo_id(e.target.value)
        },
        updateMsg_id(e) {
            this.setMsg_id(e.target.value)
        },
        updateStatus(e) {
            this.setStatus(e.target.value)
        },
        updateDatetime(e) {
            this.setDatetime(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'messagedeletes.index' })
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
