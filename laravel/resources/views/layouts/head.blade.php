<!-- Bootstrap core CSS -->
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/bootstrap.min.css') : asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/theme.css') : asset('css/theme.css') }}" rel="stylesheet">
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/bootstrap-reset.css') : asset('css/bootstrap-reset.css') }}" rel="stylesheet">
<!--external css-->
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('assets/font-awesome/css/font-awesome.css') : asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/flexslider.css') : asset('css/flexslider.css') }}"/>
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('assets/bxslider/jquery.bxslider.css') : asset('assets/bxslider/jquery.bxslider.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/animate.css') : asset('css/animate.css') }}">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<!-- Custom styles for this template -->
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/style.css') : asset('css/style.css') }}" rel="stylesheet">
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/style-responsive.css') : asset('css/style-responsive.css') }}" rel="stylesheet"/>
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/app.css') : asset('css/app.css') }}" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="{{ env('APP_ENV') === 'prod' ? secure_asset('js/html5shiv.js') : asset('js/html5shiv.js') }}"></script>
<script src="{{ env('APP_ENV') === 'prod' ? secure_asset('js/respond.min.js') : asset('js/respond.min.js') }}"></script>
<![endif]-->

<meta name="csrf-token" content="{{ csrf_token() }}">
