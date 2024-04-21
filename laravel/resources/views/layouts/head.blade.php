<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--<link rel="shortcut icon" href="img/favicon.png">--}}


@if (strpos(request()->url(), '/id/') !== false)
        <?php
        $content = trim(preg_replace('/[^\p{L}\p{N}\s]+/u', '', str_replace(["\r", "\n"], '', $item['content'])));
        $words = explode(' ', $content);
        $unique_words = array_unique($words);
        $filtered_words = array_filter($unique_words, function ($word) {
            return mb_strlen($word, 'UTF-8') > 2;
        });
        $unique_content = implode(' ', $filtered_words);
        ?>

    <title>{{ mb_substr($content, 0, 60, 'UTF-8') }}</title>
    <meta name="description" content="{{ $unique_content }}">
    <meta name="keywords" content="жарт, {{ implode(', ', explode(' ', $unique_content)) }}">

    <meta property="og:title" content="{{ Str::ucfirst($item['content']) }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:site_name" content="Axaxa.club">
    <meta property="og:locale" content="uk_UA">
    {{--    <meta property="og:image" content="https://s.dou.ua/img/announces/portrait_cover-4.png">--}}

    {{--    <meta property="og:image:width" content="1200">--}}
    {{--    <meta property="og:image:height" content="630">--}}


    {{--  <meta property="og:description"
            content="Цього року зрівнялася кількість айтівців в продукті та аутсорсі: їх по 40%, попри війну 66% фахівців заробляють більше, ніж витрачають, а 8% встигають працювати на кількох роботах. Представляємо портрет айтівця 2023.">
      <meta name="twitter:description"
            content="Цього року зрівнялася кількість айтівців в продукті та аутсорсі: їх по 40%, попри війну 66% фахівців заробляють більше, ніж витрачають, а 8% встигають працювати на кількох роботах. Представляємо портрет айтівця 2023.">
  --}}
    {{--    <meta name="twitter:card" content="summary_large_image">--}}
    {{--    <meta name="twitter:site" content="@doucommunity">--}}
    <meta name="twitter:url" content="{{ request()->url() }}">
    <meta name="twitter:title" content="{{ Str::ucfirst($item['content']) }}">
    {{--    <meta name="twitter:image" content="https://s.dou.ua/img/announces/portrait_cover-4.png">--}}

@elseif(request()->has('tag'))
    <title>Axaxa.club - Смішні жарти та анекдоти</title>
    <meta name="description"
          content="На сайті Axaxa.club зібрані найсмішніші анекдоти, кумедні історії та жарти про різні теми, включаючи і тему '{{ $tag->name }}'. Завітайте зараз і насолоджуйтесь гарним настроєм!">
    <meta name="keywords" content="гумор, жарт, розваги, веселі історії, анекдоти">
@else
    <title>Axaxa.club - Смішні жарти та анекдоти</title>
    <meta name="description"
          content="Смішні анекдоти, веселі історії та розважальний контент на сайті axaxa.club. Забудьте про сумні будні з нашими гумористичними матеріалами.">
    <meta name="keywords" content="гумор, жарт, розваги, веселі історії, анекдоти">
    <meta name="keywords" content="жарти, анекдоти, гумор, {{ $tag->name }}, смішні історії, Axaxa.club">
@endif

<!-- Bootstrap core CSS -->
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/bootstrap.min.css') : asset('css/bootstrap.min.css') }}"
      rel="stylesheet">
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/theme.css') : asset('css/theme.css') }}" rel="stylesheet">
<link
    href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/bootstrap-reset.css') : asset('css/bootstrap-reset.css') }}"
    rel="stylesheet">
<!--external css-->
<link
    href="{{ env('APP_ENV') === 'prod' ? secure_asset('assets/font-awesome/css/font-awesome.css') : asset('assets/font-awesome/css/font-awesome.css') }}"
    rel="stylesheet"/>
<link rel="stylesheet"
      href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/flexslider.css') : asset('css/flexslider.css') }}"/>
<link
    href="{{ env('APP_ENV') === 'prod' ? secure_asset('assets/bxslider/jquery.bxslider.css') : asset('assets/bxslider/jquery.bxslider.css') }}"
    rel="stylesheet"/>
<link rel="stylesheet"
      href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/animate.css') : asset('css/animate.css') }}">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<!-- Custom styles for this template -->
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/style.css') : asset('css/style.css') }}" rel="stylesheet">
<link
    href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/style-responsive.css') : asset('css/style-responsive.css') }}"
    rel="stylesheet"/>
<link href="{{ env('APP_ENV') === 'prod' ? secure_asset('css/app.css') : asset('css/app.css') }}" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
<script src="{{ env('APP_ENV') === 'prod' ? secure_asset('js/html5shiv.js') : asset('js/html5shiv.js') }}"></script>
<script src="{{ env('APP_ENV') === 'prod' ? secure_asset('js/respond.min.js') : asset('js/respond.min.js') }}"></script>
<![endif]-->

<meta name="csrf-token" content="{{ csrf_token() }}">
