<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Astrologycalcsign</h1>
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
                                    <label for="signfrom">Signfrom</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="signfrom"
                                            placeholder="Enter Signfrom"
                                            :value="item.signfrom"
                                            @input="updateSignfrom"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="signto">Signto</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="signto"
                                            placeholder="Enter Signto"
                                            :value="item.signto"
                                            @input="updateSignto"
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
        ...mapGetters('AstrologycalcsignsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('AstrologycalcsignsSingle', ['storeData', 'resetState', 'setSignfrom', 'setSignto', 'setDescription']),
        updateSignfrom(e) {
            this.setSignfrom(e.target.value)
        },
        updateSignto(e) {
            this.setSignto(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'astrologycalcsigns.index' })
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
