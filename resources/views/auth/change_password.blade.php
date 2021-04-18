@extends('layouts.app')

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
	<h3 class="page-title">@lang('quickadmin.qa_change_password')</h3>

	@if(session('success'))
		<!-- If password successfully show message -->
		<div class="row">
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		</div>
	@else
		{!! Form::open(['method' => 'PATCH', 'route' => ['auth.change_password']]) !!}
		<!-- If no success message in flash session show change password form  -->
		<div class="panel panel-default">
			<div class="panel-heading">
				@lang('quickadmin.qa_edit')
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('current_password', trans('quickadmin.qa_current_password'), ['class' => 'control-label']) !!}
						{!! Form::password('current_password', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('current_password'))
							<p class="help-block">
								{{ $errors->first('current_password') }}
							</p>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('new_password', trans('quickadmin.qa_new_password'), ['class' => 'control-label']) !!}
						{!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password'))
							<p class="help-block">
								{{ $errors->first('new_password') }}
							</p>
						@endif
					</div>
				</div>

				<div class="row">
					<div class="col-xs-12 form-group">
						{!! Form::label('new_password_confirmation', trans('quickadmin.qa_password_confirm'), ['class' => 'control-label']) !!}
						{!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => '']) !!}
						<p class="help-block"></p>
						@if($errors->has('new_password_confirmation'))
							<p class="help-block">
								{{ $errors->first('new_password_confirmation') }}
							</p>
						@endif
					</div>
				</div>
			</div>
		</div>

		{!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
	@endif
@stop
    </body>
@endsection

