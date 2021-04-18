<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Groupsmembers</h1>
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
                                    <label for="groupid">Groupid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="groupid"
                                            placeholder="Enter Groupid"
                                            :value="item.groupid"
                                            @input="updateGroupid"
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
                                    <label for="approved">Approved</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="approved"
                                            placeholder="Enter Approved"
                                            :value="item.approved"
                                            @input="updateApproved"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="requestrecbyid">Requestrecbyid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="requestrecbyid"
                                            placeholder="Enter Requestrecbyid"
                                            :value="item.requestrecbyid"
                                            @input="updateRequestrecbyid"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="created">Created</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="created"
                                            placeholder="Enter Created"
                                            :value="item.created"
                                            @input="updateCreated"
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
        ...mapGetters('GroupsmembersSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('GroupsmembersSingle', ['storeData', 'resetState', 'setGroupid', 'setMemberid', 'setApproved', 'setRequestrecbyid', 'setCreated']),
        updateGroupid(e) {
            this.setGroupid(e.target.value)
        },
        updateMemberid(e) {
            this.setMemberid(e.target.value)
        },
        updateApproved(e) {
            this.setApproved(e.target.value)
        },
        updateRequestrecbyid(e) {
            this.setRequestrecbyid(e.target.value)
        },
        updateCreated(e) {
            this.setCreated(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'groupsmembers.index' })
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
