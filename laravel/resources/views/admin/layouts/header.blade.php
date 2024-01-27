<!-- resources/views/includes/header.blade.php -->
<div class="row header shadow-sm">
    <!--Logo-->
    <div class="col-sm-2 pl-0 text-center header-logo">
        <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
            <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-rocket"></i> Sleek<span class="small">admin</span></a></h3>
        </div>
    </div>
    <!--Logo-->
    <!--Header Menu-->
    <div class="col-sm-10 header-menu pt-2 pb-0">
        <div class="row">

            <!--Menu Icons-->
            <div class="col-sm-4 col-8 pl-0">
                <!--Toggle sidebar-->
                <span class="menu-icon" onclick="toggle_sidebar()">
                            <span id="sidebar-toggle-btn"></span>
                        </span>
                <!--Toggle sidebar-->
            </div>
            <!--Menu Icons-->

            <!--Search box and avatar-->
            <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                <div class="search-rounded mr-3">
{{--                    <input type="text" class="form-control search-box" placeholder="Enter keywords.." />--}}
                </div>
                <div class="mr-4">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="/img/admin/profile.jpg" alt="Adam" class="rounded-circle" width="40px" height="40px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
{{--                        <a class="dropdown-item" href="#"><i class="fa fa-user pr-2"></i> Profile</a>--}}
{{--                        <div class="dropdown-divider"></div>--}}
                        <a class="dropdown-item" href="/admin/logout"><i class="fa fa-power-off pr-2"></i> Logout</a>
                    </div>
                </div>
            </div>
            <!--Search box and avatar-->
        </div>
    </div>
    <!--Header Menu-->
</div>
