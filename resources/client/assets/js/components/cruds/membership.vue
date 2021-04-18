<template>

  <div class="container" style="padding-top: 50px !important;margin-bottom: 50px !important;">

      <div class=" col-md-12 tab-dismiss">
          <div class="container main">
              <div class="row plan-info">

                  <div class="col-md-4 col-sm-4 col-xs-12" v-if="license==false && license1==false">
                      <label>Plan Name:</label>
                      <span>Full Option Plan</span><br>
                      <!-- <label>Days left:</label> -->
                      <span>Your plan has been expired. If you like to upgrade, click on renew plan button now !</span>
                      <div>
                          <a  @click="license1=true" href="#" >
                              <button type="button"  class="redBtn">Renew Plan</button>
                          </a>
                      </div>
                  </div>
                  <div class="container" v-if="license1==true">
                      <!-- <p>Congratulation!</p>
                      <p>You have Completed your Assessment Questions.</p> -->
                      <p class="upgrade-txt">To have access to the features please Upgrade Now !</p>
                      <div class="row">

                          <div class="all-plan-div clearfix">
                              <h3 class="heading">Choose your Plan</h3>

                              <div class="payment" v-if="license_obj.Compatibility==false">
                                  <div class="rate">
                                      <h4>$0.99 <span>per/month</span></h4>
                                      <p>$2.97 Total</p>
                                  </div>

                                  <div class="text-para">
                                      <h3>3 Month Plan</h3>

                                      <p>Access to Compatibility Matches Only</p>

                                      <button type="button" @click="fullplan=false,comp=true,persplan=false,plan='comp',cost='2.97'" class="btn btn-danger Upgrade ">UPGRADE</button>
                                      <PayPal v-if="comp"
                                              amount="2.97"
                                              currency="USD"
                                              :client="credentials"
                                              env="sandbox"
                                              v-on:payment-authorized="paymentAuthorized"
                                              v-on:payment-completed="paymentCompleted"
                                              v-on:payment-cancelled="paymentCancelled"
                                      >

                                      </PayPal>

                                  </div>
                              </div>



                              <div class="payment" v-if="license_obj.Personality==false">
                                  <div class="rate">
                                      <h4>$0.99 <span>per/month</span></h4>
                                      <p>$2.97 Total</p>
                                  </div>

                                  <div class="text-para">
                                      <h3>3 Month Plan</h3>

                                      <p>Access to Personality Matches Only</p>


                                      <button type="button" @click="fullplan=false,comp=false,persplan=true,plan='pers',cost='2.97'" class="btn btn-danger Upgrade ">UPGRADE</button>
                                      <PayPal v-if="persplan"
                                              amount="2.97"
                                              currency="USD"
                                              :client="credentials"
                                              env="sandbox"
                                              v-on:payment-authorized="paymentAuthorized"
                                              v-on:payment-completed="paymentCompleted"
                                              v-on:payment-cancelled="paymentCancelled"
                                      >

                                      </PayPal>

                                  </div>
                              </div>



                              <div class="payment" v-if="license==false">
                                  <div class="rate">
                                      <h4>$1.99 <span>per/month</span></h4>
                                      <p>$5.97 Total</p>
                                  </div>

                                  <div class="text-para">
                                      <h3>3 Month Plan</h3>

                                      <p>Full access to the site </p>

                                      <button type="button" @click="fullplan=true,comp=false,persplan=false,plan='full',cost='5.97'" class="btn btn-danger Upgrade ">UPGRADE</button>
                                      <PayPal v-if="fullplan"
                                              amount="5.97"
                                              currency="USD"
                                              :client="credentials"
                                              env="sandbox"
                                              v-on:payment-authorized="paymentAuthorized"
                                              v-on:payment-completed="paymentCompleted"
                                              v-on:payment-cancelled="paymentCancelled"
                                      >

                                      </PayPal>

                                  </div>
                              </div>



                          </div>


                      </div>
                  </div>

              </div>

              <div class="table-responsive table-resize">
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
          </div>

      </div>


  </div>
</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'
    import PayPal from 'vue-paypal-checkout'
    export default {
        data() {
            return{
                fullplan:false,
                persplan:false,
                comp:false,
                plan:'',
                cost:'',

                credentials: {
                    sandbox: 'AaJpRXGi4fQDE9THZFKqaQgCEPeV3aHha5KtPkrnWov01VjJ3BjVDHXnvoDDkEzCKNi3c4J_oIY4KBWD',
                    production: 'AVn7W11d7jMCiK_P7xSgTpQcdUZIrR89BaMpLpf1HcF7irn7nEROCeGzvvuGU_f0Cvjy3BxWt91EKezn'
                },


                license:false,
                license1:false,
                license_obj:'',
                tras_data:[]

            }
        },
        components: {
            PayPal
        },
        created() {
            axios.post('/api/v1/license')
                .then(response => {
                    this.license_obj=JSON.parse(response.data.license);
                    if(JSON.parse(response.data.license).Full){
                        this.license=true;
                    }

                })
            axios.get('/api/v1/userspaymentsplans/' + document.querySelector("meta[name='user-id']").getAttribute('content'))
                .then(response => {
                 this.tras_data=response.data.data
                })

        },
        destroyed() {

        },
        watch: {},
        methods: {
            paymentAuthorized: function (data) {
                console.log('paymentAuthorized');
                console.log(data);
            },
            paymentCompleted: function (data) {
                console.log('paymentCompleted');
                console.log(data);
                var plan='';
                if(data.state=='approved') {

                    if (this.plan == 'comp') {
                        plan = 'Compatibility';
                    }
                    else if(this.plan == 'pers'){
                        plan='Personality';
                    }
                    else {
                        plan = 'Full Plan';
                    }
                    let params = new FormData();
                    params.set('first_name', this.data_item.name);
                    params.set('last_name', '');
                    params.set('zipcode', this.data_item.name);
                    params.set('country', this.data_item.country.name);
                    params.set('payment_status', 'Completed');
                    params.set('txn_id', data.id);
                    params.set('txn_type', data.payer.payment_method);
                    params.set('payer_email', this.data_item.email);
                    params.set('payment_gross', this.cost);
                    params.set('user_id', this.data_item.id);
                    params.set('plan', plan);

                    axios.post('/api/v1/payments', params)

                }
            },
            paymentCancelled: function (data) {
                console.log('paymentCancelled');
                console.log(data);
            },

        },
        props: ['data_item']
    }
</script>


<style scoped>

    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
        border: 1px solid #747d7d;
    }

    .table-bordered {
        border: 1px solid #747d7d;
    }

    .membars ,.shadowBox {background-color: #fff; /* layer fill content */
        -moz-box-shadow: 0 0 3px #b8b8b8; /* drop shadow */
        -webkit-box-shadow: 0 0 3px #b8b8b8; /* drop shadow */
        box-shadow: 0 0 3px #b8b8b8; /* drop shadow */
        padding: 15px 0; margin-bottom: 30px}

    .membars .col-md-2 .membarsProfile ,.shadowInner ,.membars .col-md-3 .membarsProfile {border: 1px solid #d1d1d1; /* stroke */
        background-color: #f7f7f7; /* layer fill content */
        -moz-box-shadow: 0 0 3px rgba(173,173,173,.5); /* drop shadow */
        -webkit-box-shadow: 0 0 3px rgba(173,173,173,.5); /* drop shadow */
        box-shadow: 0 0 3px rgba(173,173,173,.5); /* drop shadow */}
    .membars .col-md-2 .membarsProfile {overflow:hidden;}
    .membars .col-md-2 .membarsProfile img {transform: scale(1);transition: all 1s cubic-bezier(0.19, 1, 0.22, 1) 0s;}
    .membars .col-md-2 .membarsProfile:hover img {transform: scale(1.1);}

    .membersheight {min-height: 195px;}
    /*---------header-------shristi----------------*/
    .margin-0{margin: 0 !important;}

    .membars > div >  .memberhead-color{background-color: #CA333E;padding: 0}
    .membars > div >  .memberhead-color h6{padding: 9px 10px;color: #fff}
    .membars > div >  .memberhead-color ol.breadcrumb li{float: left;}
    .membars > div >  .memberhead-color ol.breadcrumb li a{padding: 10px; color: #fff; display: inline-block; }
    .membars > div >  .memberhead-color ol.breadcrumb li a.active,.membars .memberhead-color ol.breadcrumb li a:hover,.membars .memberhead-color ol.breadcrumb li a:active,.membars .memberhead-color ol.breadcrumb li a:focus{background-color: #ccc;color: #000; text-decoration: none}
    .membars > div >  .memberhead-color ol.breadcrumb li::before{content: "" !important;padding: 0 !important}
    .about {position: relative;}
    .profile-btn, .profile-btn .updateBtn-edit {top: 4px !important;z-index: 11;right: 10px !important;position: absolute;width: 110px;}
    /*---------header-------shristi----------------*/


    .membars .membarhead {border-bottom: 1px solid #e8e8e8; margin-bottom: 15px;background: #CA333E;}
    .membars .memberhead h6{padding: 9px 10px;color: #fff}
    /*.membars .memberhead ol.breadcrumb li{float: right;}*/
    .membars .membarhead ol.breadcrumb li a{padding: 11px; color: #fff; display: inline-block; }
    .membars .membarhead ol.breadcrumb li a:focus,.membars .membarhead ol.breadcrumb li a:hover,
    .membars .membarhead ol.breadcrumb li a:active, .membars .membarhead ol.breadcrumb li a.active{background-color: #ccc;color: #000; text-decoration: none}
    .membars .membarhead ol.breadcrumb li::before{content: "" !important;padding: 0 !important}

    /*.membars .membarhead {border-bottom: 1px solid #e8e8e8; margin-bottom: 15px; padding-bottom:15px; background: #D9D9D9; padding: 10px}*/
    .membarhead  .form-horizontal .control-label {text-align: left;}
    .membars h6 ,.shadowBox h6 {color: #000; /* text color */font-family: "Roboto";font-size:18px; margin: 0px; float: left;}
    .membars .breadcrumb {float: right;}
    /*.membars .breadcrumb li a.active {color: #ca333e;}*/
    .seekingMembars .col-md-2 {margin-bottom: 15px;}
    .img-holder{height: 135px;overflow: hidden;}
    .membars .col-md-2 .membarsProfile img {max-width:100%; height: auto;max-height: 100%;margin: 0 auto;}
    .membars .col-md-2 .membarsProfile hgroup {padding: 0 7px;}
    .membars .col-md-2 .membarsProfile h2 {color:#db3f4b; font-size: 16px; margin:10px 0;}
    .membars .col-md-2 .membarsProfile h3 {color:#1579c5; font-size: 14px; margin:0 0 10px 0; font-weight: 300}
    .membars .col-md-2 .membarsProfile h4 {font-weight: normal; font-size: 12px;}
    .membars .col-md-2 .membarsProfile h4 span {margin-right: 5px;}
    .membars .col-md-2 .membarsProfile h4 span:nth-child(1) {color:#50c278;}
    .membars .col-md-2 .membarsProfile h4 span:nth-child(2) {color:#dc626c; font-size: 15px;}

    .membars .col-sm-4 .membarsProfile img {width:100%; margin: 0 auto;height: 140px;}
    .membars .col-sm-4 .membarsProfile hgroup {padding: 0 7px;}
    .membars .col-sm-4 .membarsProfile h2 {color:#db3f4b; font-size: 16px; margin:10px 0;}
    .btn-danger.membars .col-sm-4 .membarsProfile h3 {color:#1579c5; font-size: 14px; margin:0 0 10px 0; font-weight: 300}
    .membars .col-sm-4 .membarsProfile h4 {font-weight: normal; font-size: 12px;}
    .membars .col-sm-4 .membarsProfile h4 span {margin-right: 5px;}
    .membars .col-sm-4 .membarsProfile h4 span:nth-child(1) {color:#50c278;}
    .membars .col-sm-4 .membarsProfile h4 span:nth-child(2) {color:#dc626c; font-size: 15px;}

    .breadcrumb > li + li::before {content: " | ";}
    .membars .breadcrumb {margin:0px; background: none; padding: 0px;}
    .membars .breadcrumb li a ,.membars .breadcrumb li {font-size: 14px; font-weight: 500}
    .membars .col-md-2 .membarsProfile h2 span {color: #545555}
</style>
