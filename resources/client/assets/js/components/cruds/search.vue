<template >
    <div class="container" style="padding-top: 50px !important;margin-bottom: 50px !important;"  >

        <div class="row">
            <!-- group -->
            <div class="col-md-7 ">
                <div class="shadowBox clearfix userProfile margin0">
                    <div class="tabBlock">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab">Search</a></li>
                            <!--  <li><a data-toggle="tab" href="#menu2">Advanced Search</a></li> -->
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="menu1" class="tab-pane fade in active">


                            <input type="hidden" name="option" value="com_userprofile">
                            <input type="hidden" name="view" value="usersearch">
                            <input type="hidden" name="task" value="searchUser">
                            <div class="searchFun searchFun_Users clearfix">
                                <div style="margin-bottom:5px" class="form-group search-maxWidth clearfix">
                                    <select class="form-control pull-left w250 search-padd" name="selectsearch" id="gender" @change="gender_save">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Search Men</option>
                                        <option value="Female">Search Women</option>
                                        <!--                                            <option value="2">Search Groups</option>-->
                                        <!--                                            <option value="3">Search Events</option>-->
                                    </select>

                                    <!-- display div to show data-->
                                    <div class="pull-left  clearfix bg-white" style="background: white !important;width: 70% !important;">
                                        <!--                                            <input type="text" name="name" id="name" autocomplete="off" class="form-control w520 width-input" placeholder="Search" value="">-->
                                        <!--                                            <div id="display" class="display-validation"></div>-->

                                        <v-select v-model="member_data_modal"
                                                  name="members"
                                                  label="name"
                                                  :options="member_data"
                                                  class="bg-white"

                                                  placeholder="Search"
                                                  @input="inmodal_member"



                                        />


                                    </div>
                                </div>
                                <!-- //agegroup dropdown -->
                                <select name="agegroup" id="agegroup" class="form-control form-control pull-left w250 search-padd" @change="age_group">
                                    <option value="">Select AgeGroup</option>
                                    <option value="18-29">18-29</option>
                                    <option value="30-39">30-39</option>
                                    <option value="40-50">40-50</option>
                                    <option value="51">50</option>
                                </select>




                                <!--                                    <div class="form-group focused">-->
                                <!--                                        <label class="form-control-label" for="input-country">Country</label><br>-->
                                <!--                                        &lt;!&ndash;                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">&ndash;&gt;-->
                                <!--                                        <v-select v-model="countries_modal"-->
                                <!--                                                  name="countries"-->
                                <!--                                                  label="name"-->
                                <!--                                                  :options="countries"-->
                                <!--                                                  class="col-md-12 f-1-5 mt_10"-->
                                <!--                                                  @input="inmodal1"-->


                                <!--                                        />-->
                                <!--                                    </div>-->
                                <select name="searchcountry" id="country" class="form-control form-control pull-left w250 search-padd" @change="inmodal1">

                                    <option value="">Select Country</option>

                                    <option v-for="(county,index) in countries" :value="county.id">{{county.name}}</option>

                                </select>




                                <select name="searchstate" id="state" class="form-control form-control pull-left w250 search-padd" @change="inmodal2">
                                    <option value="">Select State</option>
                                    <option v-for="(states,index) in states" :value="states.id">{{states.name}}</option>
                                </select>

                                <select name="saerchcity" id="city" class="form-control form-control pull-left w250 search-padd" @change="inmodal3">
                                    <option value="">Select City</option>
                                    <option v-for="(cities,index) in cities" :value="cities.id">{{cities.name}}</option>
                                </select>

                                <div class="row" style="margin-top: 100px;">
                                    <div class="col-md-6"><button type="submit" @click="fetch_member_data" value="Search" class="btn btn-default pull-left bluebtn bttn-padding">Search</button></div>
                                    <div class="col-md-6"><button type="submit" @click="reset" value="Search" class="btn btn-default pull-left bluebtn bttn-padding">Reset Search</button></div>

                                </div>


                                <div class="clearfix"></div>

                            </div>


                            <ul class="searchBox2" id="displayBlank" v-if="mem_aval">

                                <li class="clearfix" v-for="(mem,index) in filtered_members">
                                    <div class="row margin0">
                                        <div class="col-xs-7 searchProfile padding0">
                                            <a href="#">
                                                <!-- <img class="pull-left" src="/templates/lovematch/"> -->
                                                <div class="imageHeight-fix search-profileHeight" :title="mem.name" :style="{ backgroundImage: 'url(' + mem.pictures + ')' }">
                                                </div>
                                            </a>


                                            <h2>{{mem.name}},{{mem.ntcount}}</h2>
                                            <h3>
                                                {{mem.cityname}},{{mem.countryname}}</h3><h3>
                                        </h3></div>
                                        <div class="col-xs-5 text-right">
                                            <a href="#" target="">
                                                <button class="graybutton w117" @click="viewprofile(mem.id)">
                                                    <i class="fa fa-eye"></i>
                                                    View Profile
                                                </button>
                                            </a>


                                            <button @click="sendmsg=true" type="button" class="graybutton w117" onclick="openModal('399','Shilpi','');">
                                                <i class="fa fa-envelope"></i>
                                                Send Message
                                            </button>

                                        </div>
                                        <div v-if="sendmsg==true">
                                            <transition name="modal">
                                                <div class="modal-mask form_pop">
                                                    <div class="modal-wrapper ">
                                                        <div class="modal-dialog">
                                                            <div class="col-md-12 col-md-offset-2">
                                                                <div class="col-2 text-right">
                                                                    <h1  class="close" @click="sendmsg=false" >
                                                                        <h1  aria-hidden="true">&times;</h1>
                                                                    </h1>
                                                                </div>
                                                                <div class="panel panel-default" style="border-radius: 0px;
border: 5px solid #dbdbdb;">
                                                                    <div class="panel-heading" style="color: #ca2532;
font-size: 19px;
font-weight: 600;"> Message To: {{mem.name}}</div>
                                                                    <div class="panel-body">




                                                                        <div class="form-group">


                                                                            <div class="col-md-12">
                                                                                <textarea style="width: 100%" col="60" v-model="msg_area"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <div class="col-md-6 col-md-offset-4">
                                                                                <a  href="#" @click="sendmsgfinal(mem.id)" class="btn btn-primary bluebtn" >
                                                                                    Send
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </transition>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="searchBox2" id="displayBlank" v-else>
                                No Results            </ul>
                            <!-- pagenation -->

                        </div>
                    </div>
                </div>
            </div>
            <!-- group -->
            <!-- Calculator -->
            <div class="col-md-5 calculator">

                <div class="shadowBox clearfix suggested">
                    <div class="membarhead clearfix col-md-12 other-suggested-profile">
                        <h6>Other Suggested Profiles</h6>
                        <div class=" row">
                            <div class="col-md-4 col-sm-4 mt_10 mb_10" v-for="(profile,index) in rand_mem">
                                <div class="membarsProfile shadowInner membersheight">

                                    <a href="#" @click="viewprofile(profile.id)">
                                        <div class="imageHeight-fix multiplephotoupload2 other-suggestion-height" :title="profile.name" :style="{ backgroundImage: 'url(' + profile.pictures + ')' }"></div>
                                    </a>

                                    <hgroup>
                                        <h2 class="groupSectionh2">{{profile.name}}, <span> {{profile.ntcount}} </span></h2>
                                        <h3 class="groupSectionh3">
                                            {{profile.city.name}},{{profile.country.name}}</h3><h3>
                                    </h3></hgroup>
                                </div>
                            </div>






                        </div>
                    </div>
                </div>

                <div class="shadowBox clearfix">
                    <div class="membarhead clearfix col-md-12 ">
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
        <br>
        <br>
        <br>

    </div>


</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'
    import Autocomplete from 'vuejs-auto-complete'

    export default {
        data() {
            return{
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
                countries:[],
                countries_modal:[],
                states:[],
                states_modal:[],
                cities:[],
                cities_modal:[],
                selected_place_search:[{'country':'','state':'','city':''}],
                member_data:[],
                member_data_modal:"",
                rand_mem:[],
                gender:'',
                age_select:'',
                member_search_data:[{'country':'','state':'','city':'','age':'','gender':'','name':''}],
                mem_aval:true,
                filtered_members:[],
                count:false,
                blocked_user:[],
                sendmsg:false,
                msg_area:''

            }
        },

        created() {
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
            let form1 = new FormData();
            form1.set('country', '');
            axios.post('/api/country', form1)
                .then(response => {
                    this.countries=response.data.countries;
                    if(response.data.country!=null){
                        this.countries_modal.push(response.data.country);
                    }

                });
            var counter=0;
            axios.get('/api/fetch_mem')
                .then(response => {
                    let form3 = new FormData();
                    form3.set('user_id','');
                    form3.set('block_user_id',this.data_item.id);
                    form3.set('source',4);
                    axios.post('/api/block_unblock_user', form3)
                        .then(res => {
                            this.blocked_user=[];
                            res.data.forEach( (user) =>{

                                if(user.status==1){
                                    this.blocked_user.push(user.user_id);
                                }

                            })
                            this.blocked_user.push(this.data_item.id);
                            console.log(this.blocked_user);
                            response.data.forEach( (mem) =>{
                                 counter=0;
                                this.blocked_user.forEach( (userid) =>{

                                    if(mem.id==parseInt(userid)){
                                        counter=1;

                                       }
                              })

                                if(counter!=1){
                                    this.member_data.push(mem);

                                }
                            })

                            let form2 = new FormData();
                            form2.set('lookingfor', this.data_item.lookingfor);
                            axios.post('/api/random_mem', form2)
                                .then(response => {


                                    // response.data.forEach((rand)=>{
                                    //     rand.pictures=JSON.parse(rand.pictures).profile;
                                    //     // console.log(rand.pictures);
                                    //
                                    //     this.rand_mem.push(rand);
                                    //
                                    // })

                                    response.data.forEach( (mem) =>{
                                        mem.pictures=JSON.parse(mem.pictures).profile;
                                        counter=0;
                                        this.blocked_user.forEach( (userid) =>{

                                            if(mem.id==parseInt(userid)){
                                                counter=1;

                                            }
                                        })

                                        if(counter!=1){
                                            this.rand_mem.push(mem);

                                        }
                                    })

                                });


                        });





                });




        },
        destroyed() {

        },
        computed:{

        },
        watch: {


        },
        methods: {
            sendmsgfinal(id){
                this.sendmsg=false
                let params = new FormData();
                params.set('message', this.msg_area);
                params.set('datetime', Date.now());
                params.set('sender', document.querySelector("meta[name='user-id']").getAttribute('content'));
                params.set('receiver', id);


                axios.post('/api/v1/messages', params)
                    .then(response => {

                        this.msg_area='';

                    })
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
            inmodal1(e){

                if(e.target.value!=""){
                    // alert(e.target.value);
                    //     console.log(e.name);
                    this.selected_place_search[0]['country']=e.target.value;
                    this.member_search_data[0]['country']=e.target.value;
                    let form = new FormData();
                    form.set('country', e.target.value);
                    form.set('state', '');
                    form.set('source', '1');
                    axios.post('/api/states', form)
                        .then(res => {

                            this.states=res.data;
                        });
                }
            },
            inmodal2(e){

                if(e.target.value!=null){
                    // console.log(e.name);
                    this.selected_place_search[0]['state']=e.target.value;
                    this.member_search_data[0]['state']=e.target.value;
                    let form = new FormData();
                    form.set('state', e.target.value);
                    form.set('city', '');
                    form.set('source','1');
                    axios.post('/api/cities', form)
                        .then(res => {
                            this.cities=res.data;
                        });
                }
            },
            inmodal3(e){
                // alert(e.target.value);
                if(e.target.value!=null) {
                    this.selected_place_search[0]['city'] = e.target.value;
                    this.member_search_data[0]['city']=e.target.value;
                }
            },
            gender_save(e){

                if(e.target.value!=null) {
                    this.member_search_data[0]['gender']=e.target.value;
                }
            },
            age_group(e){
                if(e.target.value!=null) {
                    this.age_select = e.target.value;
                    this.member_search_data[0]['age']=e.target.value;
                }
            },
            reset(){


                this.member_search_data=[{'country':'','state':'','city':'','age':'','gender':'','name':''}];
                this.filtered_members=[];
                this.member_data_modal="";
                document.getElementById('gender').value = '';
                document.getElementById('agegroup').value = '';
                document.getElementById('country').value = '';
                document.getElementById('state').value = '';
                document.getElementById('city').value = '';
                this.mem_aval=true;




            },
            inmodal_member(e){
            if(e==null){
                console.log('null');
                this.member_search_data[0]['name']='';
            }
            else{
                console.log(e.name);
                this.member_search_data[0]['name']=e.name;
            }
            },
            fetch_member_data(){
                // console.log(this.member_search_data);
                var counter=0;
                if(this.member_search_data[0]['country']=='' &&
                    this.member_search_data[0]['state']=='' &&
                    this.member_search_data[0]['city']=='' &&
                    this.member_search_data[0]['age']=='' &&
                    this.member_search_data[0]['gender']=='' &&
                    this.member_search_data[0]['name']==''
                ){

                    if(this.member_data.length>0){
                        console.log(this.member_data);
                        this.member_data.forEach( (mem) =>{
                            if(this.count!==true){
                                mem.pictures=JSON.parse(mem.pictures).profile;
                            }


                            if(mem.id!==this.data_item.id){
                                this.filtered_members.push(mem);
                            }
                        })
                        this.mem_aval=true;
                        // console.log(this.filtered_members);
                    }
                    else{
                        this.mem_aval=false;
                    }
                    this.count=true;

                }
                else{
                    let form2 = new FormData();
                    form2.set('arr', JSON.stringify(this.member_search_data));
                    axios.post('/api/filtered_mem', form2)
                        .then(response => {

                            this.filtered_members=[];
                            if(response.data.length>0){
                                response.data.forEach( (mem) =>{
                                    counter=0;
                                    this.blocked_user.forEach( (userid) =>{

                                        if(mem.id==parseInt(userid)){
                                            counter=1;

                                        }
                                    })

                                    if(counter!=1){
                                        this.filtered_members.push(mem);

                                    }
                                })
                                console.log(this.filtered_members);
                                this.mem_aval=true;
                            }
                            else{
                                this.mem_aval=false;
                            }


                            // if(response.data.length>0){
                            //     response.data.forEach( (mem) =>{
                            //
                            //         mem.pictures=JSON.parse(mem.pictures).profile;
                            //          var counter=0;
                            //             this.blocked_user.forEach( (userid) =>{
                            //
                            //                 if(mem.id!==parseInt(userid)){
                            //                     counter=1;
                            //                     console.log(mem.id+'+'+userid)
                            //                 }
                            //             })
                            //
                            //             if(counter!=1){
                            //                 console.log(mem.id+'-'+userid)
                            //                 this.filtered_members.push(mem);
                            //
                            //             }
                            //     })
                            //
                            //     this.mem_aval=true;
                            // }
                            // else{
                            //     this.mem_aval=false;
                            // }


                        });

                }


            },



        },
        props: ['data_item'],
        components: {Autocomplete}

    }
</script>


<style scoped>
    @import "/adminlte/css/master.css";
    @import "/adminlte/css/media.css";
    @import "/adminlte/css/bootsrap.css";
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
