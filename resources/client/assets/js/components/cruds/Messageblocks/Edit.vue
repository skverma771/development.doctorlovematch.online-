<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Messageblock</h1>
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
                                    <label for="user_id">User id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="user_id"
                                            placeholder="Enter User id"
                                            :value="item.user_id"
                                            @input="updateUser_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="member_id">Member id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="member_id"
                                            placeholder="Enter Member id"
                                            :value="item.member_id"
                                            @input="updateMember_id"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="isblock">Isblock</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="isblock"
                                            placeholder="Enter Isblock"
                                            :value="item.isblock"
                                            @input="updateIsblock"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="isspamorreport">Isspamorreport</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="isspamorreport"
                                            placeholder="Enter Isspamorreport"
                                            :value="item.isspamorreport"
                                            @input="updateIsspamorreport"
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
        ...mapGetters('MessageblocksSingle', ['item', 'loading']),
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
        ...mapActions('MessageblocksSingle', ['fetchData', 'updateData', 'resetState', 'setUser_id', 'setMember_id', 'setIsblock', 'setIsspamorreport']),
        updateUser_id(e) {
            this.setUser_id(e.target.value)
        },
        updateMember_id(e) {
            this.setMember_id(e.target.value)
        },
        updateIsblock(e) {
            this.setIsblock(e.target.value)
        },
        updateIsspamorreport(e) {
            this.setIsspamorreport(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'messageblocks.index' })
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
