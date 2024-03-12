<!DOCTYPE html>
<html lang="uk">
<head>
    @include('layouts.head')
</head>

<body>
<!--header start-->
<header class="head-section">
    @include('layouts.header')
</header>
<!--header end-->

<!--breadcrumbs start-->
<div class="breadcrumbs">
    @include('includes.breadcrumbs')
</div>
<!--breadcrumbs end-->

<!--container start-->
<div class="container">
    <div class="row">
        @yield('content')
        @include('layouts.right-column')
    </div>
</div>
<!--container end-->

<!--footer -->
@include('layouts.footer')
</body>
</html>
