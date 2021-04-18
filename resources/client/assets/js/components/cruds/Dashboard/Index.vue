<template>
    <section class="content-wrapper" style="min-height: 960px;">

        <navigation   :data_item="item" :nav="nav" @navigate="navigate" class="header-bar"></navigation>
        <home v-show="nav.home || nav.whoviewedme" :whoviewed="nav.whoviewedme" :data_item="data" @viewprofile="viewprofile"  @submit="submitForm"></home>
        <profile v-show="nav.profile" :data_item="data"  @submit="submitForm"></profile>
        <personality @viewprofile="viewprofile":data_item="item" v-if="nav.personality_match"> </personality>
        <compatibility @viewprofile="viewprofile" :data_item="item" v-if="nav.compatibility"> </compatibility>
        <profile-show v-if="nav.profile_show" :matched_data="match_data"  :data_item="data_show" @viewprofile="viewprofile" ></profile-show>
        <search :data_item="item" v-if="nav.search" @viewprofile="viewprofile"> </search>
        <notification v-if="nav.notification" @viewprofile="viewprofile"></notification>
        <messages v-if="nav.messages" @viewprofile="viewprofile" @payment="navigate('plan')"></messages>
        <planupgrade v-if="nav.plan" ></planupgrade>
        <meet @viewprofile="viewprofile" v-if="nav.meet"></meet>
        <membership v-if="nav.membership" ></membership>
        <footer class="footer " style="   position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;

      text-align: center;">

            <div class="">

                <div class="row ">
                    <div class="col-md-6 col-lg-5">

                        <p class="copyright" style="margin-top: 13px;
color: white; padding: 0 10px 0 10px"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;2020 All rights reserved | Dr Love Match© 2021
                            <i class="fa fa-heart" aria-hidden="true"></i>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-md-6 col-lg-3 socailLink clearfix " style="padding-left: 25px;" >
                        <ul class="clearfix">

                            <li><p>Follow Us :</p></li>
                            <li><a target="_blank" href="https://www.facebook.com/pages/DoctorLoveMatch/413232242026448"><span><i class="fa fa-facebook"></i></span></a></li>
                            <li><a target="_blank" href="https://linkedin.com/in/dr-love-match-35957591"><span><i class="fa fa-linkedin"></i></span></a></li>
                            <li><a target="_blank" href="https://twitter.com/Dr_Love_Match"><span><i class="fa fa-twitter"></i></span></a></li>
                            <li><a target="_blank" href="https://instagram.com/p/BH0LYKqgH4r/"><span><i class="fa fa-instagram"></i></span></a></li>
                            <li><a target="_blank" href="https://www.youtube.com/user/MrDilash"><span><i class="fa fa-youtube"></i></span></a></li>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-4 text-md-right">
                        <p class=" list-unstyled" style="margin-top: 10px">

                            <a class="mr-md-3"  style="margin-top: 13px;
color: white; padding: 0 10px 0 10px" href="/privacy">Privacy Policy</a>

                        </p>
                </div>
            </div>
        </div>
        </footer>
    </section>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'
import Profile from "../profile";
import Navigation from "../navigation"
import Single from './../../../store/modules/Users/single.js';

import Home from '../home'
import personality from "../personality_matches";
import compatibility from "../compatibility";
import search from "../search";
import ProfileShow from  "../profile_show"
import Notification from "../notification";
import Messages from "../messages"
import Planupgrade from "../planupgrade"
import Meet from "../meet";
import Membership from "../membership"


export default {
    data() {
        return {
            // Code...
            data:[],
            data_show:[],
            match_data:'',
            nav:{
                home:true,
                profile: false,
                whoviewedme: false,
                meet: false,
                matchmaker: false,
                search: false,
                personality_match: false,
                compatibility: false,
                profile_show:false,
                notification:false,
                meet:false,
                user_id:'',
                messages:false,
                plan:false,
                membership:false

            }
        }
    },
    computed: {
        ...mapGetters('UsersSingle', ['item','itemshow', 'loading', 'rolesAll', 'countriesAll', 'statesAll', 'citiesAll']),

    },
    created() {

        this.current_user=document.querySelector("meta[name='user-role']").getAttribute('content');
        if(document.querySelector("meta[name='user-role']").getAttribute('content')==='Administrator (can create other users)'){
            this.$router.push({name: 'dashboard.index2'})
        }
        var log_id=document.querySelector("meta[name='user-id']").getAttribute('content');
        this.user_id=log_id;
        axios.get('/api/v1/users/'+log_id)
            .then(response => {
                console.log(response.data.data);
                this.data=response.data.data;
                this.setItem(response.data.data)
                this.data.pictures=_.cloneDeep(JSON.parse(this.data.pictures))
                this.nav.profile=true;

            });

    },
    destroyed() {

    },
    methods: {
        ...mapActions('UsersSingle', ['fetchData', 'updateData', 'resetState','setItem','setItemshow', 'setName', 'setEmail', 'setPassword', 'setRole', 'setMatchstatus', 'setCustomer_id', 'setStatus', 'setCancelmembership', 'setUnsubscribeemail', 'setUsersubscribe', 'setShareedit', 'setSharetime', 'setBlock', 'setSendemail', 'setLastvisitdate', 'setActivation', 'setParams', 'setLastresettime', 'setResetcount', 'setOtpkey', 'setOtep', 'setRequirereset', 'setLookingfor', 'setEthnicity', 'setCountry', 'setState', 'setCity', 'setGender', 'setPersonality', 'setAboutme', 'setDob', 'setDevicetype', 'setDevicetoken', 'setFacebookid', 'setGmailid', 'setNtcount']),
      navigate(item){
          this.nav.home= false,
               this.nav.profile= false,
               this.nav.whoviewedme= false,
               this.nav.meet= false,
               this.nav.matchmaker= false,
               this.nav.search= false,
               this.nav.personality_match= false,
               this.nav.compatibility= false,
               this.nav.profile_show= false,
               this.nav.notification= false,
               this.nav.meet= false,
              this.nav.messages= false,
              this.nav.plan=false,
              this.nav.membership=false

               this.nav[item]=true;
      },
        viewprofile(id){
        // alert(id)

            axios.get('/api/v1/users/'+id)
                .then(response => {

                    let form = new FormData();
                    form.set('primary', this.user_id);
                    form.set('secondary', response.data.data.id);

                    axios.post('/api/match_request', form)
                        .then(res => {

                            this.match_data=res.data;

                        });
                    console.log(response.data.data);
                    this.data_show=response.data.data;
                    this.setItemshow(response.data.data)
                 //   this.data_show.pictures=_.cloneDeep(JSON.parse(this.data_show.pictures))
                    let form2 = new FormData();
                    form2.set('sender', this.user_id);
                    form2.set('receiver', response.data.data.id);

                    axios.post('/api/viewed_profile', form2)
                    this.navigate('profile_show')

                });
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
        submitForm() {
            this.updateData()
                .then(() => {
                    // this.$router.push({ name: 'users.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        },

    },
    components: {Membership,Meet,Messages,Notification, Profile,Navigation,Home,personality,compatibility,ProfileShow,search,Planupgrade}
}
</script>



