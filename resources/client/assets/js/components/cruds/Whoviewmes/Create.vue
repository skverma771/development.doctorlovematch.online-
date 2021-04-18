<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Whoviewme</h1>
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
                                    <label for="notifystatus">Notifystatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="notifystatus"
                                            placeholder="Enter Notifystatus"
                                            :value="item.notifystatus"
                                            @input="updateNotifystatus"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="notifycancelstatus">Notifycancelstatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="notifycancelstatus"
                                            placeholder="Enter Notifycancelstatus"
                                            :value="item.notifycancelstatus"
                                            @input="updateNotifycancelstatus"
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
        ...mapGetters('WhoviewmesSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('WhoviewmesSingle', ['storeData', 'resetState', 'setUserid', 'setMemberid', 'setNotifystatus', 'setNotifycancelstatus', 'setDatetime']),
        updateUserid(e) {
            this.setUserid(e.target.value)
        },
        updateMemberid(e) {
            this.setMemberid(e.target.value)
        },
        updateNotifystatus(e) {
            this.setNotifystatus(e.target.value)
        },
        updateNotifycancelstatus(e) {
            this.setNotifycancelstatus(e.target.value)
        },
        updateDatetime(e) {
            this.setDatetime(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'whoviewmes.index' })
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
