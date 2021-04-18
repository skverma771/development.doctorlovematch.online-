<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Users</h1>
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
                                    <label for="name">Name *</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="name"
                                        placeholder="Enter Name *"
                                        :value="item.name"
                                        @input="updateName"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        name="email"
                                        placeholder="Enter Email *"
                                        :value="item.email"
                                        @input="updateEmail"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password *</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Enter Password *"
                                        @input="updatePassword"
                                    >
                                </div>
                               <div class="form-group" v-if="item.id!=1">
                                   <br>
                                   <label for="role">Assign Manual Licence to user</label>
                                   <br>
                                   <div class="row">

                                       <div class="form-group col-md-4">
                                           <label for="role">Select Plan</label>
                                           <v-select
                                               name="licence"
                                               label="plan_name"
                                               :options="Allplans"
                                               v-model="plan_buy"

                                           />
                                       </div>
                                       <div class="form-group col-md-4">
                                           <label for="role">Country *</label>
                                           <input
                                               type="text"
                                               class="form-control"
                                               v-model="country"
                                           >
                                       </div>
                                       <div class="form-group col-md-4">
                                           <label for="role">Zipcode *</label>
                                           <input
                                               type="text"
                                               class="form-control"
                                               v-model="zipcode"
                                           >
                                       </div>
                                   </div>

                               </div>
                                <div class="table-responsive table-resize" v-if="item.id!=1">
                                    <label for="password">Payment History</label>
                                    <table class="table table-bordered" id="example">
                                        <thead>
                                        <tr>
                                            <th width="1%">
                                                Name					</th>

                                            <th width="1%">
                                                ZipCode					</th>

                                            <th width="1%">
                                                Country					</th>

                                            <th width="1%">
                                                Plan Name					</th>

                                            <th width="1%">
                                                PaymentStatus					</th>

                                            <th width="1%">
                                                TransactionId					</th>

                                            <th width="1%">
                                                TransactionType					</th>

                                            <th width="1%">
                                                Payment Date					</th>

                                            <th width="1%">
                                                Payment Expire Date					</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="tras in tras_data">
                                            <td>{{tras.payment.first_name}} </td>
                                            <td>{{tras.payment.zipcode}}</td>
                                            <td>{{tras.payment.country}}</td>
                                            <td>{{tras.plan_id}}</td>
                                            <td>{{tras.payment.payment_status}}</td>
                                            <td>{{tras.payment.txn_id}}</td>
                                            <td>{{tras.payment.txn_type}}</td>
                                            <td>{{tras.plan_date}}</td>
                                            <td>{{tras.expire_date}}</td>
                                        </tr>									</tbody>

                                    </table>
                                </div>

<!--                                <div class="form-group">-->
<!--                                    <label for="role">Role *</label>-->
<!--                                    <v-select-->
<!--                                        name="role"-->
<!--                                        label="title"-->
<!--                                        @input="updateRole"-->
<!--                                        :value="item.role"-->
<!--                                        :options="rolesAll"-->
<!--                                        multiple-->
<!--                                    />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="matchstatus">Matchstatus</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="matchstatus"-->
<!--                                        placeholder="Enter Matchstatus"-->
<!--                                        :value="item.matchstatus"-->
<!--                                        @input="updateMatchstatus"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="customer_id">Customer id</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="customer_id"-->
<!--                                        placeholder="Enter Customer id"-->
<!--                                        :value="item.customer_id"-->
<!--                                        @input="updateCustomer_id"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="status">Status</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="status"-->
<!--                                        placeholder="Enter Status"-->
<!--                                        :value="item.status"-->
<!--                                        @input="updateStatus"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="cancelmembership">Cancelmembership</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="cancelmembership"-->
<!--                                        placeholder="Enter Cancelmembership"-->
<!--                                        :value="item.cancelmembership"-->
<!--                                        @input="updateCancelmembership"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="unsubscribeemail">Unsubscribeemail</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="unsubscribeemail"-->
<!--                                        placeholder="Enter Unsubscribeemail"-->
<!--                                        :value="item.unsubscribeemail"-->
<!--                                        @input="updateUnsubscribeemail"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="usersubscribe">Usersubscribe</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="usersubscribe"-->
<!--                                        placeholder="Enter Usersubscribe"-->
<!--                                        :value="item.usersubscribe"-->
<!--                                        @input="updateUsersubscribe"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="shareedit">Shareedit</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="shareedit"-->
<!--                                        placeholder="Enter Shareedit"-->
<!--                                        :value="item.shareedit"-->
<!--                                        @input="updateShareedit"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="sharetime">Sharetime</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="sharetime"-->
<!--                                        placeholder="Enter Sharetime"-->
<!--                                        :value="item.sharetime"-->
<!--                                        @input="updateSharetime"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="block">Block</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="block"-->
<!--                                        placeholder="Enter Block"-->
<!--                                        :value="item.block"-->
<!--                                        @input="updateBlock"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="sendemail">Sendemail</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="sendemail"-->
<!--                                        placeholder="Enter Sendemail"-->
<!--                                        :value="item.sendemail"-->
<!--                                        @input="updateSendemail"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="lastvisitdate">Lastvisitdate</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="lastvisitdate"-->
<!--                                        placeholder="Enter Lastvisitdate"-->
<!--                                        :value="item.lastvisitdate"-->
<!--                                        @input="updateLastvisitdate"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="activation">Activation</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="activation"-->
<!--                                        placeholder="Enter Activation"-->
<!--                                        :value="item.activation"-->
<!--                                        @input="updateActivation"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="params">Params</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="params"-->
<!--                                        placeholder="Enter Params"-->
<!--                                        :value="item.params"-->
<!--                                        @input="updateParams"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="lastresettime">Lastresettime</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="lastresettime"-->
<!--                                        placeholder="Enter Lastresettime"-->
<!--                                        :value="item.lastresettime"-->
<!--                                        @input="updateLastresettime"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="resetcount">Resetcount</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="resetcount"-->
<!--                                        placeholder="Enter Resetcount"-->
<!--                                        :value="item.resetcount"-->
<!--                                        @input="updateResetcount"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="otpkey">Otpkey</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="otpkey"-->
<!--                                        placeholder="Enter Otpkey"-->
<!--                                        :value="item.otpkey"-->
<!--                                        @input="updateOtpkey"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="otep">Otep</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="otep"-->
<!--                                        placeholder="Enter Otep"-->
<!--                                        :value="item.otep"-->
<!--                                        @input="updateOtep"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="requirereset">Requirereset</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="requirereset"-->
<!--                                        placeholder="Enter Requirereset"-->
<!--                                        :value="item.requirereset"-->
<!--                                        @input="updateRequirereset"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="lookingfor">Lookingfor</label>-->
<!--                                    <div class="radio">-->
<!--                                        <label>-->
<!--                                            <input-->
<!--                                                type="radio"-->
<!--                                                name="lookingfor"-->
<!--                                                :value="item.lookingfor"-->
<!--                                                :checked="item.lookingfor === 'Male'"-->
<!--                                                @change="updateLookingfor('Male')"-->
<!--                                            >-->
<!--                                            Male-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="radio">-->
<!--                                        <label>-->
<!--                                            <input-->
<!--                                                type="radio"-->
<!--                                                name="lookingfor"-->
<!--                                                :value="item.lookingfor"-->
<!--                                                :checked="item.lookingfor === 'Female'"-->
<!--                                                @change="updateLookingfor('Female')"-->
<!--                                            >-->
<!--                                            Female-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="ethnicity">Ethnicity</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="ethnicity"-->
<!--                                        placeholder="Enter Ethnicity"-->
<!--                                        :value="item.ethnicity"-->
<!--                                        @input="updateEthnicity"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="country">Country</label>-->
<!--                                    <v-select-->
<!--                                        name="country"-->
<!--                                        label="sortname"-->
<!--                                        @input="updateCountry"-->
<!--                                        :value="item.country"-->
<!--                                        :options="countriesAll"-->
<!--                                    />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="state">State</label>-->
<!--                                    <v-select-->
<!--                                        name="state"-->
<!--                                        label="name"-->
<!--                                        @input="updateState"-->
<!--                                        :value="item.state"-->
<!--                                        :options="statesAll"-->
<!--                                    />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="city">City</label>-->
<!--                                    <v-select-->
<!--                                        name="city"-->
<!--                                        label="name"-->
<!--                                        @input="updateCity"-->
<!--                                        :value="item.city"-->
<!--                                        :options="citiesAll"-->
<!--                                    />-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="gender">Gender</label>-->
<!--                                    <div class="radio">-->
<!--                                        <label>-->
<!--                                            <input-->
<!--                                                type="radio"-->
<!--                                                name="gender"-->
<!--                                                :value="item.gender"-->
<!--                                                :checked="item.gender === 'Male'"-->
<!--                                                @change="updateGender('Male')"-->
<!--                                            >-->
<!--                                            Male-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="radio">-->
<!--                                        <label>-->
<!--                                            <input-->
<!--                                                type="radio"-->
<!--                                                name="gender"-->
<!--                                                :value="item.gender"-->
<!--                                                :checked="item.gender === 'Female'"-->
<!--                                                @change="updateGender('Female')"-->
<!--                                            >-->
<!--                                            Female-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="radio">-->
<!--                                        <label>-->
<!--                                            <input-->
<!--                                                type="radio"-->
<!--                                                name="gender"-->
<!--                                                :value="item.gender"-->
<!--                                                :checked="item.gender === 'Other'"-->
<!--                                                @change="updateGender('Other')"-->
<!--                                            >-->
<!--                                            Other-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="personality">Personality</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="personality"-->
<!--                                        placeholder="Enter Personality"-->
<!--                                        :value="item.personality"-->
<!--                                        @input="updatePersonality"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="aboutme">Aboutme</label>-->
<!--                                    <textarea-->
<!--                                        rows="3"-->
<!--                                        class="form-control"-->
<!--                                        name="aboutme"-->
<!--                                        placeholder="Enter Aboutme"-->
<!--                                        :value="item.aboutme"-->
<!--                                        @input="updateAboutme"-->
<!--                                    >-->
<!--                                    </textarea>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="dob">Dob</label>-->
<!--                                    <date-picker-->
<!--                                        :value="item.dob"-->
<!--                                        :config="$root.dpconfigDate"-->
<!--                                        name="dob"-->
<!--                                        placeholder="Enter Dob"-->
<!--                                        @dp-change="updateDob"-->
<!--                                    >-->
<!--                                    </date-picker>-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="devicetype">Devicetype</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="devicetype"-->
<!--                                        placeholder="Enter Devicetype"-->
<!--                                        :value="item.devicetype"-->
<!--                                        @input="updateDevicetype"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="devicetoken">Devicetoken</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="devicetoken"-->
<!--                                        placeholder="Enter Devicetoken"-->
<!--                                        :value="item.devicetoken"-->
<!--                                        @input="updateDevicetoken"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="facebookid">Facebookid</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="facebookid"-->
<!--                                        placeholder="Enter Facebookid"-->
<!--                                        :value="item.facebookid"-->
<!--                                        @input="updateFacebookid"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="gmailid">Gmailid</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="gmailid"-->
<!--                                        placeholder="Enter Gmailid"-->
<!--                                        :value="item.gmailid"-->
<!--                                        @input="updateGmailid"-->
<!--                                    >-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label for="ntcount">Ntcount</label>-->
<!--                                    <input-->
<!--                                        type="text"-->
<!--                                        class="form-control"-->
<!--                                        name="ntcount"-->
<!--                                        placeholder="Enter Ntcount"-->
<!--                                        :value="item.ntcount"-->
<!--                                        @input="updateNtcount"-->
<!--                                    >-->
<!--                                </div>-->

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
                tras_data:[],
                plan_buy:null,
                country:'',
                zipcode:'',
                Allplans:[
                    {type:'Full Plan',plan_name:'Full access  ( 3 Month Plan )'},
                    {type:'Compatibility',plan_name:'Compatibility Matches Only ( 3 Month Plan )'},
                    {type:'Personality',plan_name:'Personality Matches Only ( 3 Month Plan )'},

            ],
            }
        },
        computed: {
            ...mapGetters('UsersSingle', ['item', 'loading', 'rolesAll', 'countriesAll', 'statesAll', 'citiesAll']),
        },
        created() {
            this.fetchData(this.$route.params.id)

            axios.get('/api/v1/userspaymentsplans/' + this.$route.params.id)
                .then(response => {
                    this.tras_data=response.data.data
                })
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
            ...mapActions('UsersSingle', ['fetchData', 'updateData', 'resetState', 'setName', 'setEmail', 'setPassword', 'setRole', 'setMatchstatus', 'setCustomer_id', 'setStatus', 'setCancelmembership', 'setUnsubscribeemail', 'setUsersubscribe', 'setShareedit', 'setSharetime', 'setBlock', 'setSendemail', 'setLastvisitdate', 'setActivation', 'setParams', 'setLastresettime', 'setResetcount', 'setOtpkey', 'setOtep', 'setRequirereset', 'setLookingfor', 'setEthnicity', 'setCountry', 'setState', 'setCity', 'setGender', 'setPersonality', 'setAboutme', 'setDob', 'setDevicetype', 'setDevicetoken', 'setFacebookid', 'setGmailid', 'setNtcount']),
            submitForm() {
                if(this.plan_buy!==null){
                    var payment_gross_val='$2.97';
                    var txnid = Math.floor((Math.random() * 10000) + 1);
                    if(this.plan_buy.type=='Full Plan'){
                         payment_gross_val='$5.97';
                    }

                    let params = new FormData();
                    params.set('first_name', this.item.name);
                    params.set('last_name', '');
                    params.set('zipcode', this.zipcode);
                    params.set('country', this.country);
                    params.set('payment_status', 'Completed');
                    params.set('txn_id', txnid);
                    params.set('txn_type', 'Manual');
                    params.set('payer_email', this.item.email);
                    params.set('payment_gross', payment_gross_val);
                    params.set('user_id', this.item.id);
                    params.set('plan', this.plan_buy.type);

                    axios.post('/api/v1/payments', params)
                }

                this.updateData()
                    .then(() => {
                        this.$router.push({ name: 'users.index' })
                        this.$eventHub.$emit('update-success')
                    })
                    .catch((error) => {
                        console.error(error)
                    })
            },
            updateName(e) {
                this.setName(e.target.value)
            },
            updateEmail(e) {
                this.setEmail(e.target.value)
            },
            updatePassword(e) {
                this.setPassword(e.target.value)
            },
            updateRole(value) {
                this.setRole(value)
            },
            updateMatchstatus(e) {
                this.setMatchstatus(e.target.value)
            },
            updateCustomer_id(e) {
                this.setCustomer_id(e.target.value)
            },
            updateStatus(e) {
                this.setStatus(e.target.value)
            },
            updateCancelmembership(e) {
                this.setCancelmembership(e.target.value)
            },
            updateUnsubscribeemail(e) {
                this.setUnsubscribeemail(e.target.value)
            },
            updateUsersubscribe(e) {
                this.setUsersubscribe(e.target.value)
            },
            updateShareedit(e) {
                this.setShareedit(e.target.value)
            },
            updateSharetime(e) {
                this.setSharetime(e.target.value)
            },
            updateBlock(e) {
                this.setBlock(e.target.value)
            },
            updateSendemail(e) {
                this.setSendemail(e.target.value)
            },
            updateLastvisitdate(e) {
                this.setLastvisitdate(e.target.value)
            },
            updateActivation(e) {
                this.setActivation(e.target.value)
            },
            updateParams(e) {
                this.setParams(e.target.value)
            },
            updateLastresettime(e) {
                this.setLastresettime(e.target.value)
            },
            updateResetcount(e) {
                this.setResetcount(e.target.value)
            },
            updateOtpkey(e) {
                this.setOtpkey(e.target.value)
            },
            updateOtep(e) {
                this.setOtep(e.target.value)
            },
            updateRequirereset(e) {
                this.setRequirereset(e.target.value)
            },
            updateLookingfor(value) {
                this.setLookingfor(value)
            },
            updateEthnicity(e) {
                this.setEthnicity(e.target.value)
            },
            updateCountry(value) {
                this.setCountry(value)
            },
            updateState(value) {
                this.setState(value)
            },
            updateCity(value) {
                this.setCity(value)
            },
            updateGender(value) {
                this.setGender(value)
            },
            updatePersonality(e) {
                this.setPersonality(e.target.value)
            },
            updateAboutme(e) {
                this.setAboutme(e.target.value)
            },
            updateDob(e) {
                this.setDob(e.target.value)
            },
            updateDevicetype(e) {
                this.setDevicetype(e.target.value)
            },
            updateDevicetoken(e) {
                this.setDevicetoken(e.target.value)
            },
            updateFacebookid(e) {
                this.setFacebookid(e.target.value)
            },
            updateGmailid(e) {
                this.setGmailid(e.target.value)
            },
            updateNtcount(e) {
                this.setNtcount(e.target.value)
            },

        }
    }
</script>


<style scoped>

</style>
