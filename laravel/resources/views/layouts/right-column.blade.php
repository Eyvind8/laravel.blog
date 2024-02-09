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
        {{--<div class="category">
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
--}}
        {{--<div class="blog-post">
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
        </div>--}}

        <div class="tags">
            <h3>
                Tags
            </h3>
            <ul class="tag">
                @foreach ($tags as $tag)
                    <li>
                        <a href="/?tag={{ $tag->id }}" class="{{ $tag->parent_id == 0 ? 'border-green' : '' }}">
                            <i class="fa fa-tags pr-5"></i>
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

{{--        <div class="archive">--}}
{{--            <h3>--}}
{{--                Archive--}}
{{--            </h3>--}}
{{--            <ul class="list-unstyled">--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-angle-double-right pr-10">--}}
{{--                        </i>--}}
{{--                        May 2014--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-angle-double-right pr-10">--}}
{{--                        </i>--}}
{{--                        April 2014--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-angle-double-right pr-10">--}}
{{--                        </i>--}}
{{--                        March 2014--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-angle-double-right pr-10">--}}
{{--                        </i>--}}
{{--                        February 2014--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="javascript:;">--}}
{{--                        <i class="fa fa-angle-double-right pr-10">--}}
{{--                        </i>--}}
{{--                        January 2014--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</div>
