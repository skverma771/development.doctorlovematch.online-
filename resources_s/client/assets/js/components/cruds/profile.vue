<template>

    <body class="profile_body">

    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid mt_10">
                <!-- Brand -->
                <div class="col-md-2">
                    <!--                    <a class="font_size15 h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">User profile</a>-->
                </div>
                <!--Search Form -->
                <!--                <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">-->
                <!--                    <div class="form-group mb-0">-->
                <!--                        <div class="input-group input-group-alternative">-->
                <!--                            <div class="input-group-prepend">-->
                <!--                                <span class="input-group-text"><i class="fa fa-search"></i></span>-->
                <!--                            </div>-->
                <!--                            <input class="form-control" placeholder="Search" type="text">-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </form>-->
                <!-- User -->
                <div class="col-md-2 offset-8 "  >

<!--                    <div class="media align-items-center">-->
<!--                <span class="avatar avatar-sm rounded-circle">-->

<!--                    <img :src="" alt="Image placeholder"  style="height: 35px;width: 40px;">-->
<!--                </span>-->
<!--                        <div class="media-body ml-2 d-none d-lg-block">-->
<!--                            <span class="mb-0   font-weight-bold text-white font_size15">{{data_item.name}}</span>-->
<!--                        </div>-->
<!--                    </div>-->

                </div>
            </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"  style="">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-7 col-md-10 mt-5">
                        <h1 class="display-2 text-white">Hello {{data_item.name}}</h1>
                        <p class="text-white mt-0 mb-5 font_size15">
<!--                            We are One Hundred percent Genuine Matchmaking site. Our focus is to find your best matches without any restrictions. We will bring your Matches to your fingertips as long as you participate with all Compatibilities and Personality Matches.-->
                           try not to share your personal information with anyone until you get to know them through chat. You can block any user from their profile and chat. Good luck !
                        </p>
                        <!--                        <a href="#!" class="btn btn-info">Edit profile</a>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img :src="data_item.pictures.profile" alt="Pofile Picture" class="rounded-circle" style="width: 180px;height: 180px;">
                                    </a>
                                    <!--                                    <input  type="file" class="form-control" @change="uploadfile_profile($event)"   placeholder="Upload Image" >-->

                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
<!--                                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>-->
<!--                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>-->
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                            <span class="heading"></span>
                                            <span class="description"></span>
                                        </div>
                                        <div>
                                            <span class="heading"></span>
                                            <span class="description"></span>
                                        </div>
                                        <div>
                                            <span class="heading"></span>
                                            <span class="description"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <h3>
                                    {{data_item.name}}<span class="font-weight-light">, {{this.age}}</span>
                                </h3>
                                <div class="h5 font-weight-300">
                                    <i class="ni location_pin mr-2"></i>{{data_item.city.name}}, {{data_item.state.name}}, {{data_item.country.name}}
                                </div>
                                <!--                                <div class="h5 mt-4">-->
                                <!--                                    <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer-->
                                <!--                                </div>-->
                                <div class="font_size12">
                                    <i class="ni education_hat mr-2"></i>{{data_item.aboutme}}
                                </div>
                                <hr class="my-4">
                                <!--                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.</p>-->
                                <!--                                <a href="#">Show more</a>-->
                                <h6 class="heading-small text-muted mb-4">Astrology Love Calculator</h6>

                                <div class="col-md-12">

                                    <label class="form-control-label" for="zodiac">Your Zodiac Sign</label>






                                    <v-select :options="options" v-model="zodiac_1" :searchable="false" label="title" class="col-md-12 f-1-5"  @input="zodiac1">
                                        <template slot="option" slot-scope="option">
                                            <!--                                                   <img :src="option.cardImage" />-->
                                            {{ option.title }}
                                        </template>
                                    </v-select>






                                </div>


                                <div class="col-md-12">

                                    <label class="form-control-label mt_10" for="zodiac">Partner’s Zodiac Sign</label>




                                    <v-select :options="options" v-model="zodiac_2" :searchable="false" label="title" class="col-md-12 f-1-5" @input="zodiac2">
                                        <template slot="option" slot-scope="option">
                                            <!--                                                    <img :src="option.cardImage" />-->
                                            {{ option.title }}
                                        </template>
                                    </v-select>






                                </div>

                                <button  class="btn btn-sm btn-info mr-4 mt_10" style="width: 50%;margin-top: 30px;" @click="fetch_result()">Calculate</button>

                                <div class="col-md-12 mt_10 h5 font-weight-300" style="text-align: left;font-size: 18px;">
                                    {{result}}
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <!--                                    <a href="#!" class="btn btn-sm btn-primary">Settings</a>-->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="save" >
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-username">Name</label>
                                                <input type="text" id="input-first-name"  v-model="data_item.name" class="form-control form-control-alternative" placeholder="First name" value="Lucky">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email address</label>
                                                <input type="email"
                                                       name="email" disabled
                                                       placeholder="Enter Email *"
                                                       v-model="data_item.email" id="input-email" class="form-control form-control-alternative" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">Date Of Birth</label>
                                                <input type="date" v-model="data_item.dob" id="input-dob"  class="form-control form-control-alternative" placeholder="DD-MM-YYYY" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Personality</label>
                                                <input type="text" id="Personality" class="form-control form-control-alternative" placeholder="Personality" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <!--                                        <div class="col-md-12">-->
                                        <!--                                            <div class="form-group focused">-->
                                        <!--                                                <label class="form-control-label" for="input-address">Address</label>-->
                                        <!--                                                <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Bld Mihail Kogalniceanu, nr. 8 Bl 1, Sc 1, Ap 09" type="text">-->
                                        <!--                                            </div>-->
                                        <!--                                        </div>-->
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">Country</label><br>
                                                <!--                                                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="United States">-->
                                                <v-select v-model="countries_modal"
                                                          name="countries"
                                                          label="name"
                                                          :options="countries"
                                                          class="col-md-12 f-1-5 mt_10 bg-white"
                                                          @input="inmodal1"


                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">State</label><br>
                                                <!--                                                <input type="text" id="input-state" class="form-control form-control-alternative" placeholder="State" value="New York">-->
                                                <v-select v-model="states_modal"
                                                          name="states"
                                                          label="name"
                                                          :options="states"
                                                          class="col-md-12 f-1-5 mt_10 bg-white"
                                                          @input="inmodal2"


                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">City/Town</label><br>
                                                <!--                                                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="City" value="New York">-->

                                                <v-select v-model="cities_modal"
                                                          name="cities"
                                                          label="name"
                                                          :options="cities"
                                                          class="col-md-12 f-1-5 mt_10 bg-white"




                                                />
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">

                                        <textarea rows="4" maxlength="250" cols="50" style="width: 100%;font-size: 14px;padding: 5px;" v-model="data_item.aboutme" class="" placeholder="A few words about you ...">A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
                                    </div>
                                </div>


                                <h6 class="heading-small text-muted mb-4">Gallery</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">


                                        <div class="col-md-3" v-for="(url,index) in data_item.pictures.gallery">
                                            <img :src="url" width="100" height="100" alt="images">
                                            <i style=" " class="fa fa-trash fa-2x" title="Delete " @click=" data_item.pictures.gallery.splice(index, 1)" aria-hidden="true"></i>&nbsp;&nbsp;
                                            <i style=" color: red"  class="fa fa-star fa-2x" title="Set Profile " @click=" data_item.pictures.profile=url" aria-hidden="true"></i>&nbsp;&nbsp;

                                        </div>
                                        <br>
                                        <input  type="file" style="background: none;border: none;padding: 25px;" class="form-control mt-4" @change="uploadfile($event)"   placeholder="Upload Image" >



                                    </div>
                                </div>

<!--                                <h6 class="heading-small text-muted mb-4">Video</h6>-->
<!--                                <div class="pl-lg-4">-->
<!--                                    <div class="form-group focused">-->


<!--                                        <div class="col-md-3" v-for="(vid,index) in data_item.pictures.videos">-->
<!--                                            <iframe width="150" height="150"-->
<!--                                                    :src="vid.url" frameborder="0" allowfullscreen>-->
<!--                                            </iframe>-->
<!--                                            <i style=" " class="fa fa-trash fa-2x" title="Delete " @click=" data_item.pictures.videos.splice(index, 1)" aria-hidden="true"></i>&nbsp;&nbsp;-->
<!--                                            <i style=""  class="fa fa-pencil fa-2x" title="Edit " @click="video_model(index)" aria-hidden="true"></i>&nbsp;&nbsp;-->

<!--                                        </div>-->

<!--                                    </div>-->
<!--                                </div>-->

<!--                                <a href="#" class="btn btn-sm btn-info mr-4 mb-4 base_color"  @click="new_video_modal=true">Upload Video</a>-->
                                <button type="submit" @click="save" class="btn btn-sm btn-info mr-4 mt-5 base_color" >Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div v-if="model_video==true">-->
<!--        <transition name="modal">-->
<!--            <div class="modal-mask form_pop">-->
<!--                <div class="modal-wrapper ">-->
<!--                    <div class="modal-dialog add_width">-->
<!--                        <div class="modal-content" style="overflow-x: hidden;overflow-y: scroll">-->
<!--                            <div class=" border-0 border-dotted">-->
<!--                                <div class="container-fluid pr-0 border-bottom" >-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-10">-->
<!--                                            <h3 class="mt-2 ml-2">Video Details</h3>-->
<!--                                        </div>-->
<!--                                        <div class="col-2 text-right">-->
<!--                                            <h1  class="close" @click="model_video=false,video_data=_.cloneDeep([])">-->
<!--                                                <h1 aria-hidden="true">&times;</h1>-->
<!--                                            </h1>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->



<!--                            </div>-->
<!--                            <div class="modal-body" style="">-->
<!--                                <div class="container-fluid c-grey">-->
<!--                                    <div class="row no-gutters">-->


<!--                                        &lt;!&ndash;                                      new_video_modal&ndash;&gt;-->

<!--                                        <label for="inputEmail3" class="col-sm-3 col-lg-3 control-label text-left">YouTube Video URL</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="videourl" v-model="video_data.url" class="form-control" id="inputEmail3">-->
<!--                                            </div>-->

<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3 col-lg-3 control-label text-left">Title</label>-->
<!--                                        <div class="col-sm-9  col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="title" v-model="video_data.title" class="form-control" id="inputPassword3">-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3  col-lg-3 control-label text-left">Location</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="location" v-model="video_data.location" class="form-control" id="inputPassword4">-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3 col-lg-3 control-label text-left">Description</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <textarea name="description" class="form-control" v-model="video_data.desc"></textarea>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                        <button type="submit" @click="save" name="submit" class="bluebtn col-sm-12 col-lg-12 mb-2" style="border-radius: 5px">Save</button>-->
<!--                                        &lt;!&ndash; <button type="button" class="bluebtn w117" data-dismiss="modal">Cancel</button> &ndash;&gt;-->



<!--                                    </div>-->

<!--                                </div>-->



<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </transition>-->
<!--    </div>-->
<!--    <div v-if="new_video_modal==true">-->
<!--        <transition name="modal">-->
<!--            <div class="modal-mask form_pop">-->
<!--                <div class="modal-wrapper ">-->
<!--                    <div class="modal-dialog add_width">-->
<!--                        <div class="modal-content" style="overflow-x: hidden;overflow-y: scroll">-->
<!--                            <div class=" border-0 border-dotted">-->
<!--                                <div class="container-fluid pr-0 border-bottom" >-->
<!--                                    <div class="row">-->
<!--                                        <div class="col-10">-->
<!--                                            <h3 class="mt-2 ml-2">Video Details</h3>-->
<!--                                        </div>-->
<!--                                        <div class="col-2 text-right">-->
<!--                                            <h1  class="close" @click="new_video_modal=false,new_video_data=_.cloneDeep({'url':'','title':'','location':'','desc':''})">-->
<!--                                                <h1 aria-hidden="true">&times;</h1>-->
<!--                                            </h1>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->



<!--                            </div>-->
<!--                            <div class="modal-body" style="">-->
<!--                                <div class="container-fluid c-grey">-->
<!--                                    <div class="row no-gutters">-->


<!--                                        &lt;!&ndash;                                      new_video_modal&ndash;&gt;-->

<!--                                        <label for="inputEmail3" class="col-sm-3 col-lg-3 control-label text-left">YouTube Video URL</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="videourl"  v-model="new_video_data.url" class="form-control" id="inputEmail3">-->
<!--                                            </div>-->

<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3 col-lg-3 control-label text-left">Title</label>-->
<!--                                        <div class="col-sm-9  col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="title" v-model="new_video_data.title" class="form-control" id="inputPassword3">-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3  col-lg-3 control-label text-left">Location</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <input type="text" name="location" v-model="new_video_data.location" class="form-control" id="inputPassword4">-->
<!--                                            </div>-->
<!--                                        </div>-->

<!--                                        <label for="inputPassword3" class="col-sm-3 col-lg-3 control-label text-left">Description</label>-->
<!--                                        <div class="col-sm-9 col-lg-9 mb-2">-->
<!--                                            <div class="video-validate clearfix">-->
<!--                                                <textarea name="descripation" v-model="new_video_data.desc" class="form-control"></textarea>-->
<!--                                            </div>-->
<!--                                        </div>-->


<!--                                        <button type="submit" name="submit" @click="data_item.pictures.videos.push(new_video_data),new_video_modal=false,new_video_data=({'url':'','title':'','location':'','desc':''})" class="bluebtn col-sm-12 col-lg-12 mb-2" style="border-radius: 5px">Send</button>-->
<!--                                        &lt;!&ndash; <button type="button" class="bluebtn w117" data-dismiss="modal">Cancel</button> &ndash;&gt;-->



<!--                                    </div>-->

<!--                                </div>-->



<!--                            </div>-->

<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </transition>-->
<!--    </div>-->

    </body>
</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'

    export default {
        data() {
            return {
                age:'0',
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
                url1:"https://doctorlovematch.com/templates/lovematch/images/1.png",
                url2:"https://doctorlovematch.com/templates/lovematch/images/1.png",
                options: [],
                countries:[],
                countries_modal:[],
                states:[],
                states_modal:[],
                cities:[],
                cities_modal:[],
                result:'',
                model_video:false,
                video_data:[],
                new_video_modal:false,
                new_video_data:{'url':'','title':'','location':'','desc':''},
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
                    console.log(this.options);
                })
        },
        destroyed() {

        },
        watch: {
            "data_item.dob":function () {
                this.age=this.getAge(this.data_item.dob);

            },
            "data_item.country_id":function () {


                let form1 = new FormData();
                form1.set('country', this.data_item.country_id);
                axios.post('/api/country', form1)
                    .then(response => {
                        this.countries=response.data.countries;
                        if(response.data.country!=null){
                            this.countries_modal.push(response.data.country);
                        }

                    });


                let form = new FormData();
                form.set('country', this.data_item.country_id);
                form.set('state', this.data_item.state_id);
                form.set('source', '2');
                axios.post('/api/states', form)
                    .then(response => {
                        this.states=response.data.states;
                        if(response.data.state!=null){
                            this.states_modal.push(response.data.state);
                        }

                    });



                let form2 = new FormData();
                form2.set('state', this.data_item.state_id);
                form2.set('city', this.data_item.city_id);
                form2.set('source','2');
                axios.post('/api/cities', form2)
                    .then(response => {
                        this.cities=response.data.cities;
                        if(response.data.city!=null){
                            this.cities_modal.push(response.data.city);
                        }

                    });






            },


        },
        methods: {
            video_model(index){
                this.video_data=_.cloneDeep(this.data_item.pictures.videos[index])
                this.model_video=true
            },
            save(){
                this.model_video=false
                this.$emit('submit');

            },
            uploadfile(value){
                uploadfile("gallery_update", 'image', value.target.files[0], this.data_item.id).then(response => {
                    this.data_item.pictures.gallery.push(response.data);

                })
            },
            inmodal1(e){
                if(e!=null){
                    console.log(e.name);
                    let form = new FormData();
                    form.set('country', e.id);
                    form.set('state', '');
                    form.set('source', '1');
                    axios.post('/api/states', form)
                        .then(res => {

                            this.states=res.data;
                        });
                }
            },
            inmodal2(e){
                if(e!=null){
                    console.log(e.name);
                    let form = new FormData();
                    form.set('state', e.id);
                    form.set('city', '');
                    form.set('source','1');
                    axios.post('/api/cities', form)
                        .then(res => {
                            this.cities=res.data;
                        });
                }
            },
            getAge(dateString) {
                var today = new Date();
                var birthDate = new Date(dateString);
                var age = today.getFullYear() - birthDate.getFullYear();
                var m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
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
        props: ['data_item']
    }
</script>


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

    p {
        font-size: 1rem;
        font-weight: 300;
        line-height: 1.7;
    }

    .description {
        font-size: .875rem;
    }

    .heading {
        font-size: .95rem;
        font-weight: 600;
        letter-spacing: .025em;
        text-transform: uppercase;
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
