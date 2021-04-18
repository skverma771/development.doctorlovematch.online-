<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Message</h1>
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
                                    <label for="message">Message</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="message"
                                            placeholder="Enter Message"
                                            :value="item.message"
                                            @input="updateMessage"
                                            >
                                    </textarea>
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
        ...mapGetters('MessagesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('MessagesSingle', ['storeData', 'resetState', 'setMsg_id', 'setMessage', 'setDatetime']),
        updateMsg_id(e) {
            this.setMsg_id(e.target.value)
        },
        updateMessage(e) {
            this.setMessage(e.target.value)
        },
        updateDatetime(e) {
            this.setDatetime(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'messages.index' })
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
