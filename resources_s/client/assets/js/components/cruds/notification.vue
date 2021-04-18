<template>
    <div class="container main">
        <div class="membars clearfix seekingMembars ">
            <div class="membarhead clearfix">
                <ol class="breadcrumb pull-left">
                    <li><a id="Notification" class="active">Notification</a></li>
                </ol>
            </div>

            <div class="row message">
                <div class="col-md-6">
                    <div class="msgLT">
                        <h2>Notifications</h2>
                        <ul>

                           <li v-for="(notification,index) in noti">

                                <div class="clearfix">
                                    {{notification.pictures.profile}}
                                    <img v-if="JSON.parse(notification.pictures).profile"  :src="JSON.parse(notification.pictures).profile" alt="doctor lovematch">
                                    <img v-else src="https://doctorlovematch.com/templates/lovematch/profile/thumbSeekingImage/female.jpg" alt="doctor lovematch" >
                                    <div class="msgDetail msgDetailNew">
                                        <h3>
                                            {{notification.name}}
                                            <span>{{notification.ntcount}}</span>
                                            <i v-if="notification.catgories=='compatibility'">is compatible {{notification.requestid}}% or more in Compatibility Matches</i>
                                            <i v-else-if="notification.catgories=='personality'">is compatible {{notification.requestid}}% or more in Personality Matches</i>
                                            <i v-else-if="notification.catgories=='winked'"><b>winked you</b></i>
                                            <i v-else-if="notification.catgories=='yes'">said <b>Yes to meet you</b></i>
                                            <i v-else-if="notification.catgories=='viewed'">viewed your profile</i>
                                            <a href="#" @click="viewprofile(notification.id)">click</a>
                                            <br>                       <span class="time">{{notification.datetime}}</span>
                                        </h3>
                                        <p></p>
                                    </div>


                                </div>
                            </li>




                        </ul>
                    </div>
                </div>

                <!-- calculator -->
                <div class="col-md-6 calculator">
                    <div class="shadowBox clearfix">
                        <div class=" clearfix col-md-12 ">
                            <h6>Astrology <span>Love</span> Calculator</h6>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="" class="col-sm-8 control-label mb_10" style="margin-left:20px">Your Zodiac Sign</label>
                                    <div class="col-sm-12">
                                        <v-select :options="options" v-model="zodiac_1" :searchable="false" label="title" class="col-md-12 f-1-5"  @input="zodiac1">
                                            <template slot="option" slot-scope="option">
                                                <!--                                                   <img :src="option.cardImage" />-->
                                                {{ option.title }}
                                            </template>
                                        </v-select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-8 control-label mb_10" style="margin-left:20px">Partner’s Zodiac Sign</label>
                                    <div class="col-sm-12">
                                        <v-select :options="options" v-model="zodiac_2" :searchable="false" label="title" class="col-md-12 f-1-5" @input="zodiac2">
                                            <template slot="option" slot-scope="option">
                                                <!--                                                    <img :src="option.cardImage" />-->
                                                {{ option.title }}
                                            </template>
                                        </v-select>
                                    </div>
                                </div>
                                <!--                            <div class="form-group col-md-12">-->
                                <!--                                <button  class="btn btn-sm btn-info mr-4 mt_10" style="width: 50%;margin-top: 30px;margin-left: 10px;" @click="fetch_result()">Calculate</button>-->
                                <!--                            </div>-->
                                <div class="form-group col-md-12">
                                    <button type="button" id="astrologyId" style="margin-left: 10px;" class="btn btn-primary bluebtn" @click="fetch_result()">Calculate</button>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-10 mt_10 h5 font-weight-300" style="text-align: left;font-size: 18px;margin-left: 10px;">
                            {{result}}
                        </div>
                    </div>
                </div>
                <!-- Calculator -->
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
                zodiac_1:[ {
                    title: "♈︎ Aries( Mar 21 to Apr 19)",
                    cardImage: "https://doctorlovematch.com/templates/lovematch/images/1.png",
                    id:"1"
                }],
                zodiac_2:[ {
                    title: "♈︎ Aries( Mar 21 to Apr 19)",
                    cardImage: "https://doctorlovematch.com/templates/lovematch/images/1.png",
                    id:"1"
                }],
                options: [],
                result:'',
                noti:'',

            }
        },


        created() {

            this.looking_for=document.querySelector("meta[name='lookingfor']").getAttribute('content');
            axios.get('/api/zodiac')
            .then(response => {

                    response.data.forEach( (dataObj) => {

                        this.options.push(
                            {
                                title: dataObj.zodiac+"( "+dataObj.daterange+" )",
                                cardImage: "https://doctorlovematch.com/templates/lovematch/images/"+dataObj.zodiac_images,
                                id:dataObj.id
                            }
                        )

                    });

                });
            let form = new FormData();
             form.set('user_id', document.querySelector("meta[name='user-id']").getAttribute('content'));
             form.set('status', '1');
                axios.post('/api/fetch_noti', form)
                    .then(res => {
                        this.noti=res.data;
                        res.data.forEach( (noti) => {
                            var today = new Date();
                            var dd = String(today.getDate()).padStart(2, '0');
                            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                            var yyyy = today.getFullYear();


                            today = yyyy + '-' + mm + '-' + dd;

                            const date1 = new Date(today);
                            const date2 = new Date(noti.datetime);
                            const diffTime = Math.abs(date2 - date1);
                            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                            var main_diff='';
                            console.log(diffDays + " days");
                            if(diffDays==0){
                                main_diff="today";
                            }
                            if(diffDays<=29 && diffDays>0 ){
                                main_diff=diffDays + " days ago";
                            }
                            if(diffDays>30){
                                main_diff="a month ago";
                            }
                            if(diffDays>60){
                                main_diff="2 months ago";
                            }
                            if(diffDays>90){
                                main_diff="3 months ago";
                            }
                            if(diffDays>120){
                                main_diff="4 months ago";
                            }
                            if(diffDays>150){
                                main_diff="5 months ago";
                            }
                            if(diffDays>180){
                                main_diff="6 months ago";
                            }
                            if(diffDays>210){
                                main_diff="7 months ago";
                            }
                            if(diffDays>240){
                                main_diff="8 months ago";
                            }
                            if(diffDays>270){
                                main_diff="9 months ago";
                            }
                            if(diffDays>300){
                                main_diff="10 months ago";
                            }
                            if(diffDays>330){
                                main_diff="11 months ago";
                            }
                            if(diffDays>360){
                                main_diff="a year ago";
                            }
                            noti.datetime=main_diff;

                        });


                    });


        },
        methods:{
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
    .msgLT ul li .msgDetail h3 {
        margin: 0px;
        font-size: 14px;
        font-weight: bold !important;
        color: #000;
    }
    .msgLT ul li img {float:left; margin-right: 10px;margin-bottom: 8px; border:1px solid #c8c8c8; height: 75px; width: 75px;}
</style>


