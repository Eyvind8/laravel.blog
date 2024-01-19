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
    <div style="display: flex; align-items: center;">
        <h3 class="textToCopy"
            style="white-space: pre-line; margin-top:-15px; margin-bottom: 15px; color: #444e67; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif">
            {{ Str::ucfirst($item['content']) }}
        </h3>
        <a href="#" class="copyButton" style="padding-left: 10px; margin-top: -3px">
            <img width="16px" alt="copy" title="Копіювати" style="opacity: 0.5" src="/img/copy.png">
        </a>
    </div>
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

    @if ($commentLink)
        <a href="/id/{{ $item['id'] }}/{{ urlSlug($item['content']) }}" class="">
            <em>Кометувати</em>
        </a>
    @endif
</div>
