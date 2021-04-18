<template >
    <div class="container" style="padding-top: 50px !important;margin-bottom: 50px !important;"  >
        <div class="membars clearfix seekingMembars ">

            <div class="col-md-12 tab-dismiss padding0">
                <div class="membarhead clearfix">

                    <ol class="breadcrumb personality-tabs no-content  pull-left">
                        <li id='newquestions' @click="questions_div=true,matches_div=false">
                            <a :class="[questions_div ? 'active' : '' ]" style="cursor: pointer;">Update Questions</a>
                        </li>


                        <!-- <li id='QuestionMatch'><a href="#">Personality Matchers</a></li> -->

                        <li  id='QuestionMatch' @click="check_status()">
                            <a :class="[matches_div ? 'active' : '' ]" style="cursor: pointer;">Compatibility Matches</a></li>

                    </ol>
                </div>
            </div>

            <!-- Menbars list -->
            <div class="col-md-12 padding0"  v-if="questions_div" id='questionslist'>



                <div class="matches_presonality">

                    <div class="question clearfix" v-for="(ques,index) in questions">
                        <h2>{{index+1}}. {{ques.question}}</h2>
                        <div class="questionBlock">
                            <ul v-for="(options,index2) in ques.options">
                               <li>
<!--                                    <label>-->
<!--                                        <input type="radio" name="check_21" value="58">-->
<!--                                        -->
<!--                                        Yes				-->
<!--                                    -->
<!--                                    </label>-->
                                   <label>

                                       <input :type="[ques.questions_type==0 ? 'radio' : 'checkbox' ]"  class= 'radiochek' autocomplete="off" v-if="options.checked==1" checked="checked"  :name="'radio_'+ques.ques_id" :id="options.option_id" :value="options.option_id">
                                       <input :type="[ques.questions_type==0 ? 'radio' : 'checkbox' ]" class= 'radiochek' autocomplete="off" v-else  :name="'radio_'+ques.ques_id" :id="options.option_id" :value="options.option_id">
                                       {{options.name}}

                                   </label>
                                </li>

                            </ul>

                        </div>
                    </div>

<!--                    <div class="assessment">-->


<!--                        <ul  v-for="(ques,index) in questions">-->
<!--                            <hr v-if="index!=0" />-->
<!--                            <span class='persweight'>{{ques.question}}</span>-->
<!--                            <li v-for="(options,index2) in ques.options">-->
<!--                                <label>-->
<!--                                    <input type="radio" class= 'radiochek' autocomplete="off" v-if="options.checked==1" checked="checked"  :name="'radio_'+ques.ques_id" :id="options.option_id" :value="options.option_id">-->
<!--                                    <input type="radio" class= 'radiochek' autocomplete="off" v-else  :name="'radio_'+ques.ques_id" :id="options.option_id" :value="options.option_id">-->
<!--                                    {{options.name}}</label>-->
<!--                            </li>-->
<!--                        </ul>-->




<!--                    </div>-->
                    <div>
                        <button class="redBtn" type='submit' @click="submit_assessment()">Submit Assessment</button>
                    </div>
                </div>

            </div>
            <div class="col-md-12 padding0"  v-if="matches_div">
                <div class="container" v-if="license==true">
                    <!-- <p>Congratulation!</p>
                    <p>You have Completed your Assessment Questions.</p> -->
                    <p class="upgrade-txt">To have access to see your Personality Matches please Upgrade now!</p>
                    <div class="row">
                        <div class="col-sm-7">
                            <h3 class="heading">Choose your Plan</h3>
                            <div class="payment">
                                <div class="rate">
                                    <h4>$0.99 <span>per/month</span></h4>
                                    <p>$2.97 Total</p>
                                </div>

                                <div class="text-para">
                                    <h3>3 Month Plan</h3> <p>Access to Compatibility Matches Only</p>

                                    <!--<a href="#payment_div">-->
                                    <button type="button" @click="fullplan=false,persplan=true,plan='comp',cost='2.97'" class="btn btn-danger Upgrade ">UPGRADE</button>
                                    <PayPal v-if="persplan"
                                            amount="2.97"
                                            currency="USD"
                                            :client="credentials"
                                            env="sandbox"
                                            v-on:payment-authorized="paymentAuthorized"
                                            v-on:payment-completed="paymentCompleted"
                                            v-on:payment-cancelled="paymentCancelled"
                                    >

                                    </PayPal> <!--</a>-->
                                </div>
                            </div>

                            <div class="payment">
                                <div class="rate">
                                    <h4>$1.99 <span>per/month</span></h4>
                                    <p>$5.97 Total</p>
                                </div>

                                <div class="text-para">
                                    <h3>3 Month Plan</h3>          <p>Full access to the site </p>

                                    <!--<a href="#payment_div">-->
                                    <button type="button" @click="fullplan=true,persplan=false,plan='full',cost='5.97'" class="btn btn-danger Upgrade ">UPGRADE</button>
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
                                    <!--</a>-->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="" v-else>

                    <div class="col-md-2 col-sm-4 padding0" v-for="post in matches" :key="post.data.id">
                        <div class="membarsProfile">
                            <div class="img-holder">
                                <a href="#" @click="viewprofile(post.data.id)">
                                    <img v-if="JSON.parse(post.data.pictures).profile" :src="JSON.parse(post.data.pictures).profile" alt="doctor lovematch" class="img-responsive">
                                    <img v-else src="https://doctorlovematch.com/templates/lovematch/profile/thumbSeekingImage/female.jpg" alt="doctor lovematch" class="img-responsive">
                                </a>
                            </div>
                            <hgroup>
                                <h2>{{post.data.name}} <span>{{post.data.ntcount}}</span></h2>
                                <h3>
                                    {{post.data.country.name}}</h3><h3>
                            </h3><h4>
                                <span>offline</span>
                            </h4>
                            </hgroup>
                            <div class="matches">
                                {{post.match_ratio}}% <span>Match</span>
                            </div>
                        </div>
                    </div>
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
                plan:'',
                cost:'',

                credentials: {
                    sandbox: 'AaJpRXGi4fQDE9THZFKqaQgCEPeV3aHha5KtPkrnWov01VjJ3BjVDHXnvoDDkEzCKNi3c4J_oIY4KBWD',
                    production: 'AVn7W11d7jMCiK_P7xSgTpQcdUZIrR89BaMpLpf1HcF7irn7nEROCeGzvvuGU_f0Cvjy3BxWt91EKezn'
                },

                questions_div:true,
                matches_div:false,
                question_filled:0,
                questions:[],
                license:true,
                matches:[],
            }
        },
        components: {
            PayPal
        },
        created() {

            let params=new FormData();
            params.set('id',this.data_item.id);
            axios.post('/api/compatibility_question' , params)
                .then(response => {
                    this.questions=response.data.data;
                    this.question_filled=response.data.filled;
                    if(this.question_filled>0){
                        this.questions_div=false;
                        this.matches_div=true;

                    }

                })
            axios.post('/api/v1/license')
                .then(response => {
                    if(JSON.parse(response.data.license).Compatibility || JSON.parse(response.data.license).Full){
                        this.license=false;
                    }




                })
        },
        destroyed() {

        },
        watch: {
            "questions_div":function () {
                this.fetch_matches();
            }
        },
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
                    } else {
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
            submit_assessment(){

                if(this.questions.length>0){
                    var return_arr=[];
                    var radio_ans=0;
                    var checkbox_ans=0;
                    var ans=[];
                    this.questions.forEach( (ques) =>{

                        ques.options.forEach( (options) => {

                            if(document.getElementById(options.option_id).checked) {
                                return_arr.push({
                                    'ques':ques.ques_id,
                                    'ques_type':ques.questions_type,
                                    'ans':options.option_id
                                })
                                // console.log(ques.question);
                                // console.log(options.name);
                                ans.push(ques.ques_id);
                            }

                        });

                    });
                    ans = [ ...new Set(ans) ]

                    if(this.questions.length==ans.length){

                        // console.log(JSON.stringify(return_arr));

                        let params=new FormData();
                        params.set('user_id',this.data_item.id);
                        params.set('answers',JSON.stringify(return_arr));
                        axios.post('/api/compatibility_answers' , params)
                            .then(response => {
                                this.question_filled++;
                                this.questions_div=false;
                                this.matches_div=true;
                                this.$emit('submit');


                            })


                    }
                    else{
                        alert('Please Select All Options');
                    }

                }
            },
            check_status(){
                // alert(this.question_filled);
                if(this.question_filled>0){
                    this.matches_div=true;
                    this.questions_div=false;
                }
                else{
                    alert('Please answer all Questions to see your Compatibility Matches');
                }
            },
            fetch_matches(){
                axios.post('/api/v1/license')
                    .then(response => {
                        // console.log(response.data.license);
                        if(JSON.parse(response.data.license).Compatibility || JSON.parse(response.data.license).Full){

                            let params=new FormData();
                            params.set('id',this.data_item.id);
                            axios.post('/api/compatibility_match',params)
                                .then(response => {

                                    console.log(response.data);
                                    this.matches=response.data;

                                })

                        }


                    })
            },
            viewprofile(id){
                this.$emit('viewprofile',id);
            },
        },
        props: ['data_item']
    }
</script>


<style scoped>
    @import "/adminlte/css/master.css";
    @import "/adminlte/css/media.css";
    @import "/adminlte/css/bootsrap.css";

    .heading {
        padding: 10px !important;
        border: 1px solid #999 !important;
        margin-bottom: 5px !important;
    }
    h3{ font-weight: 501 !important;}
    .heading{padding: 10px !important;  margin-bottom: 5px !important;}
    .rate{box-shadow: 0px 0px 3px #ca3335 !important; background-color:#ca333e !important; border-radius: 3px !important; padding:12px !important;
        height:180px !important;margin-right: 5px !important; width:100% !important; text-align: center !important;}
    .rate h4{text-align: center !important; color: #fff !important; font-size: 40px !important; margin-top: 40px !important; font-weight: 501 !important;}
    .rate h4 span{font-size: 15px !important; color: #fff !important; text-align: center !important;}
    .rate p{color: #fff !important; font-size: 18px !important; font-weight: 600 !important;}
    .text-para, .text-para1{padding: 10px !important; text-align: center !important;}
    .payment_icon img{width: 150px !important; padding: 10px 0px !important;}
    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-top-color: transparent;
        border-right-color: transparent;
        border-bottom-color: transparent;
        border-left-color: transparent;
        border-radius: 4px;
    }
</style>
<style scoped>
    :root {
        --blue: #5e72e4;
        --indigo: #5603ad;
        --purple: #8965e0;
        --pink: #f3a4b5;
        --red: #f5365c;
        --orange: #fb6340;
        --yellow: #ffd600;
        --green: #2dce89;
        --teal: #11cdef;
        --cyan: #2bffc6;
        --white: #fff;
        --gray: #8898aa;
        --gray-dark: #32325d;
        --light: #ced4da;
        --lighter: #e9ecef;
        --primary: #5e72e4;
        --secondary: #f7fafc;
        --success: #2dce89;
        --info: #11cdef;
        --warning: #fb6340;
        --danger: #f5365c;
        --light: #adb5bd;
        --dark: #212529;
        --default: #172b4d;
        --white: #fff;
        --neutral: #fff;
        --darker: black;
        --breakpoint-xs: 0;
        --breakpoint-sm: 576px;
        --breakpoint-md: 768px;
        --breakpoint-lg: 992px;
        --breakpoint-xl: 1200px;
        --font-family-sans-serif: Open Sans, sans-serif;
        --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    html {
        font-family: sans-serif;
        line-height: 1.15;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -ms-overflow-style: scrollbar;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    @-ms-viewport {
        width: device-width;
    }

    figcaption,
    footer,
    header,
    main,
    nav,
    section {
        display: block;
    }

    body {
        font-family: Open Sans, sans-serif;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        margin: 0;
        text-align: left;
        color: #525f7f;
        background-color: #f8f9fe;
    }

    [tabindex='-1']:focus {
        outline: 0 !important;
    }

    hr {
        overflow: visible;
        box-sizing: content-box;
        height: 0;
    }

    h1,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: .5rem;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    address {
        font-style: normal;
        line-height: inherit;
        margin-bottom: 1rem;
    }

    ul {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    ul ul {
        margin-bottom: 0;
    }

    dfn {
        font-style: italic;
    }

    strong {
        font-weight: bolder;
    }

    a {
        text-decoration: none;
        color: #5e72e4;
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    a:hover {
        text-decoration: none;
        color: #233dd2;
    }

    a:not([href]):not([tabindex]) {
        text-decoration: none;
        color: inherit;
    }

    a:not([href]):not([tabindex]):hover,
    a:not([href]):not([tabindex]):focus {
        text-decoration: none;
        color: inherit;
    }

    a:not([href]):not([tabindex]):focus {
        outline: 0;
    }

    code {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, 'Liberation Mono', 'Courier New', monospace;
        font-size: 1em;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    caption {
        padding-top: 1rem;
        padding-bottom: 1rem;
        caption-side: bottom;
        text-align: left;
        color: #8898aa;
    }

    label {
        display: inline-block;
        margin-bottom: .5rem;
    }

    button {
        border-radius: 0;
    }

    button:focus {
        outline: 1px dotted;
        outline: 5px auto -webkit-focus-ring-color;
    }

    input,
    button,
    textarea {
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
        margin: 0;
    }

    button,
    input {
        overflow: visible;
    }

    button {
        text-transform: none;
    }

    button,
    html [type='button'],
    [type='reset'],
    [type='submit'] {
        -webkit-appearance: button;
    }

    button::-moz-focus-inner,
    [type='button']::-moz-focus-inner,
    [type='reset']::-moz-focus-inner,
    [type='submit']::-moz-focus-inner {
        padding: 0;
        border-style: none;
    }

    input[type='radio'],
    input[type='checkbox'] {
        box-sizing: border-box;
        padding: 0;
    }

    input[type='date'],
    input[type='time'],
    input[type='datetime-local'],
    input[type='month'] {
        -webkit-appearance: listbox;
    }

    textarea {
        overflow: auto;
        resize: vertical;
    }

    legend {
        font-size: 1.5rem;
        line-height: inherit;
        display: block;
        width: 100%;
        max-width: 100%;
        margin-bottom: .5rem;
        padding: 0;
        white-space: normal;
        color: inherit;
    }

    progress {
        vertical-align: baseline;
    }

    [type='number']::-webkit-inner-spin-button,
    [type='number']::-webkit-outer-spin-button {
        height: auto;
    }

    [type='search'] {
        outline-offset: -2px;
        -webkit-appearance: none;
    }

    [type='search']::-webkit-search-cancel-button,
    [type='search']::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    ::-webkit-file-upload-button {
        font: inherit;
        -webkit-appearance: button;
    }

    [hidden] {
        display: none !important;
    }

    h1,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h3,
    .h4,
    .h5,
    .h6 {
        font-family: inherit;
        font-weight: 600;
        line-height: 1.5;
        margin-bottom: .5rem;
        color: #32325d;
    }

    /*h1,*/
    /*.h1 {*/
    /*    font-size: 1.625rem;*/
    /*}*/

    /*h3,*/
    /*.h3 {*/
    /*    font-size: 1.0625rem;*/
    /*}*/

    /*h4,*/
    /*.h4 {*/
    /*    font-size: .9375rem;*/
    /*}*/

    /*h5,*/
    /*.h5 {*/
    /*    font-size: .8125rem;*/
    /*}*/

    /*h6,*/
    /*.h6 {*/
    /*    font-size: .625rem;*/
    /*}*/

    .display-2 {
        font-size: 2.75rem;
        font-weight: 600;
        line-height: 1.5;
    }

    hr {
        margin-top: 2rem;
        margin-bottom: 2rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1);
    }

    code {
        font-size: 87.5%;
        word-break: break-word;
        color: #f3a4b5;
    }

    a>code {
        color: inherit;
    }

    .container {
        width: 100%;
        margin-right: auto;
        margin-left: auto;
        padding-right: 15px;
        padding-left: 15px;
    }

    @media (min-width: 576px) {
        .container {
            max-width: 540px;
        }
    }

    @media (min-width: 768px) {
        .container {
            max-width: 720px;
        }
    }

    @media (min-width: 992px) {
        .container {
            max-width: 960px;
        }
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1140px;
        }
    }

    .container-fluid {
        width: 100%;
        margin-right: auto;
        margin-left: auto;
        padding-right: 15px;
        padding-left: 15px;
    }

    .row {
        display: flex;
        margin-right: -15px;
        margin-left: -15px;
        flex-wrap: wrap;
    }

    .col-4,
    .col-8,
    .col,
    .col-md-10,
    .col-md-12,
    .col-lg-3,
    .col-lg-4,
    .col-lg-6,
    .col-lg-7,
    .col-xl-4,
    .col-xl-6,
    .col-xl-8 {
        position: relative;
        width: 100%;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col {
        max-width: 100%;
        flex-basis: 0;
        flex-grow: 1;
    }

    .col-4 {
        max-width: 33.33333%;
        flex: 0 0 33.33333%;
    }

    .col-8 {
        max-width: 66.66667%;
        flex: 0 0 66.66667%;
    }

    @media (min-width: 768px) {

        .col-md-10 {
            max-width: 83.33333%;
            flex: 0 0 83.33333%;
        }

        .col-md-12 {
            max-width: 100%;
            flex: 0 0 100%;
        }
    }

    @media (min-width: 992px) {

        .col-lg-3 {
            max-width: 25%;
            flex: 0 0 25%;
        }

        .col-lg-4 {
            max-width: 33.33333%;
            flex: 0 0 33.33333%;
        }

        .col-lg-6 {
            max-width: 50%;
            flex: 0 0 50%;
        }

        .col-lg-7 {
            max-width: 58.33333%;
            flex: 0 0 58.33333%;
        }

        .order-lg-2 {
            order: 2;
        }
    }

    @media (min-width: 1200px) {

        .col-xl-4 {
            max-width: 33.33333%;
            flex: 0 0 33.33333%;
        }

        .col-xl-6 {
            max-width: 50%;
            flex: 0 0 50%;
        }

        .col-xl-8 {
            max-width: 66.66667%;
            flex: 0 0 66.66667%;
        }

        .order-xl-1 {
            order: 1;
        }

        .order-xl-2 {
            order: 2;
        }
    }

    .form-control {
        font-size: 1.3rem;
        line-height: 1.5;
        display: block;
        width: 100%;
        height: calc(2.75rem + 2px);
        padding: .625rem .75rem;
        transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
        color: #8898aa;
        border: 1px solid #cad1d7;
        border-radius: .375rem;
        background-color: #fff;
        background-clip: padding-box;
        box-shadow: none;
    }

    @media screen and (prefers-reduced-motion: reduce) {
        .form-control {
            transition: none;
        }
    }

    .form-control::-ms-expand {
        border: 0;
        background-color: transparent;
    }

    .form-control:focus {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        outline: 0;
        background-color: #fff;
        box-shadow: none, none;
    }

    .form-control:-ms-input-placeholder {
        opacity: 1;
        color: #adb5bd;
    }

    .form-control::-ms-input-placeholder {
        opacity: 1;
        color: #adb5bd;
    }

    .form-control::placeholder {
        opacity: 1;
        color: #adb5bd;
    }

    .form-control:disabled,
    .form-control[readonly] {
        opacity: 1;
        background-color: #e9ecef;
    }

    textarea.form-control {
        height: auto;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: center;
    }

    @media (min-width: 576px) {
        .form-inline label {
            display: flex;
            margin-bottom: 0;
            align-items: center;
            justify-content: center;
        }

        .form-inline .form-group {
            display: flex;
            margin-bottom: 0;
            flex: 0 0 auto;
            flex-flow: row wrap;
            align-items: center;
        }

        .form-inline .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
        }

        .form-inline .input-group {
            width: auto;
        }
    }

    .btn {
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5;
        display: inline-block;
        padding: .625rem 1.25rem;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        text-align: center;
        vertical-align: middle;
        white-space: nowrap;
        border: 1px solid transparent;
        border-radius: .375rem;
    }

    @media screen and (prefers-reduced-motion: reduce) {
        .btn {
            transition: none;
        }
    }

    .btn:hover,
    .btn:focus {
        text-decoration: none;
    }

    .btn:focus {
        outline: 0;
        box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
    }

    .btn:disabled {
        opacity: .65;
        box-shadow: none;
    }

    .btn:not(:disabled):not(.disabled) {
        cursor: pointer;
    }

    .btn:not(:disabled):not(.disabled):active {
        box-shadow: none;
    }

    .btn:not(:disabled):not(.disabled):active:focus {
        box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08), none;
    }

    .btn-primary {
        color: #fff;
        border-color: #5e72e4;
        background-color: #5e72e4;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .btn-primary:hover {
        color: #fff;
        border-color: #5e72e4;
        background-color: #5e72e4;
    }

    .btn-primary:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(94, 114, 228, .5);
    }

    .btn-primary:disabled {
        color: #fff;
        border-color: #5e72e4;
        background-color: #5e72e4;
    }

    .btn-primary:not(:disabled):not(.disabled):active {
        color: #fff;
        border-color: #5e72e4;
        background-color: #324cdd;
    }

    .btn-primary:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    .btn-info {
        color: #fff;
        border-color: #11cdef;
        background-color: #11cdef;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .btn-info:hover {
        color: #fff;
        border-color: #11cdef;
        background-color: #11cdef;
    }

    .btn-info:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(17, 205, 239, .5);
    }

    .btn-info:disabled {
        color: #fff;
        border-color: #11cdef;
        background-color: #11cdef;
    }

    .btn-info:not(:disabled):not(.disabled):active {
        color: #fff;
        border-color: #11cdef;
        background-color: #0da5c0;
    }

    .btn-info:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    .btn-default {
        color: #fff;
        border-color: #172b4d;
        background-color: #172b4d;
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .btn-default:hover {
        color: #fff;
        border-color: #172b4d;
        background-color: #172b4d;
    }

    .btn-default:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08), 0 0 0 0 rgba(23, 43, 77, .5);
    }

    .btn-default:disabled {
        color: #fff;
        border-color: #172b4d;
        background-color: #172b4d;
    }

    .btn-default:not(:disabled):not(.disabled):active {
        color: #fff;
        border-color: #172b4d;
        background-color: #0b1526;
    }

    .btn-default:not(:disabled):not(.disabled):active:focus {
        box-shadow: none;
    }

    .btn-sm {
        font-size: 1.875rem !important;
        line-height: 1.5 !important;
        padding: .25rem .5rem !important;
        border-radius: .375rem !important;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        font-size: 1rem;
        position: absolute;
        z-index: 1000;
        top: 100%;
        left: 0;
        display: none;
        float: left;
        min-width: 10rem;
        margin: .125rem 0 0;
        padding: .5rem 0;
        list-style: none;
        text-align: left;
        color: #525f7f;
        border: 0 solid rgba(0, 0, 0, .15);
        border-radius: .4375rem;
        background-color: #fff;
        background-clip: padding-box;
        box-shadow: 0 50px 100px rgba(50, 50, 93, .1), 0 15px 35px rgba(50, 50, 93, .15), 0 5px 15px rgba(0, 0, 0, .1);
    }

    .dropdown-menu.show {
        display: block;
        opacity: 1;
    }

    .dropdown-menu-right {
        right: 0;
        left: auto;
    }

    .dropdown-menu[x-placement^='top'],
    .dropdown-menu[x-placement^='right'],
    .dropdown-menu[x-placement^='bottom'],
    .dropdown-menu[x-placement^='left'] {
        right: auto;
        bottom: auto;
    }

    .dropdown-divider {
        overflow: hidden;
        height: 0;
        margin: .5rem 0;
        border-top: 1px solid #e9ecef;
    }

    .dropdown-item {
        font-weight: 400;
        display: block;
        clear: both;
        width: 100%;
        padding: .25rem 1.5rem;
        text-align: inherit;
        white-space: nowrap;
        color: #212529;
        border: 0;
        background-color: transparent;
    }

    .dropdown-item:hover,
    .dropdown-item:focus {
        text-decoration: none;
        color: #16181b;
        background-color: #f6f9fc;
    }

    .dropdown-item:active {
        text-decoration: none;
        color: #fff;
        background-color: #5e72e4;
    }

    .dropdown-item:disabled {
        color: #8898aa;
        background-color: transparent;
    }

    .dropdown-header {
        font-size: .875rem;
        display: block;
        margin-bottom: 0;
        padding: .5rem 1.5rem;
        white-space: nowrap;
        color: #8898aa;
    }

    .input-group {
        position: relative;
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        align-items: stretch;
    }

    .input-group>.form-control {
        position: relative;
        width: 1%;
        margin-bottom: 0;
        flex: 1 1 auto;
    }

    .input-group>.form-control+.form-control {
        margin-left: -1px;
    }

    .input-group>.form-control:focus {
        z-index: 3;
    }

    .input-group>.form-control:not(:last-child) {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group>.form-control:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .input-group-prepend {
        display: flex;
    }

    .input-group-prepend .btn {
        position: relative;
        z-index: 2;
    }

    .input-group-prepend .btn+.btn,
    .input-group-prepend .btn+.input-group-text,
    .input-group-prepend .input-group-text+.input-group-text,
    .input-group-prepend .input-group-text+.btn {
        margin-left: -1px;
    }

    .input-group-prepend {
        margin-right: -1px;
    }

    .input-group-text {
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        display: flex;
        margin-bottom: 0;
        padding: .625rem .75rem;
        text-align: center;
        white-space: nowrap;
        color: #adb5bd;
        border: 1px solid #cad1d7;
        border-radius: .375rem;
        background-color: #fff;
        align-items: center;
    }

    .input-group-text input[type='radio'],
    .input-group-text input[type='checkbox'] {
        margin-top: 0;
    }

    .input-group>.input-group-prepend>.btn,
    .input-group>.input-group-prepend>.input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .input-group>.input-group-prepend:not(:first-child)>.btn,
    .input-group>.input-group-prepend:not(:first-child)>.input-group-text,
    .input-group>.input-group-prepend:first-child>.btn:not(:first-child),
    .input-group>.input-group-prepend:first-child>.input-group-text:not(:first-child) {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .nav {
        display: flex;
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;
        flex-wrap: wrap;
    }

    .nav-link {
        display: block;
        padding: .25rem .75rem;
    }

    .nav-link:hover,
    .nav-link:focus {
        text-decoration: none;
    }

    .navbar {
        position: relative;
        display: flex;
        padding: 1rem 1rem;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .navbar>.container,
    .navbar>.container-fluid {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
    }

    .navbar-nav {
        display: flex;
        flex-direction: column;
        margin-bottom: 0;
        padding-left: 0;
        list-style: none;
    }

    .navbar-nav .nav-link {
        padding-right: 0;
        padding-left: 0;
    }

    .navbar-nav .dropdown-menu {
        position: static;
        float: none;
    }

    @media (max-width: 767.98px) {

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
            padding-right: 0;
            padding-left: 0;
        }
    }

    @media (min-width: 768px) {
        .navbar-expand-md {
            flex-flow: row nowrap;
            justify-content: flex-start;
        }

        .navbar-expand-md .navbar-nav {
            flex-direction: row;
        }

        .navbar-expand-md .navbar-nav .dropdown-menu {
            position: absolute;
        }

        .navbar-expand-md .navbar-nav .nav-link {
            padding-right: 1rem;
            padding-left: 1rem;
        }

        .navbar-expand-md>.container,
        .navbar-expand-md>.container-fluid {
            flex-wrap: nowrap;
        }
    }

    .navbar-dark .navbar-nav .nav-link {
        color: rgba(255, 255, 255, .95);
    }

    .navbar-dark .navbar-nav .nav-link:hover,
    .navbar-dark .navbar-nav .nav-link:focus {
        color: rgba(255, 255, 255, .65);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        border: 1px solid rgba(0, 0, 0, .05);
        border-radius: .375rem;
        background-color: #fff;
        background-clip: border-box;
    }

    .card>hr {
        margin-right: 0;
        margin-left: 0;
    }

    .card-body {
        padding: 1.5rem;
        flex: 1 1 auto;
    }

    .card-header {
        margin-bottom: 0;
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, .05);
        background-color: #fff;
    }

    .card-header:first-child {
        border-radius: calc(.375rem - 1px) calc(.375rem - 1px) 0 0;
    }

    @keyframes progress-bar-stripes {
        from {
            background-position: 1rem 0;
        }

        to {
            background-position: 0 0;
        }
    }

    .progress {
        font-size: .75rem;
        display: flex;
        overflow: hidden;
        height: 1rem;
        border-radius: .375rem;
        background-color: #e9ecef;
        box-shadow: inset 0 .1rem .1rem rgba(0, 0, 0, .1);
    }

    .media {
        display: flex;
        align-items: flex-start;
    }

    .media-body {
        flex: 1 1;
    }

    .bg-secondary {
        background-color: #f7fafc !important;
    }

    a.bg-secondary:hover,
    a.bg-secondary:focus,
    button.bg-secondary:hover,
    button.bg-secondary:focus {
        background-color: #d2e3ee !important;
    }

    .bg-default {
        background-color: #172b4d !important;
    }

    a.bg-default:hover,
    a.bg-default:focus,
    button.bg-default:hover,
    button.bg-default:focus {
        background-color: #0b1526 !important;
    }

    .bg-white {
        background-color: #fff !important;
    }

    a.bg-white:hover,
    a.bg-white:focus,
    button.bg-white:hover,
    button.bg-white:focus {
        background-color: #e6e6e6 !important;
    }

    .bg-white {
        background-color: #fff !important;
    }

    .border-0 {
        border: 0 !important;
    }

    .rounded-circle {
        border-radius: 50% !important;
    }

    .d-none {
        display: none !important;
    }

    .d-flex {
        display: flex !important;
    }

    @media (min-width: 768px) {

        .d-md-flex {
            display: flex !important;
        }
    }

    @media (min-width: 992px) {

        .d-lg-inline-block {
            display: inline-block !important;
        }

        .d-lg-block {
            display: block !important;
        }
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .justify-content-between {
        justify-content: space-between !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    @media (min-width: 1200px) {

        .justify-content-xl-between {
            justify-content: space-between !important;
        }
    }

    .float-right {
        float: right !important;
    }

    .shadow,
    .card-profile-image img {
        box-shadow: 0 0 2rem 0 rgba(136, 152, 170, .15) !important;
    }

    .m-0 {
        margin: 0 !important;
    }

    .mt-0 {
        margin-top: 0 !important;
    }

    .mb-0 {
        margin-bottom: 0 !important;
    }

    .mr-2 {
        margin-right: .5rem !important;
    }

    .ml-2 {
        margin-left: .5rem !important;
    }

    .mr-3 {
        margin-right: 1rem !important;
    }

    .mt-4,
    .my-4 {
        margin-top: 1.5rem !important;
    }

    .mr-4 {
        margin-right: 1.5rem !important;
    }

    .mb-4,
    .my-4 {
        margin-bottom: 1.5rem !important;
    }

    .mb-5 {
        margin-bottom: 3rem !important;
    }

    .mt--7 {
        margin-top: -6rem !important;
    }

    .pt-0 {
        padding-top: 0 !important;
    }

    .pr-0 {
        padding-right: 0 !important;
    }

    .pb-0 {
        padding-bottom: 0 !important;
    }

    .pt-5 {
        padding-top: 3rem !important;
    }

    .pt-8 {
        padding-top: 8rem !important;
    }

    .pb-8 {
        padding-bottom: 8rem !important;
    }

    .m-auto {
        margin: auto !important;
    }

    @media (min-width: 768px) {

        .mt-md-5 {
            margin-top: 3rem !important;
        }

        .pt-md-4 {
            padding-top: 1.5rem !important;
        }

        .pb-md-4 {
            padding-bottom: 1.5rem !important;
        }
    }

    @media (min-width: 992px) {

        .pl-lg-4 {
            padding-left: 1.5rem !important;
        }

        .pt-lg-8 {
            padding-top: 8rem !important;
        }

        .ml-lg-auto {
            margin-left: auto !important;
        }
    }

    @media (min-width: 1200px) {

        .mb-xl-0 {
            margin-bottom: 0 !important;
        }
    }

    .text-right {
        text-align: right !important;
    }

    .text-center {
        text-align: center !important;
    }

    .text-uppercase {
        text-transform: uppercase !important;
    }

    .font-weight-light {
        font-weight: 300 !important;
    }

    .font-weight-bold {
        font-weight: 600 !important;
    }

    .text-white {
        color: #fff !important;
    }

    .text-white {
        color: #fff !important;
    }

    a.text-white:hover,
    a.text-white:focus {
        color: #e6e6e6 !important;
    }

    .text-muted {
        color: #8898aa !important;
    }

    @media print {

        *,
        *::before,
        *::after {
            box-shadow: none !important;
            text-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }

        img {
            page-break-inside: avoid;
        }

        p,
        h3 {
            orphans: 3;
            widows: 3;
        }

        h3 {
            page-break-after: avoid;
        }

        @page {
            size: a3;
        }

        body {
            min-width: 992px !important;
        }

        .container {
            min-width: 992px !important;
        }

        .navbar {
            display: none;
        }
    }

    figcaption,
    main {
        display: block;
    }

    main {
        overflow: hidden;
    }

    .bg-white {
        background-color: #fff !important;
    }

    a.bg-white:hover,
    a.bg-white:focus,
    button.bg-white:hover,
    button.bg-white:focus {
        background-color: #e6e6e6 !important;
    }


    .bg-gradient-default {
        background: linear-gradient(87deg, #e96443 0, #904e95 100%) !important;
    }

    @keyframes floating-lg {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(15px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes floating {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(10px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    @keyframes floating-sm {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(5px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .opacity-8 {
        opacity: .8 !important;
    }

    .opacity-8 {
        opacity: .9 !important;
    }

    .center {
        left: 50%;
        transform: translateX(-50%);
    }

    [class*='shadow'] {
        transition: all .15s ease;
    }

    .font-weight-300 {
        font-weight: 300 !important;
    }


    .text-white {
        color: #fff !important;
    }

    a.text-white:hover,
    a.text-white:focus {
        color: #e6e6e6 !important;
    }

    .avatar {
        font-size: 1rem;
        display: inline-flex;
        width: 48px;
        height: 48px;
        color: #fff;
        border-radius: 50%;
        background-color: #adb5bd;
        align-items: center;
        justify-content: center;
    }

    .avatar img {
        width: 100%;
        border-radius: 50%;
    }

    .avatar-sm {
        font-size: .875rem;
        width: 36px;
        height: 36px;
    }

    .btn {
        font-size: .875rem;
        position: relative;
        transition: all .15s ease;
        letter-spacing: .025em;
        text-transform: none;
        will-change: transform;
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 14px rgba(50, 50, 93, .1), 0 3px 6px rgba(0, 0, 0, .08);
    }

    .btn:not(:last-child) {
        margin-right: .5rem;
    }

    .btn i:not(:first-child) {
        margin-left: .5rem;
    }

    .btn i:not(:last-child) {
        margin-right: .5rem;
    }

    .input-group .btn {
        margin-right: 0;
        transform: translateY(0);
    }

    .btn-sm {
        font-size: .75rem;
    }

    [class*='btn-outline-'] {
        border-width: 1px;
    }

    .card-profile-image {
        position: relative;
    }

    .card-profile-image img {
        position: absolute;
        left: 50%;
        max-width: 180px;
        transition: all .15s ease;
        transform: translate(-50%, -30%);
        border-radius: .375rem;
    }

    .card-profile-image img:hover {
        transform: translate(-50%, -33%);
    }

    .card-profile-stats {
        padding: 1rem 0;
    }

    .card-profile-stats>div {
        margin-right: 1rem;
        padding: .875rem;
        text-align: center;
    }

    .card-profile-stats>div:last-child {
        margin-right: 0;
    }

    .card-profile-stats>div .heading {
        font-size: 2.1rem;
        font-weight: bold;
        display: block;
    }

    .card-profile-stats>div .description {
        font-size: 1.875rem;
        color: #adb5bd;
    }

    .main-content {
        position: relative;
    }

    .main-content .navbar-top {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        width: 100%;
        padding-right: 0 !important;
        padding-left: 0 !important;
        background-color: transparent;
    }

    @media (min-width: 768px) {
        .main-content .container-fluid {
            padding-right: 39px !important;
            padding-left: 39px !important;
        }
    }

    .dropdown {
        display: inline-block;
    }

    .dropdown-menu {
        min-width: 12rem;
    }

    .dropdown-menu .dropdown-item {
        font-size: .875rem;
        padding: .5rem 1rem;
    }

    .dropdown-menu .dropdown-item>i {
        font-size: 1rem;
        margin-right: 1rem;
        vertical-align: -17%;
    }

    .dropdown-header {
        font-size: .625rem;
        font-weight: 700;
        padding-right: 1rem;
        padding-left: 1rem;
        text-transform: uppercase;
        color: #f6f9fc;
    }

    .dropdown-menu a.media>div:first-child {
        line-height: 1;
    }

    .dropdown-menu a.media p {
        color: #8898aa;
    }

    .dropdown-menu a.media:hover .heading,
    .dropdown-menu a.media:hover p {
        color: #172b4d !important;
    }

    .footer {
        padding: 2.5rem 0;
        background: #f7fafc;
    }

    .footer .nav .nav-item .nav-link {
        color: #8898aa !important;
    }

    .footer .nav .nav-item .nav-link:hover {
        color: #525f7f !important;
    }

    .footer .copyright {
        font-size: .875rem;
    }

    .form-control-label {
        font-size: 1.4rem;
        font-weight: 600;
        color: #525f7f;
    }

    .form-control {
        font-size: 1.2rem !important;
    }

    .form-control:focus:-ms-input-placeholder {
        color: #adb5bd;
    }

    .form-control:focus::-ms-input-placeholder {
        color: #adb5bd;
    }

    .form-control:focus::placeholder {
        color: #adb5bd;
    }

    textarea[resize='none'] {
        resize: none !important;
    }

    textarea[resize='both'] {
        resize: both !important;
    }

    textarea[resize='vertical'] {
        resize: vertical !important;
    }

    textarea[resize='horizontal'] {
        resize: horizontal !important;
    }

    .form-control-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .form-control-alternative:focus {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
    }

    .input-group {
        transition: all .15s ease;
        border-radius: .375rem;
        box-shadow: none;
    }

    .input-group .form-control {
        box-shadow: none;
    }

    .input-group .form-control:not(:first-child) {
        padding-left: 0;
        border-left: 0;
    }

    .input-group .form-control:not(:last-child) {
        padding-right: 0;
        border-right: 0;
    }

    .input-group .form-control:focus {
        box-shadow: none;
    }

    .input-group-text {
        transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
    }

    .input-group-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .input-group-alternative .form-control,
    .input-group-alternative .input-group-text {
        border: 0;
        box-shadow: none;
    }

    .focused .input-group-alternative {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
    }

    .focused .input-group {
        box-shadow: none;
    }

    .focused .input-group-text {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        background-color: #fff;
    }

    .focused .form-control {
        border-color: rgba(50, 151, 211, .25);
    }

    .header {
        position: relative;
    }

    .input-group {
        transition: all .15s ease;
        border-radius: .375rem;
        box-shadow: none;
    }

    .input-group .form-control {
        box-shadow: none;
    }

    .input-group .form-control:not(:first-child) {
        padding-left: 0;
        border-left: 0;
    }

    .input-group .form-control:not(:last-child) {
        padding-right: 0;
        border-right: 0;
    }

    .input-group .form-control:focus {
        box-shadow: none;
    }

    .input-group-text {
        transition: all .2s cubic-bezier(.68, -.55, .265, 1.55);
    }

    .input-group-alternative {
        transition: box-shadow .15s ease;
        border: 0;
        box-shadow: 0 1px 3px rgba(50, 50, 93, .15), 0 1px 0 rgba(0, 0, 0, .02);
    }

    .input-group-alternative .form-control,
    .input-group-alternative .input-group-text {
        border: 0;
        box-shadow: none;
    }

    .focused .input-group-alternative {
        box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08) !important;
    }

    .focused .input-group {
        box-shadow: none;
    }

    .focused .input-group-text {
        color: #8898aa;
        border-color: rgba(50, 151, 211, .25);
        background-color: #fff;
    }

    .focused .form-control {
        border-color: rgba(50, 151, 211, .25);
    }

    .mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: all .15s ease;
    }

    @media screen and (prefers-reduced-motion: reduce) {
        .mask {
            transition: none;
        }
    }

    .nav-link {
        color: #525f7f;
    }

    .nav-link:hover {
        color: #5e72e4;
    }

    .nav-link i.ni {
        position: relative;
        top: 2px;
    }

    .navbar-search .input-group {
        border: 2px solid;
        border-radius: 2rem;
        background-color: transparent;
    }

    .navbar-search .input-group .input-group-text {
        padding-left: 1rem;
        background-color: transparent;
    }

    .navbar-search .form-control {
        width: 270px;
        background-color: transparent;
    }

    .navbar-search-dark .input-group {
        border-color: rgba(255, 255, 255, .6);
    }

    .navbar-search-dark .input-group-text {
        color: rgba(255, 255, 255, .6);
    }

    .navbar-search-dark .form-control {
        color: rgba(255, 255, 255, .9);
    }

    .navbar-search-dark .form-control:-ms-input-placeholder {
        color: rgba(255, 255, 255, .6);
    }

    .navbar-search-dark .form-control::-ms-input-placeholder {
        color: rgba(255, 255, 255, .6);
    }

    .navbar-search-dark .form-control::placeholder {
        color: rgba(255, 255, 255, .6);
    }

    .navbar-search-dark .focused .input-group {
        border-color: rgba(255, 255, 255, .9);
    }

    @media (min-width: 768px) {
        .navbar .dropdown-menu {
            margin: 0;
            pointer-events: none;
            opacity: 0;
        }

        .navbar .dropdown-menu-arrow:before {
            position: absolute;
            z-index: -5;
            bottom: 100%;
            left: 20px;
            display: block;
            width: 12px;
            height: 12px;
            content: '';
            transform: rotate(-45deg) translateY(12px);
            border-radius: 2px;
            background: #fff;
            box-shadow: none;
        }

        .navbar .dropdown-menu-right:before {
            right: 20px;
            left: auto;
        }

        @keyframes show-navbar-dropdown {
            0% {
                transition: visibility .25s, opacity .25s, transform .25s;
                transform: translate(0, 10px) perspective(200px) rotateX(-2deg);
                opacity: 0;
            }

            100% {
                transform: translate(0, 0);
                opacity: 1;
            }
        }

        @keyframes hide-navbar-dropdown {
            from {
                opacity: 1;
            }

            to {
                transform: translate(0, 10px);
                opacity: 0;
            }
        }
    }

    @media (max-width: 767.98px) {
        .navbar-nav .nav-link {
            padding: .625rem 0;
            color: #172b4d !important;
        }

        .navbar-nav .dropdown-menu {
            min-width: auto;
            box-shadow: none;
        }
    }

    @keyframes show-navbar-collapse {
        0% {
            transform: scale(.95);
            transform-origin: 100% 0;
            opacity: 0;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    @keyframes hide-navbar-collapse {
        from {
            transform: scale(1);
            transform-origin: 100% 0;
            opacity: 1;
        }

        to {
            transform: scale(.95);
            opacity: 0;
        }
    }

    .progress {
        overflow: hidden;
        height: 8px;
        margin-bottom: 1rem;
        border-radius: .25rem;
        background-color: #e9ecef;
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
    }


    .description {
        font-size: .875rem;
    }



    .heading-small {
        font-size: 1.75rem !important;
        padding-top: .25rem;
        padding-bottom: .25rem;
        letter-spacing: .04em;
        text-transform: uppercase;
    }

    .display-2 span {
        font-weight: 300;
        display: block;
    }

    @media (max-width: 768px) {
        .btn {
            margin-bottom: 10px;
        }
    }

    #navbar .navbar {
        margin-bottom: 20px;
    }
    .modal-open {
        overflow: hidden; }
    .modal-open .modal {
        overflow-x: hidden;
        overflow-y: auto; }

    .modal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        display: none;
        width: 100%;
        height: 100%;
        overflow: hidden;
        outline: 0; }

    .modal-dialog {
        position: relative;
        width: auto;
        margin: 0.5rem;
        pointer-events: none; }
    .modal.fade .modal-dialog {
        -webkit-transition: -webkit-transform 0.3s ease-out;
        transition: -webkit-transform 0.3s ease-out;
        -o-transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
        -webkit-transform: translate(0, -50px);
        -ms-transform: translate(0, -50px);
        transform: translate(0, -50px); }
    @media screen and (prefers-reduced-motion: reduce) {
        .modal.fade .modal-dialog {
            -webkit-transition: none;
            -o-transition: none;
            transition: none; } }
    .modal.show .modal-dialog {
        -webkit-transform: none;
        -ms-transform: none;
        transform: none; }

    .modal-dialog-centered {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        min-height: calc(100% - (0.5rem * 2)); }
    .modal-dialog-centered::before {
        display: block;
        height: calc(100vh - (0.5rem * 2));
        content: ""; }

    .modal-content {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 0.3rem;
        outline: 0; }

    .modal-backdrop {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1040;
        width: 100vw;
        height: 100vh;
        background-color: #000; }
    .modal-backdrop.fade {
        opacity: 0; }
    .modal-backdrop.show {
        opacity: 0.5; }

    .modal-header {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: start;
        -ms-flex-align: start;
        align-items: flex-start;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 1rem 1rem;
        border-bottom: 1px solid #e9ecef;
        border-top-left-radius: 0.3rem;
        border-top-right-radius: 0.3rem; }
    .modal-header .close {
        padding: 1rem 1rem;
        margin: -1rem -1rem -1rem auto; }

    .modal-title {
        margin-bottom: 0;
        line-height: 1.5; }

    .modal-body {
        position: relative;
        -webkit-box-flex: 1;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1rem;
        font-size: 15px;
    }

    .modal-footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: end;
        -ms-flex-pack: end;
        justify-content: flex-end;
        padding: 1rem;
        border-top: 1px solid #e9ecef;
        border-bottom-right-radius: 0.3rem;
        border-bottom-left-radius: 0.3rem; }
    .modal-footer > :not(:first-child) {
        margin-left: .25rem; }
    .modal-footer > :not(:last-child) {
        margin-right: .25rem; }

    .modal-scrollbar-measure {
        position: absolute;
        top: -9999px;
        width: 50px;
        height: 50px;
        overflow: scroll; }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 500px;
            margin: 1.75rem auto; }
        .modal-dialog-centered {
            min-height: calc(100% - (1.75rem * 2)); }
        .modal-dialog-centered::before {
            height: calc(100vh - (1.75rem * 2)); }
        .modal-sm {
            max-width: 300px; } }
    @media (max-width: 992px) {  .col-sm-9{width: 100%}}
    @media (min-width: 992px) {

        .modal-lg,
        .modal-xl {
            max-width: 800px; } }

    @media (min-width: 1200px) {
        .modal-xl {
            max-width: 1140px; } }

</style>
