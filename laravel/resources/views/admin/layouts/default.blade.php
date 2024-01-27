<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.layouts.head')
</head>
<body>
<div class="container-fluid">
    @include('admin.layouts.header')
    <div class="row main-content">
        @include('admin.layouts.sidebar')
        <div class="col-sm-10 col-xs-12 content pt-3 pl-0">
            @yield('content')
            @include('admin.layouts.footer')
        </div>
    </div>
</div>
</body>
</html>
