<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Astrologycalc</h1>
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
                                    <label for="zodiac">Zodiac</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="zodiac"
                                            placeholder="Enter Zodiac"
                                            :value="item.zodiac"
                                            @input="updateZodiac"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="daterange">Daterange</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="daterange"
                                            placeholder="Enter Daterange"
                                            :value="item.daterange"
                                            @input="updateDaterange"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="zodiac_images">Zodiac images</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="zodiac_images"
                                            placeholder="Enter Zodiac images"
                                            :value="item.zodiac_images"
                                            @input="updateZodiac_images"
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
        ...mapGetters('AstrologycalcsSingle', ['item', 'loading']),
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
        ...mapActions('AstrologycalcsSingle', ['fetchData', 'updateData', 'resetState', 'setZodiac', 'setDaterange', 'setZodiac_images']),
        updateZodiac(e) {
            this.setZodiac(e.target.value)
        },
        updateDaterange(e) {
            this.setDaterange(e.target.value)
        },
        updateZodiac_images(e) {
            this.setZodiac_images(e.target.value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'astrologycalcs.index' })
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
