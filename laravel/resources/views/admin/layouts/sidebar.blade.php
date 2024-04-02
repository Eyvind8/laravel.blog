<!-- resources/views/includes/sidebar.blade.php -->
<div class="col-sm-2 col-xs-6 sidebar pl-0">
    <div class="inner-sidebar mr-3">
        <!--Image Avatar-->
        <div class="avatar text-center">
            <img src="/img/admin/profile.jpg" alt="" class="rounded-circle" />
            <p><strong>Agnar</strong></p>
            <span class="text-primary small"><strong>Owner / Dev developer</strong></span>
        </div>
        <!--Image Avatar-->

        <!--Sidebar Navigation Menu-->
        <div class="sidebar-menu-container">
            <ul class="sidebar-menu mt-4 mb-4">
{{--                <li class="parent">--}}
{{--                    <a href="#" onclick="toggle_menu('dashboard'); return false" class="">--}}
{{--                        <i class="fa fa-dashboard mr-3"> </i>--}}
{{--                        <span class="none">Dashboard <i class="fa fa-angle-down pull-right align-bottom"></i></span>--}}
{{--                    </a>--}}
{{--                    <ul class="children" id="dashboard">--}}
{{--                        <li class="child"><a href="index.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Default</a></li>--}}
{{--                        <li class="child"><a href="index2.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Analytics</a></li>--}}
{{--                        <li class="child"><a href="index3.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Ecommerce</a></li>--}}
{{--                        <li class="child"><a href="index4.html" class="ml-4"><i class="fa fa-angle-right mr-2"></i> Cryptocurrency</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="parent">
                    <a href="/admin/items" class=""><i class="fa fa-pencil-square mr-3"> </i>
                        <span class="none">Items </span>
                    </a>
                    <a href="/admin/items-parse" class=""><i class="fa fa-pencil-square mr-3"> </i>
                        <span class="none">Items parse</span>
                    </a>
                    <a href="/admin/tags" class=""><i class="fa fa-pencil-square mr-3"> </i>
                        <span class="none">Tags </span>
                    </a>
                </li>
            </ul>
        </div>
        <!--Sidebar Naigation Menu-->
    </div>
</div>
