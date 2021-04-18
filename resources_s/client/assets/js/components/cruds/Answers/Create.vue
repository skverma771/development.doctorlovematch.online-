<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Answers</h1>
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
                                    <label for="questionid">Questionid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="questionid"
                                            placeholder="Enter Questionid"
                                            :value="item.questionid"
                                            @input="updateQuestionid"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="optionid">Optionid</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="optionid"
                                            placeholder="Enter Optionid"
                                            :value="item.optionid"
                                            @input="updateOptionid"
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
        ...mapGetters('AnswersSingle', ['item', 'loading'])
    },
    created() {
        // Code ...
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('AnswersSingle', ['storeData', 'resetState', 'setUserid', 'setQuestionid', 'setOptionid', 'setCreated']),
        updateUserid(e) {
            this.setUserid(e.target.value)
        },
        updateQuestionid(e) {
            this.setQuestionid(e.target.value)
        },
        updateOptionid(e) {
            this.setOptionid(e.target.value)
        },
        updateCreated(e) {
            this.setCreated(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'answers.index' })
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
