@extends('layouts.default')
@section('content')

    <div class="row">
        <!--blog start-->
        <div class="col-lg-9">
            <div class="blog-item">
                @foreach ($items['list'] as $item)
                    <div class="row">
                        <div class="col-lg-2 col-sm-2 text-right">
                            <div class="date-wrap">
                                  <span class="date">
                                    11
                                  </span>
                                <span class="month">
                                    January
                                  </span>
                            </div>
                            <div class="author">
                                By
                                <a href="#">
                                    Admin
                                </a>
                            </div>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="javascript:;">
                                        <em>
                                            travel
                                        </em>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <em>
                                            tour
                                        </em>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <em>
                                            recreation
                                        </em>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <em>
                                            tourism
                                        </em>
                                    </a>
                                </li>
                            </ul>
                            <div class="st-view">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="javascript:;">
                                            209 View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            23 Share
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            15 comments
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 col-sm-10">
                            <?php /** ?>
                            <h1>
                                <a href="blog-detail.html">
                                    Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                                </a>
                            </h1>
                            <?php */ ?>
                            <h3>
                                {{ $item['content'] }}
                            </h3>
                            <a href="blog-detail.html" class="btn btn-primary">
                                Continue Reading
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="blog-item">
                <div class="row">
                    <div class="col-lg-2 col-sm-2">
                        <div class="date-wrap">
                  <span class="date">
                    06
                  </span>
                            <span class="month">
                    March
                  </span>
                        </div>

                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <div class="blog-img ">
                            <img src="img/blog/img6.jpg" alt=""/>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-right">
                        <div class="author">
                            By
                            <a href="#">
                                Admin
                            </a>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        travel
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tour
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        recreation
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tourism
                                    </em>
                                </a>
                            </li>
                        </ul>
                        <div class="st-view">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="javascript:;">
                                        209 View
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        23 Share
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        15 comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <h1>
                            <a href="blog-detail.html">
                                Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                            </a>
                        </h1>
                        <p>
                            Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis
                            omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis
                            iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit
                        </p>
                        <a href="blog-detail.html" class="btn btn-primary">
                            Continue Reading
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="row">
                    <div class="col-lg-2 col-sm-2">
                        <div class="date-wrap">
                  <span class="date">
                    19
                  </span>
                            <span class="month">
                    March
                  </span>
                        </div>

                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <div class="blog-img ">
                            <img src="img/blog/img3.jpg" alt=""/>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-right">
                        <div class="author">
                            By
                            <a href="#">
                                Admin
                            </a>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        travel
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tour
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        recreation
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tourism
                                    </em>
                                </a>
                            </li>
                        </ul>
                        <div class="st-view">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="javascript:;">
                                        209 View
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        23 Share
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        15 comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <h1>
                            <a href="blog-detail.html">
                                Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                            </a>
                        </h1>
                        <p>
                            Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis
                            omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis
                            iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit
                        </p>
                        <a href="blog-detail.html" class="btn btn-primary">
                            Continue Reading
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="row">
                    <div class="col-lg-2 col-sm-2">
                        <div class="date-wrap">
                  <span class="date">
                    24
                  </span>
                            <span class="month">
                    April
                  </span>
                        </div>

                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <div class="blog-img ">
                            <img src="img/blog/img4.jpg" alt=""/>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-right">
                        <div class="author">
                            By
                            <a href="#">
                                Admin
                            </a>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        travel
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tour
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        recreation
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tourism
                                    </em>
                                </a>
                            </li>
                        </ul>
                        <div class="st-view">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="javascript:;">
                                        209 View
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        23 Share
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        15 comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <h1>
                            <a href="blog-detail.html">
                                Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                            </a>
                        </h1>
                        <p>
                            Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis
                            omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis
                            iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit
                        </p>
                        <a href="blog-detail.html" class="btn btn-primary">
                            Continue Reading
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-item">
                <div class="row">
                    <div class="col-lg-2 col-sm-2">
                        <div class="date-wrap">
                  <span class="date">
                    18
                  </span>
                            <span class="month">
                    May
                  </span>
                        </div>

                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <div class="blog-img ">
                            <img src="img/blog/img8.jpg" alt=""/>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2 col-sm-2 text-right">
                        <div class="author">
                            By
                            <a href="#">
                                Admin
                            </a>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        travel
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tour
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        recreation
                                    </em>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <em>
                                        tourism
                                    </em>
                                </a>
                            </li>
                        </ul>
                        <div class="st-view">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="javascript:;">
                                        209 View
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        23 Share
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        15 comments
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-10">
                        <h1>
                            <a href="blog-detail.html">
                                Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                            </a>
                        </h1>
                        <p>
                            Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis
                            omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis
                            iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                            Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit
                        </p>
                        <a href="blog-detail.html" class="btn btn-primary">
                            Continue Reading
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <ul class="pagination">
                    <li>
                        <a href="#">
                            ??
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            1
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            2
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            3
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            4
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            5
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ??
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="col-lg-3">
            <div class="blog-side-item">
                <div class="search-row">
                    <input type="text" class="form-control" placeholder="Search here">
                </div>
                <div class="category">
                    <h3>
                        Categories
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right pr-10">
                                </i>
                                Animals
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right pr-10">
                                </i>
                                Landscape
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right pr-10">
                                </i>
                                Portait
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right pr-10">
                                </i>
                                Wild Life
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-right pr-10">
                                </i>
                                Video
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="blog-post">
                    <h3>
                        Latest Blog Post
                    </h3>
                    <div class="media">
                        <a class="pull-left" href="javascript:;">
                            <img class=" " src="img/blog/blog-thumb-1.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="javascript:;">
                                    02 May 2014
                                </a>
                            </h5>
                            <p>
                                Donec id elit non mi porta gravida at eget metus amet int
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="javascript:;">
                            <img class=" " src="img/blog/blog-thumb-2.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="javascript:;">
                                    02 May 2014
                                </a>
                            </h5>
                            <p>
                                Donec id elit non mi porta gravida at eget metus amet int
                            </p>
                        </div>
                    </div>
                    <div class="media">
                        <a class="pull-left" href="javascript:;">
                            <img class=" " src="img/blog/blog-thumb-3.jpg" alt="">
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">
                                <a href="javascript:;">
                                    02 May 2014
                                </a>
                            </h5>
                            <p>
                                Donec id elit non mi porta gravida at eget metus amet int
                            </p>
                        </div>
                    </div>
                </div>

                <div class="tags">
                    <h3>
                        Tags
                    </h3>
                    <ul class="tag">
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                flat
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                clean
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                admin
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                UI
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                responsive
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                Web Design
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                UIX
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                Blog
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                flat Admin
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tags pr-5">
                                </i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                </div>


                <div class="archive">
                    <h3>
                        Archive
                    </h3>
                    <ul class="list-unstyled">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-double-right pr-10">
                                </i>
                                May 2014
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-double-right pr-10">
                                </i>
                                April 2014
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-double-right pr-10">
                                </i>
                                March 2014
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-double-right pr-10">
                                </i>
                                February 2014
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-angle-double-right pr-10">
                                </i>
                                January 2014
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--blog end-->
    </div>
@stop

