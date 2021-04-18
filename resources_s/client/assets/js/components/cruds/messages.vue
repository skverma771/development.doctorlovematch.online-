<template>
    <div class="container main">
        <div class="membars clearfix seekingMembars ">

            <div class=" col-md-12 padding0">
                <div class="membarhead clearfix">

                    <ol class="breadcrumb pull-left">
                        <li><a style="cursor: pointer;"  :class="{ 'active': inbox }" @click="inbox=true,block=false" id="inbox">Inbox</a></li>
                        <li><a style="cursor: pointer;" :class="{ 'active': block }" @click="inbox=false,block=true" id="block">Block</a></li>
                    </ol>
                </div>
            </div>
            <div class="message" v-if="inbox" id="colinbox">

                <div class="col-md-4 col-sm-4 col-xs-3 padding0">
                    <div class="msgLT padding0">
                        <ul>

                            <li class="usermessDiv color" v-for="(post,index) in user_u" :key="post.id"  @click="getchat(post.id,index)">
                                <div class="clearfix">
                                    <img v-if="JSON.parse(post.pictures).profile" :src="JSON.parse(post.pictures).profile" alt="doctor lovematch">

                                    <img v-else src="https://doctorlovematch.com/templates/lovematch/profile/thumbImage1/maleResize.png" alt="doctor lovematch">

                                    <div class="msgDetail msgDetail1 mes_count mes_width">

                                        <h3>
                                            {{post.name}}

                                            <div class="pull-right"></div>

                                        </h3>
                                        <!-- <p>Message goes here</p> -->
                                        <!-- <span class="time">Wed</span> -->
                                        <p> {{post.ntcount}}</p>
                                    </div>
                                </div>
                            </li>


                        </ul>
                    </div><!-- msgLT -->
                </div><!-- padding0 -->

                <!-- block user listing -->


                <div class="col-md-8 col-sm-8 col-xs-9">
                    <div class="signleUserMsg" v-if="members.length>0">
                        <div class="clearfix msgHead">
                            <h5 class="pull-left"><span id="uname">
                                 {{user_u[chat_id].name}}</span></h5>

                            <div class="pull-right" role="presentation">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></a>

                                <ul class="dropdown-menu">

                                    <li><a data-target="#deleteChat" @click="delete_chat(user_u[chat_id].id)" data-toggle="modal" href="#">Delete Conversation</a></li>
                                    <!--  <li><a data-target="#report" data-toggle="modal" href="#report">Recover Conversation</a></li> -->
                                    <li><a data-target="#blockUser" @click="show_block_modal=true" data-toggle="modal" href="#">Block User</a></li>


                                </ul>
                            </div>
                        </div>

                        <div class="container"  v-if="show_block_modal">
                            <div class="modal show in" id="" style="display: block;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h4 class="">Block User</h4>
                                        </div>
                                        <div class="modal-body text-center">
                                            Are you sure want to block <span id="blockuservlaue"> {{user_u[chat_id].name}}</span><br>


                                                    <label>
                                                        <input type="radio" name="optradio" class="radiochek" value="reportAbuse">
                                                        Report Abuse
                                                    </label>

                                                    <label>
                                                        <input type="radio" name="optradio" class="radiochek" value="spam">
                                                        Spam
                                                    </label>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="bluebtn" style="width: 100% !important;"  @click="block_user(user_u[chat_id].id)" id="">Yes</button>
                                            <button style="width: 100% !important;"  @click="show_block_modal=false" class="bluebtn" type="button">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="msgType clearfix ">
                            <input id="hid_member" type="hidden" name="" value="10018">
                            <textarea name="mesgtext" rows="3" v-model="new_msg" id="mesgtextid"></textarea>
                            <input type="button" value="Reply" @click="sendmsg(user_u[chat_id].id)" class="redBtn pull-right" id="reply2">
                        </div>
                        <div class="cmembership msgType clearfix" v-if="!license">
                            <p>To have access to see your Messages please Upgrade now!</p>
                            <a href="#" @click="showpayment"><button @click="showpayment" type="button" class="btn-danger Upgrade">UPGRADE</button></a>
                        </div>

                        <ul style="height:63px;" class="message_list" v-for="mem in members">

                            <li>

                                <div class="clearfix">
                                    <img v-if="JSON.parse(mem.user.pictures).profile" :src="JSON.parse(mem.user.pictures).profile" alt="doctor lovematch">

                                    <img v-else src="https://doctorlovematch.com//templates/lovematch/profile/thumbImage1/1601915417.png" alt="doctor lovematch">
                            <div class="msgDetail">

                                <h3>{{mem.user.name}}<span class="time">{{mem.created_at}}</span>
                                </h3>

                                <p v-if="(license || mem.user.id== user_now)">{{mem.message.message}}</p>

                                <p v-else>Become a full paid member to see the messages</p>
                            </div>
                                </div>

                            </li>
                        </ul>

                    </div>

                </div><!-- signleUserMsg -->
            </div>


       <!-- message -->
        <!-- block user listing -->
        <div class="message " v-if="block" id="colblock">
<div v-if="blocked.length>0" >
    <div class="unblockclass" v-for="profile in blocked">
        <img :src="profile.pictures" alt="doctor lovematch">
        <h4>
            {{profile.name}}

        </h4>
        <br>

        <button class="redBtn" type="button" @click="unBlock( profile.id )" >UnblockUser</button>
    </div>
</div>
            <div v-else>
            <div class="blockerror">
                There are no block users yet.
            </div>
        </div>


    </div>
        </div>
    </div>
</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'

    export default {
        data() {
            return {
                members:[],
                user_u:[],
                chat_id:'',
                new_msg:'',
                license:false,
                user_now:'',
                other_id:'',
                show_block_modal:false,
                blocked:[],
                inbox:true,
                block:false,



            }
        },


        created() {
            this.fetchalldata();
       setInterval(this.fetchalldata,30000)

            axios.post('/api/v1/license')
                .then(response => {
                    if(JSON.parse(response.data.license).Full){
                        this.license=true;
                    }




                })
        },
        methods:{
            delete_chat(id){
                let form = new FormData();
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('other_id', id);
                axios.post('/api/delete_chat', form)
                    .then(response => {

                        this.fetchalldata();

                    });


            },

            unBlock(id){

                let form = new FormData();
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('unblock_id', id);
                axios.post('/api/unblockuser', form)
                    .then(response => {

                        this.fetchalldata();
                        //  this.members=response.data.data;
                        //   this.user_u=response.data.user;
                    });
            },

            block_user(id){
                let form = new FormData();
                form.set('block_id', id);
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                axios.post('/api/blockuser', form)
                    .then(response => {
                        this.show_block_modal=false;
                        this.fetchalldata();
                        //  this.members=response.data.data;
                     //   this.user_u=response.data.user;
                    });


            },

            fetchalldata(){
            this.user_now=document.querySelector("meta[name='user-id']").getAttribute('content');

            let form = new FormData();
            form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));

            axios.post('/api/messageconections', form)
                .then(response => {
                  //  this.members=response.data.data;
                    this.user_u=response.data.user;
                });


                let form1 = new FormData();
                form1.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form1.set('status', '1');
                axios.post('/api/fetch_msg', form1)
                    .then(res => {


                    });

                let form2 = new FormData();
                form2.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));

                axios.post('/api/blockuserlist', form2)
                    .then(res => {

                        this.blocked=_.cloneDeep([]);

                        res.data.forEach((rand)=>{
                            rand.pictures=JSON.parse(rand.pictures).profile;
                            // console.log(rand.pictures);

                            this.blocked.push(rand);

                        })

                    });



                this.getchat(this.other_id, this.chat_id)
        },
            sendmsg(id){
                let params = new FormData();
                params.set('message', this.new_msg);
                params.set('datetime', Date.now());
                params.set('sender', document.querySelector("meta[name='user-id']").getAttribute('content'));
                params.set('receiver', id);


                axios.post('/api/v1/messages', params)
                    .then(response => {

                        this.new_msg='';
this.getchat(id, this.chat_id)
                    })
            },
            getchat(id,index){
                this.other_id=id;
                this.chat_id=index;
                let form = new FormData();
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('other_id',id);

                axios.post('/api/messagechat', form)
                    .then(response => {
                        this.members=response.data;

                    });
            },
            showpayment(){
                this.$emit('payment');
            },
            showchat(id){

            },
            viewprofile(id){
                this.$emit('viewprofile',id);
            },
            zodiac1(e) {
                if(e!=null){
                    var return_arr = [];
                    return_arr.push(e);
                    this.zodiac_1 = return_arr;
                }
            },
            zodiac2(e){
                if(e!=null){
                    var return_arr=[];
                    return_arr.push(e);
                    this.zodiac_2=return_arr;
                }

            },
            fetch_result(){
                if(this.zodiac_1!==null && this.zodiac_2!==null){
                    console.log(this.zodiac_1[0].id);
                    console.log(this.zodiac_2[0].id);


                    let form = new FormData();
                    form.set('signfrom',this.zodiac_1[0].id);
                    form.set('signto', this.zodiac_2[0].id);

                    axios.post('/api/fetch_zodiac', form)
                        .then(res => {
                            console.log(res.data.description);
                            this.result=res.data.description;
                        });
                }
                else{
                    this.result='Please Select Both Zodiac Sign.'
                }



            },
        },




    }
</script>
<style scoped>
    @import "/adminlte/css/master.css";
    @import "/adminlte/css/media.css";
    @import "/adminlte/css/bootsrap.css";

    button {

        width: auto !important;
    }

    @media only screen and (max-width: 991px){
        .tab-left-pull{float:left!important;}
    }
    @media only screen and (max-width: 1024px){
        .userDetailmin .notification, .userDetailmin .messages{margin-right: 17px;}

    }
    @media only screen and (max-width: 767px){
        .pad-0-small{padding-left: 0px;padding-right: 0px;margin-left: -15px;margin-right: -15px;}
    }
    .msgLT ul li .msgDetail h3 {
        margin: 0px;
        font-size: 14px;
        font-weight: bold !important;
        color: #000;
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
    }
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
    .nav-tabs > li {
        float: left;
        margin-bottom: -1px;
        font-size: 15px !important;
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
    }
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
    .modal-content{
        border: 5px solid #dbdbdb !important;
    }
</style>


