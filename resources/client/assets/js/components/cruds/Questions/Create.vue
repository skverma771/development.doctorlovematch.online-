<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Questions</h1>
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


                                <div class="col-md-12">
                                    <div class="row">
                                        <div style="margin-bottom: 20px;" class="col-md-12 ">
                                            <label for="questions_type">Select Questions type</label><br>

                                            <input type="radio" value="0" v-model="item.questions_type" /> Single Select
                                            <input type="radio" style="margin-left: 20px" value="1" v-model="item.questions_type" /> Multi Select
                                        </div>
                                        <div style="margin-bottom: 20px;" class="col-md-12 ">
                                            <label for="question">Question</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="questions"
                                                placeholder="Enter Questions"
                                                :value="item.questions"
                                                @input="updateQuestions"
                                            >
                                        </div>

                                        <div class="col-md-4" v-for="(opt,index) in item.options_arr">
                                            Option {{index+1}}
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="options"
                                                placeholder="Enter Option"
                                                v-model="item.options_arr[index].options"
                                            >
                                        </div>
                                    </div>
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
        ...mapGetters('QuestionsSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('QuestionsSingle', ['storeData', 'resetState', 'setQuestions', 'setQuestions_type','setOptions']),
        updateQuestions(e) {
            this.setQuestions(e.target.value)
        },
        updateQuestions_type(e) {
            this.setQuestions_type(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'questions.index' })
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
