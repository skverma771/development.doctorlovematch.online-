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
                                <h3 class="box-title">Create</h3>
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
        ...mapGetters('PersonalityoptionsSingle', ['item', 'loading', 'personalityquestionsAll'])
    },
    created() {
        this.fetchPersonalityquestionsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('PersonalityoptionsSingle', ['storeData', 'resetState', 'setQuestionid', 'setOptions', 'fetchPersonalityquestionsAll']),
        updateQuestionid(value) {
            this.setQuestionid(value)
        },
        updateOptions(e) {
            this.setOptions(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'personalityoptions.index' })
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
