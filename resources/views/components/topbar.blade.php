<!DOCTYPE html>
<html lang="en">
<head>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ url('adminlte/css/master.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/css/media.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/css/bootstrap.css') }}">

</head>
<body>

<header id="header" class="navbar-fixed-top padBtm0"> <!--  -->
    <div class="container padContainer">
        <div class="col-md-4 col-sm-6 col-xs-12 logo-column">
            <div class="logo">
                <a href="/"><img src="{{asset("landing/images/logo.png")}}" alt="doctor lovematch"></a>
            </div>
        </div>


        <!--Google adsence header-->
        <style type="text/css">
            @media only screen and (max-width: 767px){
                .pad-0-small{padding-left: 0px;padding-right: 0px;margin-right: -15px;}
            }
        </style>
        <!-- adsbygoogle -->
        <!--<div class="col-md-4 col-sm-6 col-xs-12 text-center pad-0-small hide-adv">
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


        <div class="col-md-8 col-sm-12 col-xs-12 pull-right login loginBG clearfix">
            <div class="pull-sm-left Itunes-btn">
                <a href="https://itunes.apple.com/us/app/drlovematch/id1211166400?mt=8" target="_blank">
                    <img src="{{asset("landing/images/Itunes.png")}}">

                </a>

            </div>
            @guest
                <div class="pull-sm-right">
                    <div class="login-text-wrapper mr-25" style="margin-left: 5px">
                        <button type="button" onclick="document.getElementById('id01').style.display='block'" class="btn btn-default bluebtn loginbtn">LOGIN</button>
                        <p>Are you an existing user?</p>
                    </div>
                    <div class="login-text-wrapper">
                        <button type="button" onclick="document.getElementById('id02').style.display='block'" class="btn btn-default bluebtn redistrusr">REGISTER</button>
                        <p class="left-pos">Are you a new user?</p>
                    </div>
                </div>
            @endguest
            @auth
                <div class="pull-sm-right">
                    <div class="login-text-wrapper mr-25">
                        <a type="button" href="/dashboard" class="btn btn-default bluebtn">Profile</a>
                        <p>&nbsp; </p>
                    </div>
                    <div class="login-text-wrapper">
                        <a type="button" href="/logoutnow"  class="btn btn-default bluebtn">Logout</a>
                        <p>&nbsp; </p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
    <!-- Login Modal -->
    <div id="id01" class="modal">

        <form class="modal-content animate login_model logsin"  action="{{ url('login') }}" method="post" >
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1 class="modal-title">Login</h1>

            <div class="">


                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email"><b>Email</b></label>
                            <input placeholder="Enter Email or name" class="form-control" name="email"  value="{{ old('email') }}" >
                        </div>
                        <div class="col-md-6">
                            <label for="password"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="password" class="form-control"  >
                            <br>
                            <span class="psw">Forgot <a href="#" onclick="document.getElementById('id03').style.display='block';
document.getElementById('id01').style.display='none'">password?</a></span>
                        </div>

                        <br>
                        <br>
                        <div class="col-md-4">
                            <button type="submit" class="button2">Log in</button>
                        </div>

                    </div>
                </div>







            </div>


            {{--        <div class="container" style="background-color:#f1f1f1">--}}
            {{--            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn" style="background-color: #ca2633">Cancel</button>--}}
            {{--            --}}
            {{--        </div>--}}
        </form>
    </div>


    <div id="id03" class="modal">

        <form class="modal-content animate login_model forgot_pswd"  action="{{ url('password/email') }}" method="post" >
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
            <h1 class="modal-title">Forgot Password ?</h1>
            <p style="padding: 10px;">If you forgot your password, please enter your email address below and we'll email you once you press submit.</p>
            <div class="">


                <input type="hidden"
                       name="_token"
                       value="{{ csrf_token() }}">
                <div class="col-md-12 mb-3">
                    <div class="row">

                        <div class="col-md-6">

                            <label for="email"><b>Email</b></label>
                            <input type="hidden"
                                   name="_token"
                                   value="{{ csrf_token() }}">
                            <input id="forgetemail" type="email"
                                   class="form-control"
                                   name="email"
                                   value="{{ old('email') }}">
                        </div>
                        <div class="col-md-6">
                            <button style="margin-top:30px;" type="submit" class="button2">Submit</button>
                        </div>

                    </div>
                </div>







            </div>



        </form>
    </div>

{{--    <div id="id04" class="modal">--}}


{{--        <div class="row mt-4">--}}
{{--            <div class="col-md-8 col-md-offset-2">--}}
{{--                <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>--}}
{{--                <div class="panel panel-default" style="border-radius: 0px;--}}
{{--border: 5px solid #dbdbdb;">--}}
{{--                    <div class="panel-heading" style="color: #ca2532;--}}
{{--font-size: 19px;--}}
{{--font-weight: 600;"> Forgot Password/Username ?</div>--}}
{{--                    <div class="panel-body">--}}

{{--                        <p>If you forgot your password, please enter your email address below and we'll email you once you press submit.</p>--}}
{{--                        @if (session('status'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{ session('status') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}


{{--                        <form class="form-horizontal"--}}
{{--                              role="form"--}}
{{--                              method="POST"--}}
{{--                              action="{{ url('password/email') }}">--}}
{{--                            <input type="hidden"--}}
{{--                                   name="_token"--}}
{{--                                   value="{{ csrf_token() }}">--}}

{{--                            <div class="form-group">--}}
{{--                                <label class="col-md-4 control-label">Email</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input  type="email"--}}
{{--                                           class="form-control"--}}
{{--                                           name="email"--}}
{{--                                           value="{{ old('email') }}">--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group">--}}
{{--                                <div class="col-md-6 col-md-offset-4">--}}
{{--                                    <button type="submit"--}}
{{--                                            class="btn btn2 btn-primary"--}}
{{--                                            style="margin-right: 15px;">--}}
{{--                                        Reset password--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}


</header>
</body>
</html>



