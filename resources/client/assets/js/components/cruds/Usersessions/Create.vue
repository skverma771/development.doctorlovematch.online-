<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Usersession</h1>
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
                                    <label for="username">Username</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="username"
                                            placeholder="Enter Username"
                                            :value="item.username"
                                            @input="updateUsername"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="userstatus">Userstatus</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="userstatus"
                                            placeholder="Enter Userstatus"
                                            :value="item.userstatus"
                                            @input="updateUserstatus"
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
        ...mapGetters('UsersessionsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('UsersessionsSingle', ['storeData', 'resetState', 'setUserid', 'setUsername', 'setUserstatus', 'setCreated']),
        updateUserid(e) {
            this.setUserid(e.target.value)
        },
        updateUsername(e) {
            this.setUsername(e.target.value)
        },
        updateUserstatus(e) {
            this.setUserstatus(e.target.value)
        },
        updateCreated(e) {
            this.setCreated(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'usersessions.index' })
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
