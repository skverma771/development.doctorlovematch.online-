<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>


@if(Auth::user()->role[0]->title!=='Subscriber')
    <body class="hold-transition skin-blue sidebar-mini">
@endif
@if(Auth::user()->role[0]->title=='Subscriber')
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    @endif


    <div id="app">
    <div id="wrapper">

    @include('partials.topbar')
    @include('partials.sidebar')

    <event-hub></event-hub>
    <router-view></router-view>

    </div>
</div>

{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}

@include('partials.javascripts')
</body>
</html>
