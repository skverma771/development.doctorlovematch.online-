<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Users</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td>{{ item.name }}</td>
                                            </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ item.email }}</td>
                                            </tr>
                                        <tr>
                                            <th>Role</th>
                                            <td>
                                                <span class="label label-info" v-for="role in item.role">
                                                    {{ role.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Matchstatus</th>
                                            <td>{{ item.matchstatus }}</td>
                                            </tr>
                                        <tr>
                                            <th>Customer id</th>
                                            <td>{{ item.customer_id }}</td>
                                            </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>{{ item.status }}</td>
                                            </tr>
                                        <tr>
                                            <th>Cancelmembership</th>
                                            <td>{{ item.cancelmembership }}</td>
                                            </tr>
                                        <tr>
                                            <th>Unsubscribeemail</th>
                                            <td>{{ item.unsubscribeemail }}</td>
                                            </tr>
                                        <tr>
                                            <th>Usersubscribe</th>
                                            <td>{{ item.usersubscribe }}</td>
                                            </tr>
                                        <tr>
                                            <th>Shareedit</th>
                                            <td>{{ item.shareedit }}</td>
                                            </tr>
                                        <tr>
                                            <th>Sharetime</th>
                                            <td>{{ item.sharetime }}</td>
                                            </tr>
                                        <tr>
                                            <th>Block</th>
                                            <td>{{ item.block }}</td>
                                            </tr>
                                        <tr>
                                            <th>Sendemail</th>
                                            <td>{{ item.sendemail }}</td>
                                            </tr>
                                        <tr>
                                            <th>Lastvisitdate</th>
                                            <td>{{ item.lastvisitdate }}</td>
                                            </tr>
                                        <tr>
                                            <th>Activation</th>
                                            <td>{{ item.activation }}</td>
                                            </tr>
                                        <tr>
                                            <th>Params</th>
                                            <td>{{ item.params }}</td>
                                            </tr>
                                        <tr>
                                            <th>Lastresettime</th>
                                            <td>{{ item.lastresettime }}</td>
                                            </tr>
                                        <tr>
                                            <th>Resetcount</th>
                                            <td>{{ item.resetcount }}</td>
                                            </tr>
                                        <tr>
                                            <th>Otpkey</th>
                                            <td>{{ item.otpkey }}</td>
                                            </tr>
                                        <tr>
                                            <th>Otep</th>
                                            <td>{{ item.otep }}</td>
                                            </tr>
                                        <tr>
                                            <th>Requirereset</th>
                                            <td>{{ item.requirereset }}</td>
                                            </tr>
                                        <tr>
                                            <th>Lookingfor</th>
                                            <td>{{ item.lookingfor }}</td>
                                            </tr>
                                        <tr>
                                            <th>Ethnicity</th>
                                            <td>{{ item.ethnicity }}</td>
                                            </tr>
                                        <tr>
                                            <th>Country</th>
                                            <td>
                                                <span class="label label-info" v-if="item.country !== null">
                                                    {{ item.country.sortname }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>State</th>
                                            <td>
                                                <span class="label label-info" v-if="item.state !== null">
                                                    {{ item.state.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td>
                                                <span class="label label-info" v-if="item.city !== null">
                                                    {{ item.city.name }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{{ item.gender }}</td>
                                            </tr>
                                        <tr>
                                            <th>Personality</th>
                                            <td>{{ item.personality }}</td>
                                            </tr>
                                        <tr>
                                            <th>Aboutme</th>
                                            <td>{{ item.aboutme }}</td>
                                            </tr>
                                        <tr>
                                            <th>Dob</th>
                                            <td>{{ item.dob }}</td>
                                            </tr>
                                        <tr>
                                            <th>Devicetype</th>
                                            <td>{{ item.devicetype }}</td>
                                            </tr>
                                        <tr>
                                            <th>Devicetoken</th>
                                            <td>{{ item.devicetoken }}</td>
                                            </tr>
                                        <tr>
                                            <th>Facebookid</th>
                                            <td>{{ item.facebookid }}</td>
                                            </tr>
                                        <tr>
                                            <th>Gmailid</th>
                                            <td>{{ item.gmailid }}</td>
                                            </tr>
                                        <tr>
                                            <th>Ntcount</th>
                                            <td>{{ item.ntcount }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('UsersSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('UsersSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
