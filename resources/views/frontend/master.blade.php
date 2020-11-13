<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="{{url('/')}}/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('/')}}/frontend/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/')}}/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{url('/')}}/frontend/css/price-range.css" rel="stylesheet">
    <link href="{{url('/')}}/frontend/css/animate.css" rel="stylesheet">
	<link href="{{url('/')}}/frontend/css/main.css" rel="stylesheet">
	<link href="{{url('/')}}/frontend/css/responsive.css" rel="stylesheet">
	<link href="{{url('/')}}/frontend/css/responsive.css" rel="stylesheet">
	<link href="{{url('/')}}/css/animated.css" rel="stylesheet">
	<link href="{{url('/')}}/css/owl.carousel.min.css" rel="stylesheet">
	<link href="{{url('/')}}/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="{{url('/')}}/css/style.css" rel="stylesheet">
	<link href="{{url('/')}}/css/payment.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('/')}}/frontend/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('/')}}/frontend/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('/')}}/frontend/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{url('/')}}/frontend/images/ico/apple-touch-icon-57-precomposed.png">

</head><!--/head-->

<body>
    {{-- header --}}
    @include('frontend.partials.header')
	{{-- header ./ --}}



    {{-- main section --}}
    @yield('content')
	{{-- main section ./ --}}

    {{-- footer --}}
    @include('frontend.partials.footer')
	{{-- footer ./ --}}



    <script src="{{url('/')}}/frontend/js/jquery.js"></script>
	<script src="{{url('/')}}/frontend/js/bootstrap.min.js"></script>
	<script src="{{url('/')}}/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="{{url('/')}}/frontend/js/price-range.js"></script>
    <script src="{{url('/')}}/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="{{url('/')}}/frontend/js/main.js"></script>
    <script src="{{url('/')}}/js/owl.carousel.min.js"></script>
    <script src="{{url('/')}}/js/wow.min.js"></script>
    <script src="{{url('/')}}/js/script.js"></script>
</body>
</html>
