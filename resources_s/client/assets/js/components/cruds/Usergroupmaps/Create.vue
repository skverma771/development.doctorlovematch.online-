<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Usergroupmap</h1>
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
                                    <label for="group_id">Group id</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="group_id"
                                            placeholder="Enter Group id"
                                            :value="item.group_id"
                                            @input="updateGroup_id"
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
        ...mapGetters('UsergroupmapsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('UsergroupmapsSingle', ['storeData', 'resetState', 'setUser_id', 'setGroup_id']),
        updateUser_id(e) {
            this.setUser_id(e.target.value)
        },
        updateGroup_id(e) {
            this.setGroup_id(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'usergroupmaps.index' })
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
