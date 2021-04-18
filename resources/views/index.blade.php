<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dr. Love Match</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{--    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">--}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{--      <link rel="stylesheet" href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ url('landing/css/animate.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/jquery.timepicker.css') }}">

    <link rel="stylesheet" href="{{ url('landing/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ url('landing/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/css/index_custom.css') }}">
{{--    <link rel="stylesheet" href="{{ url('adminlte/css/master.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ url('adminlte/css/media.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ url('adminlte/css/bootstrap.css') }}">--}}

    <style >
        .owl-carousel .owl-dots.disabled, .owl-carousel .owl-nav.disabled {
            display: block !important;
        }
        .owl-prev p{
            display: block !important;
        }

        .fa-chevron-left , .fa-chevron-right{
            margin-top: -10px !important;
        }
        .owl-next p{
            display: block !important;
        }
    </style>
</head>
<body>




@component('components.topbar')@endcomponent


<!-- END nav -->
@if (count($errors) > 0)
    <div class="alert alert-danger alert-message col-md-4 offset-4">
        <strong>@lang('quickadmin.qa_whoops')</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
        <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



 <!-- Registration Modal -->
    <div class="alert-message col-md-4 offset-4"> </div>
<div id="id02" class="modal">
{{--    <div class="alert-message col-md-4 offset-4"> </div>--}}
    {{--    <form class="modal-content animate"  style="width: 80%"  method="POST" action="{{ url('/api/create_account') }}">--}}


    <div class="modal-content animate login_model"  style="width: 40%;">

        <span onclick="document.getElementById('id02').style.display='none'"  style="top: 2px;right: 10px;" class="close" title="Close Modal">&times;</span>
        <h1  class="modal-title">Join, Its Free <span>and find your Match today</span></h1>
        <div class="register_modal" style="height: 450px;overflow-y: scroll;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4"><label for="uname"><b>Username</b></label></div>
                            <div class="col-lg-8">
                                <input type="text" placeholder="Enter Username" name="uname" id="uname" class="form-control" required>
                            </div>

                        </div>
                    </div>
					  <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4"><label for="uname"><b>Name</b></label></div>
                            <div class="col-lg-8">
                                <input type="text" placeholder="Enter name" name="name" id="name" class="form-control" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4"><label for="uname"><b>Email</b></label></div>
                            <div class="col-lg-8">
                                <input type="email" placeholder="Enter Email" name="email" id="email" class="form-control" required>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4"><label for="uname"><b>Confirm Email</b></label></div>
                            <div class="col-lg-8">
                                <input type="email" placeholder="Confirm Email" name="con_email" id="con_email" class="form-control" required>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4"><label for="psw"><b>Password</b></label></div>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Confirm Password</b></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="password" class="form-control" placeholder="Confirm Password" name="con_psw" id="con_psw" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Date of Birth</b></label>
                            </div>
                            <div class="col-lg-8">
                                <input type="date" placeholder="DD/MM/YYYY" class="form-control" name="dob" id="dob" required>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>I am a</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="gender" class="form-control" id="gender" aria-invalid="false">
                                    <option value="0">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Looking for a</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="lookingfor" class="form-control " id="looking_for">
                                    <option value="0">Select Option</option>
                                    <option value="Female">Woman</option>
                                    <option value="Male">Man</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Ethnicity</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="ethnicity" class="form-control " id="ethnicity">
                                    <option value="0">Select Ethnicity</option>
                                    <option value="1">Caucasian</option>
                                    <option value="2">Black</option>
                                    <option value="3">Hispanic</option>
                                    <option value="4">Indian</option>
                                    <option value="5">Middle Eastern</option>
                                    <option value="6">Asian</option>
                                    <option value="7">Mixed Race</option>
                                    <option value="8">Native American</option>
                                    <option value="9">South East Asian</option>
                                    <option value="10">Other Ethnicity</option>
                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Country</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="country"  class="form-control " id="country"  onchange="fetch_state()">>
                                    <option value="NAN">Select Country</option>
                                    @foreach ($country as $con)
                                        <option value="{{$con['id']}}">{{$con['name']}}</option>
                                    @endforeach


                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>State</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="state" class="form-control " id="state" onchange="fetch_cities()">
                                    <option value="NAN">Select State</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>City</b></label>
                            </div>
                            <div class="col-lg-8">
                                <select name="cities" class="form-control " id="cities">
                                    <option value="NAN">Select City</option>

                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-12 mt_10">
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="psw"><b>Captcha</b></label>
                            </div>
                            <div class="col-lg-6 captcha">
                                <span>{!! captcha_img() !!}</span>

                            </div>
                            <div class="col-lg-2"><i id="refresh" title="Refresh" class="fa fa-refresh" aria-hidden="true"></i>
                                </div>
                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-8 ">
                                <input type="text" id="captcha" class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}" placeholder="Enter Captcha" name ="captcha" required>

                            </div>

                        @if ($errors->has('captcha'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                </div>

            </div>


            {!! csrf_field() !!}
            <div class="col-md-12 mt-3" >
                <div class="row">
                    <div class="col-md-6 ">
                        <button type="submit" class="button2"  onclick="register_user()">Register</button>
                    </div>
                    <div class="col-md-6" style="">
                        <p><label>By clicking Register I agree to the
                                <a  href="/privacy">Terms and Conditions and Privacy Policy</a>.</label></p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    {{--    </form>--}}
</div>

<section class="slider" title="dream partner" style="background: url('{{asset("landing/images/Cover_Photo.jpg")}}') center top;min-height: 500px;background-size: cover;"></section>
<section class="join">
    <div class="container">
        <hgroup class="text-center">
            <h1><span>Why Join</span> Dr Love Match</h1>
            <h2>We are One Hundred percent Genuine Matchmaking site. Our focus is to find your best matches without any restrictions. We will bring your Matches to your fingertips as long as you participate with all Compatibilities and Personality Matches. </h2>
        </hgroup>
    </div>
</section>
<section class="aboutus">
    <div class="container">
        <div class="col-md-6">
            <h3>Our Features</h3>
            <ul>
                <li><p><span>Join Dr Love Match </span> to maximize your best potential matches.</p></li>
                <li><p><span>Answer Dr Love Match Compatibility Questions to find your best matches.</span></p></li>
                <li><p>Answer all the <span>"Personality Match Questions"</span> to find the best personality you prefer to start a relationship.</p></li>
            </ul>
        </div>

        <div class="col-md-6">
            <img src="{{asset("landing/images/Our_Features.jpg")}}" alt="doctor lovematch" class="our-features">
        </div>
    </div>
</section>
<section class="clearfix fetureBLock">
    <div class="container">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <h4>Join for free</h4>
            <figure><img src="{{asset("landing/images/image1.jpg")}}" alt="doctor lovematch" class="img-responsive"></figure>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <h4>Find Matches for Anyone</h4>
            <figure><img src="{{asset("landing/images/image2.jpg")}}" alt="doctor lovematch" class="img-responsive"></figure>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <h4>Genuine Matches</h4>
            <figure><img src="{{asset("landing/images/image3.jpg")}}" alt="doctor lovematch" class="img-responsive"></figure>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <h4>Free Access for Millions</h4>
            <figure><img src="{{asset("landing/images/image4.jpg")}}" alt="doctor lovematch" class="img-responsive"></figure>
        </div>
    </div>
</section>
{{--<div class="hero-wrap js-fullheight">--}}
{{--    <div class="home-slider owl-carousel js-fullheight">--}}
{{--        <div class="slider_image" style="background: url('{{asset("landing/images/Cover_Photo.jpg")}}')">--}}
{{--            <div class="overlay"></div>--}}
{{--            <div class="container">--}}
{{--                <div class=" mt-5 row no-gutters slider-text align-items-center">--}}
{{--                    <div class="col-md-7 ftco-animate" style="margin-top: 150px;">--}}
{{--                        <div class="text w-100">--}}
{{--                            <h3 class="" style="color: #ca2532">Welcome to Dr.Love Match</h3>--}}
{{--                            <h1 class="mb-4 color-white">Find your love match today</h1>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--    </div>--}}
{{--</div>--}}

{{--<section class="ftco-section ftco-services" style="padding-bottom: unset;">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-3 d-flex services align-self-stretch px-4 ftco-animate">--}}
{{--                <div class="d-block services-wrap text-center">--}}
{{--                    <div class="img" style="background-image: url('{{asset("landing/images/image1.jpg")}}')"></div>--}}
{{--                    <div class="media-body p-2 mt-3">--}}
{{--                        <h3 class="heading">Join for free</h3>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 d-flex services align-self-stretch px-4 ftco-animate">--}}
{{--                <div class="d-block services-wrap text-center">--}}
{{--                    <div class="img" style="background-image: url('{{asset("landing/images/image2.jpg")}}')"></div>--}}
{{--                    <div class="media-body p-2 mt-3">--}}
{{--                        <h3 class="heading">Find Matches for Anyone</h3>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 d-flex services align-self-stretch px-4 ftco-animate">--}}
{{--                <div class="d-block services-wrap text-center">--}}
{{--                    <div class="img" style="background-image: url('{{asset("landing/images/image3.jpg")}}')"></div>--}}
{{--                    <div class="media-body p-2 mt-3">--}}
{{--                        <h3 class="heading">Genuine Matches</h3>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-3 d-flex services align-self-stretch px-4 ftco-animate">--}}
{{--                <div class="d-block services-wrap text-center">--}}
{{--                    <div class="img" style="background-image: url('{{asset("landing/images/image4.jpg")}}')"></div>--}}
{{--                    <div class="media-body p-2 mt-3">--}}
{{--                        <h3 class="heading">Free Access for Millions</h3>--}}
{{--                        --}}{{--                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>--}}
{{--                        --}}{{--                <p><a href="#" class="btn btn-primary btn-outline-primary">Read more</a></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section class="ftco-section ftco-no-pt ftco-no-pb bg-light mb-5" >--}}
{{--    <div class="container">--}}
{{--        <div class="row no-gutters">--}}
{{--            <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url('{{asset("landing/images/Our_Features.jpg")}}')">--}}
{{--            </div>--}}
{{--            <div class="col-md-7 wrap-about ftco-animate">--}}
{{--                <div class="heading-section ">--}}
{{--                    <div class="pl-md-5 join" >--}}
{{--                        <h1><span style="color: black ;font-family: 'Georgia'">Why Join</span> Dr Love Match</h1>--}}

{{--                        <p class=" mb-2" style="font-size: 18px">We are One Hundred percent Genuine Matchmaking site. Our focus is to find your best matches without any restrictions. We will bring your Matches to your fingertips as long as you participate with all Compatibilities and Personality Matches. </p>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="pl-md-5 aboutus" >--}}
{{--                    <h5>Our Features</h5>--}}
{{--                    <ul>--}}
{{--                        <li><p><span>Join Dr Love Match </span> to maximize your best potential matches.</p></li>--}}
{{--                        <li><p><span>Answer Dr Love Match Compatibility Questions to find your best matches.</span></p></li>--}}
{{--                        <li><p>Answer all the <span>"Personality Match Questions"</span> to find the best personality you prefer to start a relationship.</p></li>--}}
{{--                    </ul>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class=" ftco-no-pb bg-light addProfile">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
            <div class="pl-md-5 join" >
                <hgroup class="text-center">
                <h1><span style="color: black ;font-family: 'Georgia'">Last Added</span> Profiles</h1>
                </hgroup>
            </div>
        </div>
        <div class="row ftco-animate" style="margin-bottom: 25px">
            <div class="col-md-12">
                <div class="carousel-stories owl-carousel">

                    @foreach ($user as $ucon )


                    <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img1 user-img" style="background-image: url('{{asset(json_decode($ucon->pictures)->profile)}}')">
                            </div>
                            <div class="text pl-4">

                                <p style=" font-weight: 400; font-size: 16px;  margin-bottom: 0; color: #000000;}">{{$ucon->name}}</p>
                                <span class="position">Age: {{$ucon->ntcount}}</span><br>
                             <span style="font-size: 10px"> {{$ucon->city->name}}, {{$ucon->state->name}}, {{$ucon->country->name}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="item">--}}
{{--                        <div class="testimony-wrap d-flex">--}}
{{--                            <div class=" user-img1 user-img" style="background-image: url('{{asset("landing/images/person-3.jpg")}}')">--}}
{{--                            </div>--}}
{{--                            <div class="text pl-4">--}}

{{--                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
{{--                                <p class="name">Henry Dee</p>--}}
{{--                                <span class="position">Businesswoman</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="testimony-wrap d-flex">--}}
{{--                            <div class="user-img1 user-img" style="background-image: url('{{asset("landing/images/staff-6.jpg")}}')">--}}
{{--                            </div>--}}
{{--                            <div class="text pl-4">--}}

{{--                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
{{--                                <p class="name">Mark Huff</p>--}}
{{--                                <span class="position">Businesswoman</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="item">--}}
{{--                        <div class="testimony-wrap d-flex">--}}
{{--                            <div class="user-img1 user-img" style="background-image: url('{{asset("landing/images/bg_2.jpg")}}')">--}}
{{--                            </div>--}}
{{--                            <div class="text pl-4">--}}

{{--                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>--}}
{{--                                <p class="name">Rodel Golez</p>--}}
{{--                                <span class="position">Fitness Model</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-intro" style="background-image: url('{{asset("landing/images/image41.jpg")}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="footer-window">The best and most beautiful things in this world cannot be seen or even heard, but must be felt with the heart.</h2>

            </div>

        </div>
    </div>
</section>







<footer class="footer " style="padding: 8px 0">
    <div class="">

        <div class="row ">
            <div class="col-md-6 col-lg-5">

                <p class="copyright" style="margin-top: 13px;
color: white; padding: 0 10px 0 10px"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Dr Love Match© 2021
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

            <div class="col-md-6 col-lg-4 ">
                <p class=" list-unstyled" style="margin-top: 10px">

                    <a class="mr-md-3"  style="margin-top: 13px;
color: white; padding: 0 10px 0 10px" href="/privacy">Privacy Policy</a>

                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="{{ url('landing/js/jquery.min.js') }}"></script>
<script src="{{ url('landing/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ url('landing/js/popper.min.js') }}"></script>
<script src="{{ url('landing/js/bootstrap.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ url('landing/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.stellar.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ url('landing/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ url('landing/js/jquery.timepicker.min.js') }}"></script>
<script src="{{ url('landing/js/owl.carousel.min.js') }}"></script>
<script src="{{ url('landing/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('landing/js/scrollax.min.js') }}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>--}}
{{--<script src="{{ url('landing/js/google-map.js') }}"></script>--}}
<script src="{{ url('landing/js/main.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>


<script>
    // Get the modal
    var modal1 = document.getElementById('id01');
    var modal2 = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
    //
    function fetch_state(){
        var country=document.getElementById('country').value;
        // alert(country);
        let form = new FormData();
        form.set('country', country);
        form.set('state', '');
        form.set('source', '1');
        axios.post('/api/states', form)
            .then(res => {
                // console.log(res.data)
                $("#state").empty();
                $("#cities").empty();
                var state = document.getElementById("state");
                var opt = document.createElement('option');	
                opt.value = "NAN";
                opt.innerHTML = "Select State";
                state.appendChild(opt);

                var cities = document.getElementById("cities");
                var opt2 = document.createElement('option');
                opt2.value = "NAN";
                opt2.innerHTML = "Select City";
                cities.appendChild(opt2);

                for(var j=0;j<res.data.length;j++){
                    var opt = document.createElement('option');
                    opt.value = res.data[j]['id'];
                    opt.innerHTML = res.data[j]['name'];
                    state.appendChild(opt);
                    // option.text = res.data[j]['name'];
                    // state.add(option);
                }

            })


    }
    function fetch_cities(){
        var state=document.getElementById('state').value;
        // alert(state);
        let form = new FormData();
        form.set('state', state);
        form.set('city', '');
        form.set('source','1');
        axios.post('/api/cities', form)
            .then(res => {
                // console.log(res.data)
                $("#cities").empty();
                var cities = document.getElementById("cities");
                var opt = document.createElement('option');

                opt.value = "NAN";
                opt.innerHTML = "Select City";
                cities.appendChild(opt);

                for(var j=0;j<res.data.length;j++){
                    var opt = document.createElement('option');
                    opt.value = res.data[j]['id'];
                    opt.innerHTML = res.data[j]['name'];
                    cities.appendChild(opt);

                }

            })

    }

    function validateEmail(email){
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
    function register_user(){
		
		
        var name=document.getElementById('uname').value;
        var namee=document.getElementById('name').value;
        var email=document.getElementById('email').value;
        var con_email=document.getElementById('con_email').value;
        var psw=document.getElementById('psw').value;
        var con_psw=document.getElementById('con_psw').value;
        var dob=document.getElementById('dob').value;
        var gender=document.getElementById('gender').value;
		
        var looking_for=document.getElementById('looking_for').value;
        var ethnicity=document.getElementById('ethnicity').value;
        var country=document.getElementById('country').value;
		
        var state=document.getElementById('state').value;
        var cities=document.getElementById('cities').value;
        var captcha=document.getElementById('captcha').value;
        // var csrf=document.getElementsByName('_token').value;
		 $(".apnderror").remove();
		if(name=='')
		{     
		
			 $("#uname").after('<span class="apnderror" style="color:red">Please enter username.</span>');
			 
		}
		if(namee=='')
		{     
			 $("#name").after('<span class="apnderror" style="color:red">Please enter name.</span>');
			 
		}
		if(email=='')
		{    
			
			 $("#email").after('<span class="apnderror" style="color:red">Please enter email.</span>');
			
		}
		if(con_email=='')
		{    
			
			 $("#con_email").after('<span class="apnderror" style="color:red">Please enter confirm email.</span>');
			
		}
		
		if(email != con_email)
		{    
			
			 alert("email and confirm email does not match");
			
		}
		if(psw=='')
		{    
			
			 $("#psw").after('<span class="apnderror" style="color:red">Please enter password.</span>');
			
		}if(con_psw=='')
		{    
			
			 $("#con_psw").after('<span class="apnderror" style="color:red">Please enter confirm password.</span>');
			
		}
		if(psw != con_psw)
		{    
			
			 alert("password and confirm password  does not match");
			
		}
		
		if(dob=='')
		{    
			
			 $("#dob").after('<span class="apnderror" style="color:red">Please enter dob.</span>');
			
		}if(gender=='0')
		{    
			
			 $("#gender").after('<span class="apnderror" style="color:red">Please enter gender.</span>');
			
		}if(looking_for=='0')
		{    
			
			 $("#looking_for").after('<span class="apnderror" style="color:red">Please enter looking for.</span>');
			
		}if(ethnicity=='0')
		{    
			
			 $("#ethnicity").after('<span class="apnderror" style="color:red">Please enter ethnicity.</span>');
			
		}if(country=='NAN')
		{    
			
			 $("#country").after('<span class="apnderror" style="color:red">Please enter country.</span>');
			
		}if(state=='NAN')
		{    
			
			 $("#state").after('<span class="apnderror" style="color:red">Please enter state.</span>');
			
		}if(cities=='NAN')
		{    
			
			 $("#cities").after('<span class="apnderror" style="color:red">Please enter cities.</span>');
			
		}
		

        var valid=validateEmail(email);

        // if( captcha.length!==0 && name.length!==0 && email.length!==0 && con_email.length!==0 && psw.length!==0 && con_psw.length!==0 && dob.length!==0 ){
            // if(gender!==0 && gender!=="NAN" && looking_for!==0 && looking_for!=="NAN" && ethnicity!==0 && ethnicity!=="NAN" && country!==0
                // && country!=="NAN" && state!==0 && state!=="NAN" && cities!==0 && cities!=="NAN"  ){
if(email.length!==0 ){
if( name.length!==0  ){
	


                if(valid===true) {
                    if(email===con_email){

                        if (psw === con_psw) {
                            let form = new FormData();
                            form.set('uname', name);
                            form.set('name', namee);
                            form.set('email', email);
                            form.set('password', psw);
                            form.set('dob', dob);
                            form.set('gender', gender);
                            form.set('looking_for', looking_for);
                            form.set('ethnicity', ethnicity);
                            form.set('country', country);
                            form.set('state', state);
                            form.set('cities', cities);
                            form.set('captcha', captcha);
                            form.set('password_confirmation', con_psw);

                            axios.post('/api/create_account', form)
                                .then(res => {
                                   
                                    if(res.data=='success'){
                                        document.getElementById('id02').style.display='none';
                                        var type = 'success';
                                        var message = 'Account Created.';
                                        var alertType = 'alert-' + type
                                        var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                                        $(".alert-message").prepend(htmlAlert);
                                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                            $(this).remove();
                                        });
                                        $('#captcha').val('');
                                        $('#uname').val('');
                                        $('#email').val('');
                                        $('#con_email').val('');
                                        $('#psw').val('');
                                        $('#con_psw').val('');
                                        $('#dob').val('');
                                        $('#ethnicity').val(0)
                                        $('#looking_for').val(0)
                                        $('#gender').val(0)
                                        $('#country').val('NAN')
                                        $('#state').val('NAN')
                                        $('#cities').val('NAN')

                                    }
                                    else{
                                        var type = 'danger';
                                        var message = 'Email Id Already Exist.';
                                        var alertType = 'alert-' + type
                                        var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                                        $(".alert-message").prepend(htmlAlert);
                                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                            $(this).remove();
                                        });
                                    }
                                })
                                .catch(error => {
                                    alert(error);
                                })



                        } else {

                            var type = 'danger';
                            var message = 'Password and Confirm Password does not match.';
                            var alertType = 'alert-' + type
                            var htmlAlert = '<div class="alert ' + alertType + '"><p>&#33; ' + message + '</p></div>';
                            $(".alert-message").prepend(htmlAlert);
                            $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () {
                                $(this).remove();
                            });
                        }
                    }
                    else {

                        var type = 'danger';
                        var message = 'Email and Confirm Email does not match.';
                        var alertType = 'alert-'+ type
                        var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                        $(".alert-message").prepend(htmlAlert);
                        $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
                    }
                }
                else {

                    var type = 'danger';
                    var message = 'Please enter a valid email.';
                    var alertType = 'alert-'+ type
                    var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                    $(".alert-message").prepend(htmlAlert);
                    $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
                }
            }
            else{

                var type = 'danger';
                var message = 'Please Select All Dropdown Fields.';
                var alertType = 'alert-'+ type
                var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
                $(".alert-message").prepend(htmlAlert);
                $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });
            }


        }
        else{
            var type = 'danger';
            var message = 'Please Fill All Required Fields.';
            var alertType = 'alert-'+ type
            var htmlAlert = '<div class="alert '+ alertType +'"><p>&#33; '+ message +'</p></div>';
            $(".alert-message").prepend(htmlAlert);
            $(".alert-message .alert").first().hide().fadeIn(200).delay(2000).fadeOut(1000, function () { $(this).remove(); });

        }

    }



    $("#refresh").click(function() {
        $.ajax({
            type: 'GET',
            url: '/refresh_captcha',
            success: function(data) {
                $(".captcha span").html(data.captcha);
            }
        })
    })

</script>
<style scoped>
    .mt_10{
        margin-top: 10px !important;
    }
    .close {

        font-size: 30px !important;
    }

</style>

</body>
</html>
