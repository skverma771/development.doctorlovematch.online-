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
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">

                                <div class="form-group">
                                    <label for="questions_type">Questions type : </label>

                                    <span v-if="item.questions_type==0"> Single Select </span>
                                    <span v-else> Multi Select </span>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
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

                                        <div class="col-md-4" v-for="(opt,index) in options_arr" v-if="options_arr.length>0">
                                            Option {{index+1}}
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="options"
                                                placeholder="Enter Option"
                                                v-model="options_arr[index].options"
                                            >
                                        </div>
                                        <h2 v-else>No Options Available</h2>
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
            options_arr:[],
        }
    },
    computed: {
        ...mapGetters('QuestionsSingle', ['item', 'loading']),
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
        },
        "item.id":function () {
            axios.get('/api/fetch_compatibility_options?id='+this.item.id)
                .then((res)=>{
                    this.options_arr=res.data;
                })
        }
    },
    methods: {
        ...mapActions('QuestionsSingle', ['fetchData', 'updateData', 'resetState', 'setQuestions', 'setQuestions_type']),
        updateQuestions(e) {
            this.setQuestions(e.target.value)
        },
        updateQuestions_type(e) {
            this.setQuestions_type(e.target.value)
        },

        submitForm() {
            let form= new FormData();
            form.set('data',JSON.stringify(this.options_arr));
            form.set('question_id',this.item.id);
            form.set('flag',1);
            axios.post('/api/save_compatibility_options', form)
                .then(res => {
                    this.updateData()
                        .then(() => {
                            this.$router.push({ name: 'questions.index' })
                            this.$eventHub.$emit('update-success')
                        })
                        .catch((error) => {
                            console.error(error)
                        })
                })

        }
    }
}
</script>


<style scoped>

</style>
