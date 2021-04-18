<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Personalityoptions</h1>
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
                                    <label for="questionid">Questionid</label>
                                    <v-select
                                            name="questionid"
                                            label="question"
                                            @input="updateQuestionid"
                                            :value="item.questionid"
                                            :options="personalityquestionsAll"
                                            multiple
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="options">Options</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="options"
                                            placeholder="Enter Options"
                                            :value="item.options"
                                            @input="updateOptions"
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
        ...mapGetters('PersonalityoptionsSingle', ['item', 'loading', 'personalityquestionsAll']),
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
        ...mapActions('PersonalityoptionsSingle', ['fetchData', 'updateData', 'resetState', 'setQuestionid', 'setOptions']),
        updateQuestionid(value) {
            this.setQuestionid(value)
        },
        updateOptions(e) {
            this.setOptions(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'personalityoptions.index' })
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
