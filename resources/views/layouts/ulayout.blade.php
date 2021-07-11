<!DOCTYPE HTML>
<!--
	Introspect by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>   @yield('title')</title>

    <link rel="stylesheet" href="assets/css/main.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"/>
    <link rel="stylesheet" href="{{ asset('../assets/css/bootstrap.min.css') }}"/>
</head>

<body >

<!-- Header -->
<header id="header">
    <div class="inner">
        <a href="/mainpage" class="logo">Hotel laravel</a>
        <nav id="nav">
            <a href="/mainpage">Home</a>
            <a href="/rez-forma">Rezervacije</a>
            <a href="/user-edit">Usluge</a>
            <a href="/user-mini-edit">minibar</a>
            <a href="{{route('profile',Auth::user()->id)}}">
                {{ __(' Placanje') }}
            </a>

            <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
<a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
</a>
            <a  href="#" role="button" style="float: right" >
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

        </nav>
    </div>
</header>
<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>


<div class="content">
    @yield('content')
</div>

<!-- Three -->


<!-- Footer -->


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="{{asset('assets/js/jquery-3.5.1.js')}}"></script>
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>



<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
@yield('scripts')
</body>
</html>
