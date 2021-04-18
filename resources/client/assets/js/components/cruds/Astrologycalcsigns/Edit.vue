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
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="signfrom">Sign-From :</label>
                                    {{signfrom_name}}
                                </div>
                                <div class="form-group">
                                    <label for="signto">Sign-To :</label>
                                    {{signto_name}}
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>

                                        <textarea rows="4" cols="50" style="width: 100%;font-size: 14px;padding: 5px;" @input="updateDescription" v-model="item.description" name="description" class="form-control" >

                                        </textarea>
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
            signfrom_name:'',
            signto_name:''
        }
    },

    computed: {
        ...mapGetters('AstrologycalcsignsSingle', ['item', 'loading']),
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
        "item.signfrom":function () {
            axios.get('/api/fetch_zodiac_sign_name?id='+this.item.signfrom)
                .then(response => {
                    this.signfrom_name=response.data;
                })
            axios.get('/api/fetch_zodiac_sign_name?id='+this.item.signto)
                .then(response => {
                    this.signto_name=response.data;
                })
        }
    },
    methods: {
        ...mapActions('AstrologycalcsignsSingle', ['fetchData', 'updateData', 'resetState', 'setSignfrom', 'setSignto', 'setDescription']),
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
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'astrologycalcsigns.index' })
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
