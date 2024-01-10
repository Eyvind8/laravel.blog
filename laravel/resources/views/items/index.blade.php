@extends('layouts.default')
@section('content')

    <div class="row">
        <!--blog start-->
        <div class="col-lg-9">
            @if (empty($items['list']))
                <div class="blog-item">
                    <h3>
                        На ваш запит нічого не знайдено.
                        Можливо, варто спробувати більш загальні чи специфічні ключові слова для пошуку
                    </h3>
                </div>
            @else
                <div class="blog-item">
                    @foreach ($items['list'] as $item)
                        <div class="row">
                            <div class="col-lg-2 col-sm-2 text-right">
                                <div class="date-wrap">
                                  <span class="date">
                                      {{ date_parse($item['created'])['day'] }}
                                  </span>
                                    <span class="month">
                                      {{ getUkrainianMonth($item['created']) }}
                                </span>
                                </div>
                                <ul class="list-unstyled">
                                    <li style="padding-bottom: 1px">
                                        <em>
                                            209 View
                                        </em>
                                    </li>
                                    <li class="hidden">
                                        <em>
                                            23 Share
                                        </em>
                                    </li>
                                </ul>
                                <div class="st-view hidden" style="margin-top: 0px">
                                    <ul class="list-unstyled">
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
                                 * <h1>
                                 * <a href="blog-detail.html">
                                 * Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.
                                 * </a>
                                 * </h1>
                                 * <?php */ ?>
                                <h3 style="white-space: pre-line; margin-top:-15px; margin-bottom: 15px; color: #444e67; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif">
                                    {{ Str::ucfirst($item['content']) }}
                                </h3>
                                <br>
                                <ul class="tag">
                                    @foreach ($item->getTags() as $tag)
                                        <li>
                                            <a href="/?tag={{ $tag->id }}" style="color: #797979">
                                                <i class="fa fa-tags pr-5"></i>
                                                {{ $tag->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <a href="/id/{{ $item['id'] }}/{{ urlSlug($item['content']) }}" class="">
                                    <em>Кометувати</em>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center">
                        <?php echo buildPagination($items['total_pages'], $items['current_page']); ?>
                </div>
            @endif
        </div>

        <div class="col-lg-3">
            <div class="blog-side-item">
                <div class="search-row">
                    <form action="/" method="GET" class="search-form">
                        <input type="text" name="search" class="form-control"
                               placeholder="Шукати тут"
                               onkeypress="handleSearchKeyPress(event, this)"
                               value="{{ request()->input('search') }}"
                        >
                    </form>
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

