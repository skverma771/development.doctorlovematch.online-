<template>
<div>

    <header id="header" class="navbar-fixed-top innerHeader main">
        <div class="container">
            <div class="col-md-4 col-sm-6 col-xs-12 ">
                <div class="logo">
                    <a href="/">
                        <img src="./resources/images/logo.png" alt="doctor lovematch">
                    </a>
                </div>
            </div>


            <!--Google adsence-->
            <!--adsbygoogle-->
            <!--<div class="col-md-5 col-sm-6 text-center pad-0-small">
              <div class="logo">
                <ins class="adsbygoogle"
                  style="display:inline-block;width:100%;height:70px"
                  data-ad-client="ca-pub-7474223298834156"
                  data-ad-slot="9500903627"></ins>
                  <script>
                  (adsbygoogle = window.adsbygoogle || []).push({});
                  </script>
              </div>
            </div>-->

            <div class="col-md-3 col-sm-6 col-xs-12 pull-right tab-left-pull">
                <div class="flag-links login">
                    <div class="userDetailmin clearfix">
                        <div class="user clearfix role="  id="tickerImageId" title="doctor lovematch">


                        <figure :style="{ 'background-image': 'url('+data_item.pictures.profile +')'}">

                        </figure>

                        <div class="userAction">
                            <p>Welcome!</p>
                            <span>{{data_item.name}}</span>
                        </div>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span aria-hidden="true" class="glyphicon glyphicon-play"></span></a>

                        <ul class="dropdown-menu">
                            <li><a href="#logout" onclick="$('#logout').submit();">Logout</a></li>
                            <li><a href="#" @click="$emit('navigate','profile')">Edit Profile</a></li>
<!--                            <li><router-link :to="{ name: 'auth.change_password' }" >Change Password</router-link></li>-->

                            <li><a href="#" @click="$emit('navigate','membership')">Membership Status</a></li>
                            <li><a href="#" data-toggle="modal" @click="cancel">Cancel Membership</a></li>
                            <li><a href="#" data-toggle="modal" @click="show_problem=true">Report a problem</a></li>
                        </ul>
                    </div>
                        <div class="modal show in" v-if="show_problem" id="" style="display: block;">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h4 class="">Report Problem</h4>
                                    </div>
                                    <div class="modal-body text-center">
                                        <textarea cols="50" rows="4" v-model="problem_text"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="bluebtn"  @click="Reportproblem" id="">Report</button>
                                        <button @click="show_problem=false" class="bluebtn" type="button">Close</button>

                                    </div>

                                </div>
                            </div>
                        </div>

                    <!-- notifications Div -->
                    <div class="notification" @click="open_noti">
                        <a href="#">
                            <span aria-hidden="true" class="glyphicon glyphicon-bell"></span>
                        </a>
                        <b id="notificationId" v-if="notification_length!=0">{{notification_length}}</b>
                    </div>

                    <!--meaasges notification-->
                    <div class="messages" @click="open_msg">
                        <a id="mess" href="#">
                            <span aria-hidden="true" class="glyphicon glyphicon-envelope"></span>
                        </a>
                        <b id="messagesid"v-if="msg_length!=0">{{msg_length}}</b>
                    </div>
                </div>
            </div>
        </div>
</div>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <!-- seekingmembers requset -->
                            <li :class="[nav.home ? 'active' : '' ]" ><a href="#" @click="$emit('navigate','home')"><i class="fa fa-home"></i>Home</a><span class="ovrly-mobile"></span></li>

                            <!-- editprofile requset -->
                            <li :class="[nav.profile ? 'active' : '' ]"><a href="#" @click="$emit('navigate','profile')" ><i class="fa fa-user"></i>Profile</a><span class="ovrly-mobile"></span></li>
                            <!-- viewedmembers requset -->
<!--                            <li  class="pos-relative">-->
<!--                                <span class="spanId"></span>-->
<!--                                <a href="/component/innerpage/?view=viewedmembers"><i class="fa fa-question"></i>Who Viewed Me </a><span class="ovrly-mobile"></span>-->
<!--                            </li>-->
                            <li  :class="[nav.whoviewedme ? 'active' : '' ]"><a href="#" @click="$emit('navigate','whoviewedme')" ><i class="fa fa-eye"></i>Who Viewed Me</a><span class="ovrly-mobile"></span></li>


                            <!-- userMeet requset -->
<!--                            <li>-->
<!--                                <span class=""></span>-->
<!--                                <a href="/component/meetme/?view=meetme"><i class="fa fa-question"></i>Meet Her </a><span class="ovrly-mobile"></span>-->
<!--                            </li>-->
                            <li  :class="[nav.meet ? 'active' : '' ]">
                                <a href="#" v-if="looking_for=='Male'" @click="$emit('navigate','meet')" ><i class="fa fa-male"></i>Meet Him</a>
                                <a href="#" v-else @click="$emit('navigate','meet')" ><i class="fa fa-female"></i>Meet Her</a>
                                 <span class="ovrly-mobile"></span>
                            </li>

                            <!-- lmgroups requset -->

                            <li  :class="[nav.matchmaker ? 'active' : '' ]"><a href="#" @click="$emit('navigate','matchmaker')" ><i class="fa fa-heartbeat"></i>Match Maker</a><span class="ovrly-mobile"></span></li>

                            <!-- usersearch requset -->
                            <li  :class="[nav.search ? 'active' : '' ]"><a href="#" @click="$emit('navigate','search')" ><i class="fa fa-search"></i>Search</a><span class="ovrly-mobile"></span></li>



                            <li  :class="[nav.personality_match ? 'active' : '' ]"><a href="#" @click="$emit('navigate','personality_match')" ><i class="fa fa-users"></i>Personality Matches</a><span class="ovrly-mobile"></span></li>



                            <li  :class="[nav.compatibility ? 'active' : '' ]"><a href="#" @click="$emit('navigate','compatibility')" ><i class="fa fa-handshake-o"></i>Compatibility</a><span class="ovrly-mobile"></span></li>



                            <!-- questionmatchs requset -->

                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </div>
        </nav>


    </header>




    <!--    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">-->
<!--        <div class="container">-->
<!--            <a class="navbar-brand" href="/">-->

<!--                <img src="./resources/images/logo.png" alt="logo" style="height: 51px"></img>-->
<!--            </a>-->
<!--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--                <span class="fa fa-bars"></span> Menu-->
<!--            </button>-->
<!--            <div class="collapse navbar-collapse" id="ftco-nav">-->
<!--                <ul class="navbar-nav ml-auto">-->
<!--                    &lt;!&ndash;                                     <li class="nav-item active">&ndash;&gt;-->
<!--                    &lt;!&ndash;                                     <i class="fa fa-home" aria-hidden="true"></i>&nbsp;<a href="#" class="nav-link">Home</a></li>&ndash;&gt;-->
<!--                    <li class="nav-item"><a href="/" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Home</a></li>-->
<!--                    <li class="nav-item" :class="[nav.profile ? 'active' : '' ]"><a href="#" @click="$emit('navigate','profile')" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile</a></li>-->
<!--                    <li class="nav-item" :class="[nav.whoviewedme ? 'active' : '' ]"><a href="#"  @click="$emit('navigate','whoviewedme')" class="nav-link"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Who Viewed Me</a></li>-->
<!--                    <li class="nav-item" :class="[nav.meet ? 'active' : '' ]">-->
<!--                        <a href="#" v-if="looking_for=='Male'"  @click="$emit('navigate','meet')" class="nav-link"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Meet Him</a>-->
<!--                        <a href="#" v-else class="nav-link"  @click="$emit('navigate','meet')"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Meet Him</a>-->

<!--                    </li>-->
<!--                    <li class="nav-item" :class="[nav.matchmaker ? 'active' : '' ]"><a href="#"  @click="$emit('navigate','matchmaker')" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Match Maker</a></li>-->
<!--                    <li class="nav-item" :class="[nav.search ? 'active' : '' ]"><a href="#"  @click="$emit('navigate','search')" class="nav-link"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;Search</a></li>-->
<!--                    <li class="nav-item" :class="[nav.personality_match ? 'active' : '' ]"><a href="#"  @click="$emit('navigate','personality_match')" class="nav-link"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Personality Matches</a></li>-->
<!--                    <li class="nav-item" :class="[nav.compatibility ? 'active' : '' ]"><a href="#"  @click="$emit('navigate','compatibility')" class="nav-link"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Compatibility</a></li>-->

<!--                </ul>-->
<!--            </div>-->

<!--        </div>-->
<!--    </nav>-->

    </div>
</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'

    export default {
        data() {
            return {
                looking_for:'Male',
                notification_length:0,
                msg_length:0,
                problem_text:'',
                show_problem:false


            }
        },


        created() {

            this.looking_for=document.querySelector("meta[name='lookingfor']").getAttribute('content');
            this.fetch_noti_sms();
            setInterval(this.fetch_noti_sms,10000);
            setInterval(this.fetch_msg,10000);

        },
        methods:{
            Reportproblem(){

                let form= new FormData();
                form.set('id',document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('problem',this.problem_text);
                axios.post('/api/reportproblem', form)
                    .then(resp => {
                        this.$eventHub.$emit('create-success')
                        this.show_problem=false;
                        this.problem_text=''
                    })

            },

            cancel(){

                let form= new FormData();
                form.set('id',document.querySelector("meta[name='user-id']").getAttribute('content'));

                axios.post('/api/cancel', form)
                    .then(resp => {
alert("Membership Cancelled")
                    })
            },
            open_noti(){
                this.$emit('navigate','notification');
            },
            open_msg(){
                this.$emit('navigate','messages');
            },
            fetch_noti_sms(){
                let form = new FormData();
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('status', '0');
                axios.post('/api/fetch_noti', form)
                    .then(res => {
                        this.notification_length=0;
                        res.data.forEach( (noti) => {
                            if(noti.notifystatus==0){
                                this.notification_length++;
                            }
                        });

                    });
            },
            fetch_msg(){
                let form = new FormData();
                form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
                form.set('status', '0');
                axios.post('/api/fetch_msg', form)
                    .then(res => {
                        this.msg_length=0;
                        res.data.forEach( (noti) => {
                            if(noti.notifystatus==0){
                                this.msg_length++;
                            }
                        });

                    });
            }
        },
        props:['nav','data_item']



    }
</script>
<style scoped>
    @import "/adminlte/css/master.css";
    @import "/adminlte/css/media.css";
    @import "/adminlte/css/bootsrap.css";
    button {

        width: auto !important;
    }
    /*.header-image{ left: 50%;margin: 0 auto 0 -140px;position: absolute;top: 44px;}*/
    /*@media (max-width:1042px){*/
    /*    .table-resize{border: 1px solid #ddd; margin-bottom: 60px; overflow-y:hidden;width: 100% }*/
    /*    #header .logo a img{width:100%;}*/

    /*    !*------------------------------------edit on 22june---------------------------------------------------------*!*/
    /*    .spanId, .spanqueId, .spanperId{top:0px;}*/
    /*    !*------------------------------------------------------------------------------------------*!*/

    /*}*/
    /*@media (max-width:993px){*/
    /*    #header .app {margin-top: 10px!important; margin-bottom: 10px!important}*/
    /*}*/
    /*@media (max-width:991px){*/
    /*    .navbar-header {float: none;}*/
    /*    #header .logo {float: none; text-align: center; width: 100%;padding: 0;}*/
    /*    #header .logo, #header .app {margin-top: 10px !important;}*/
    /*    #header .logo a img{width:auto;}*/
    /*}*/
    /*@media (max-width:764px){*/
    /*    #header{padding-bottom: 0px;}*/
    /*          }*/
    /*@media (max-width:360px){*/
    /*    .header-image{top: 30px; width: 240px;}*/
    /*    .innerHeader .logo{margin-top: 5px;}*/
    /*}*/
    @media only screen and (max-width: 991px){
        .tab-left-pull{float:left!important;}
    }
    @media only screen and (max-width: 1024px){
        .userDetailmin .notification, .userDetailmin .messages{margin-right: 17px;}

    }
    @media only screen and (max-width: 767px){
        .pad-0-small{padding-left: 0px;padding-right: 0px;margin-left: -15px;margin-right: -15px;}
    }

</style>


