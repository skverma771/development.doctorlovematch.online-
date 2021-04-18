@extends('layouts.auth')

@section('content')
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
<style>
    .col-md-1 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 8.33333%;
      flex: 0 0 8.33333%;
      max-width: 8.33333%; }
    .col-md-2 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 16.66667%;
      flex: 0 0 16.66667%;
      max-width: 16.66667%; }
    .col-md-3 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%; }
    .col-md-4 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 33.33333%;
      flex: 0 0 33.33333%;
      max-width: 33.33333%; }
    .col-md-5 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 41.66667%;
      flex: 0 0 41.66667%;
      max-width: 41.66667%; }
    .col-md-6 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%; }
    .col-md-7 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 58.33333%;
      flex: 0 0 58.33333%;
      max-width: 58.33333%; }
    .col-md-8 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 66.66667%;
      flex: 0 0 66.66667%;
      max-width: 66.66667%; }
    .col-md-9 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%; }
    .col-md-10 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 83.33333%;
      flex: 0 0 83.33333%;
      max-width: 83.33333%; }
    .col-md-11 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 91.66667%;
      flex: 0 0 91.66667%;
      max-width: 91.66667%; }
    .col-md-12 {
      -webkit-box-flex: 0;
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%; }
</style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="margin-bottom: 50px;position: relative">
        <div class="container">
            <a class="navbar-brand" href="/">

                <img src="{{asset("landing/images/logo.png")}}" alt="logo"></img>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>


        </div>

    </nav>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default" style="border-radius: 0px;
border: 5px solid #dbdbdb;">
                <div class="panel-heading" style="color: #ca2532;
font-size: 19px;
font-weight: 600;"> Forgot Password/Username ?</div>
                <div class="panel-body">

                    <p>If you forgot your password, please enter your email address below and we'll email you once you press submit.</p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('password/email') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn2 btn-primary"
                                        style="margin-right: 15px;">
                                    Reset password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
