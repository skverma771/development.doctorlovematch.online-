@if(Auth::user()->role[0]->title!=='Subscriber')
<header class="main-header"  >
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo"
       style="font-size: 16px;">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">
            Dr.Love Match</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">
           Dr.Love Match</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

    </nav>
</header>
@endif

