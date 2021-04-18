<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Usercommeetrequest</h1>
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
                                    <label for="userid">Userid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="userid"
                                            placeholder="Enter Userid"
                                            :value="item.userid"
                                            @input="updateUserid"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="memberid">Memberid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="memberid"
                                            placeholder="Enter Memberid"
                                            :value="item.memberid"
                                            @input="updateMemberid"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="userrequest">Userrequest</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="userrequest"
                                            placeholder="Enter Userrequest"
                                            :value="item.userrequest"
                                            @input="updateUserrequest"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="userresponse">Userresponse</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="userresponse"
                                            placeholder="Enter Userresponse"
                                            :value="item.userresponse"
                                            @input="updateUserresponse"
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
        ...mapGetters('UsercommeetrequestsSingle', ['item', 'loading']),
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
        ...mapActions('UsercommeetrequestsSingle', ['fetchData', 'updateData', 'resetState', 'setUserid', 'setMemberid', 'setUserrequest', 'setUserresponse', 'setDatetime']),
        updateUserid(e) {
            this.setUserid(e.target.value)
        },
        updateMemberid(e) {
            this.setMemberid(e.target.value)
        },
        updateUserrequest(e) {
            this.setUserrequest(e.target.value)
        },
        updateUserresponse(e) {
            this.setUserresponse(e.target.value)
        },
        updateDatetime(e) {
            this.setDatetime(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'usercommeetrequests.index' })
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
