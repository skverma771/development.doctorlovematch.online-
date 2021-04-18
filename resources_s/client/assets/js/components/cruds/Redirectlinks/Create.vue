<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Redirectlinks</h1>
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
                                    <label for="old_url">Old url</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="old_url"
                                            placeholder="Enter Old url"
                                            :value="item.old_url"
                                            @input="updateOld_url"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="new_url">New url</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="new_url"
                                            placeholder="Enter New url"
                                            :value="item.new_url"
                                            @input="updateNew_url"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="referer">Referer</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="referer"
                                            placeholder="Enter Referer"
                                            :value="item.referer"
                                            @input="updateReferer"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="comment">Comment</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="comment"
                                            placeholder="Enter Comment"
                                            :value="item.comment"
                                            @input="updateComment"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="hits">Hits</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="hits"
                                            placeholder="Enter Hits"
                                            :value="item.hits"
                                            @input="updateHits"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="published">Published</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="published"
                                            placeholder="Enter Published"
                                            :value="item.published"
                                            @input="updatePublished"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="created_date">Created date</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="created_date"
                                            placeholder="Enter Created date"
                                            :value="item.created_date"
                                            @input="updateCreated_date"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="modified_date">Modified date</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="modified_date"
                                            placeholder="Enter Modified date"
                                            :value="item.modified_date"
                                            @input="updateModified_date"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="header">Header</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="header"
                                            placeholder="Enter Header"
                                            :value="item.header"
                                            @input="updateHeader"
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
        ...mapGetters('RedirectlinksSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('RedirectlinksSingle', ['storeData', 'resetState', 'setOld_url', 'setNew_url', 'setReferer', 'setComment', 'setHits', 'setPublished', 'setCreated_date', 'setModified_date', 'setHeader']),
        updateOld_url(e) {
            this.setOld_url(e.target.value)
        },
        updateNew_url(e) {
            this.setNew_url(e.target.value)
        },
        updateReferer(e) {
            this.setReferer(e.target.value)
        },
        updateComment(e) {
            this.setComment(e.target.value)
        },
        updateHits(e) {
            this.setHits(e.target.value)
        },
        updatePublished(e) {
            this.setPublished(e.target.value)
        },
        updateCreated_date(e) {
            this.setCreated_date(e.target.value)
        },
        updateModified_date(e) {
            this.setModified_date(e.target.value)
        },
        updateHeader(e) {
            this.setHeader(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'redirectlinks.index' })
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
