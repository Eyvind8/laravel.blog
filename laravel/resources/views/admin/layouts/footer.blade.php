<!-- resources/views/includes/footer.blade.php -->
<div class="row mt-5 mb-4 footer">
{{--    <div class="col-sm-8">--}}
{{--        <span>&copy; All rights reserved 2019 designed by <a class="text-info" href="#">A-Fusion</a></span>--}}
{{--    </div>--}}
{{--    <div class="col-sm-4 text-right">--}}
{{--        <a href="#" class="ml-2">Contact Us</a>--}}
{{--        <a href="#" class="ml-2">Support</a>--}}
{{--    </div>--}}
</div>
<!-- Page JavaScript Files-->
<script src="/js/admin/jquery.min.js"></script>
<script src="/js/admin/jquery-1.12.4.min.js"></script>
<!--Popper JS-->
<script src="/js/admin/popper.min.js"></script>
<!--Bootstrap-->
<script src="/js/admin/bootstrap.min.js"></script>
<!--Sweet alert JS-->
<script src="/js/admin/sweetalert.js"></script>
<!--Progressbar JS-->
<script src="/js/admin/progressbar.min.js"></script>
<!--Charts-->
<!--Canvas JS-->
<script src="/js/admin/charts/canvas.min.js"></script>
<!--Bootstrap Calendar JS-->
<script src="/js/admin/calendar/bootstrap_calendar.js"></script>
<script src="/js/admin/calendar/demo.js"></script>
<!--Bootstrap Calendar-->
<!--JsGrid table-->
<script src="/js/admin/jsgrid.min.js"></script>
<script src="/js/admin/jsgrid-demo.js"></script>
<script src="/js/admin/alertify.min.js"></script>
<script src="/js/admin/bootstrap-tagsinput.min.js"></script>

<!--Custom Js Script-->
<script src="/js/admin/custom.js"></script>
<!--Custom Js Script-->

<?php

$currentUrl = request()->url();
$lastSegment = basename(parse_url($currentUrl, PHP_URL_PATH));
$scriptPath = public_path("js/admin/panel/{$lastSegment}.js");

if (file_exists($scriptPath)) {
    echo "<script src='js/admin/panel/{$lastSegment}.js'></script>";
}

