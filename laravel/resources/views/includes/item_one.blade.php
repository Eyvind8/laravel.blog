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
                {{ $item->views }} View
            </em>
        </li>
        <li class="<?= $item->likes ? '' : 'hidden' ?>">
            <em>
                <span id="likesCount_{{ $item->id }}">{{ $item->likes }} Likes</span>
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
    <div style="display: flex;">
        <span class="itemText textToCopy">{{ Str::ucfirst($item['content']) }}</span>

        <a href="#" class="copyButton" onclick="return false;">
            <img width="16px" alt="copy" title="Копіювати" src="/img/copy.png">
        </a>
        <a href="#" class="likeButton" onclick="toggleLike({{ $item->id }}); return false;">
            <img src="/img/heart_small-2.png" title="Вподобайка :)" width="16px">
        </a>
        <input class="js-item-id" type="hidden" value="{{ $item->id }}">
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
