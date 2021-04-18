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
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_reset_password')</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @lang('quickadmin.qa_reset_password_woops')
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
                          action="{{ url('password/reset') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('quickadmin.qa_email')</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('quickadmin.qa_password')</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">@lang('quickadmin.qa_confirm_password')</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn2 btn-primary"
                                        style="margin-right: 15px;">
                                    @lang('quickadmin.qa_reset_password')
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
