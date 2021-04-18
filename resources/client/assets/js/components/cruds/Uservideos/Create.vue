<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Uservideos</h1>
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
                                    <label for="videourl">Videourl</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="videourl"
                                            placeholder="Enter Videourl"
                                            :value="item.videourl"
                                            @input="updateVideourl"
                                            >
                                </div>
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
                                    <label for="title">Title</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Enter Title"
                                            :value="item.title"
                                            @input="updateTitle"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="location"
                                            placeholder="Enter Location"
                                            :value="item.location"
                                            @input="updateLocation"
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
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="viewed">Viewed</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="viewed"
                                            placeholder="Enter Viewed"
                                            :value="item.viewed"
                                            @input="updateViewed"
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
        ...mapGetters('UservideosSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('UservideosSingle', ['storeData', 'resetState', 'setVideourl', 'setUser_id', 'setTitle', 'setLocation', 'setDatetime', 'setDescription', 'setViewed']),
        updateVideourl(e) {
            this.setVideourl(e.target.value)
        },
        updateUser_id(e) {
            this.setUser_id(e.target.value)
        },
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateLocation(e) {
            this.setLocation(e.target.value)
        },
        updateDatetime(e) {
            this.setDatetime(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateViewed(e) {
            this.setViewed(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'uservideos.index' })
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
