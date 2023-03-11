<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>

<body>
<!--header start-->
<header class="head-section">
    @include('includes.header')
</header>
<!--header end-->

<!--breadcrumbs start-->
<div class="breadcrumbs">
    @include('includes.breadcrumbs')
</div>
<!--breadcrumbs end-->

<!--container start-->
<div class="container">
    @yield('content')
</div>
<!--container end-->

<!--footer -->
@include('includes.footer')
</body>
</html>
