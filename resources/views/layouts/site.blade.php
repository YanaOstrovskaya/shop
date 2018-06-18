<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Florist</title>
<link rel="icon" href="{{ asset('assets/favicon.png')}}" type="image/png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/font-awesome.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/slick/slick.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/slick/slick-theme.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css"> 
<link href="{{ asset('assets/css/jquery-ui.theme.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css"> 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->

</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  @yield('header')
</header>
<!--Header_section--> 

<!--Hero_Section-->
@yield('content')

@yield('contact')

<script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nav.js')}}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/wow.js')}}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/script.js')}}"></script>

</body>
</html>