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
        <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
            @yield('content')
        </div>
        @include('admin.layouts.footer')
    </div>
</div>
</body>
</html>
