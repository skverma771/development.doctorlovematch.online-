<template>

  <div>


      <div class=" col-md-12 tab-dismiss">
          <div class="membarhead memberhead-color clearfix">
              <h6 class="margin-0">Viewed Members</h6>
              <ol class="breadcrumb clearfix">
                  <li class="margin0 hidden-groups"><a href="/component/innerpage/?view=seekingmembers">Seeking Members</a></li>
                  <li class="hidden-groups"><a href="/component/innerpage/?view=allmembers">All Members</a></li>
                  <li><a href="/component/innerpage/?view=onlinemembers">Online Members</a></li>
                  <li><a href="/component/innerpage/?view=viewedmembers" class="active">Who Viewed Me</a></li>
              </ol>
          </div>

      </div>


  </div>
</template>


<script>
    import { mapGetters, mapActions } from 'vuex'
    import uploadfile from '../mixins/uploadfile'

    export default {
        data() {
            return{}
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
        watch: {},
        methods: {},
        props: ['data_item']
    }
</script>


<style scoped>
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
