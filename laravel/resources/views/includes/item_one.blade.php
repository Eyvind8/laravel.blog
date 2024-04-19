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

        <a href="#" class="copyButton tooltips" onclick="return false;" data-placement="top" title="Копіювати">
            <img width="16px" alt="copy" src="/img/copy.png">
        </a>
        <a href="#" class="likeButton tooltips" onclick="toggleLike({{ $item->id }}); return false;"
           data-placement="top" title="Вподобайка:)">
            <img src="/img/heart_small-2.png" width="16px">
        </a>
        <input class="js-item-id" type="hidden" value="{{ $item->id }}"
               data-link="/id/{{ $item['id'] }}/{{ urlSlug($item['content']) }}">
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

    <div class="social-icons">
        <a href="#" class="telegram"><i class="fab fa-telegram"></i></a>
        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
    </div>

    @if ($commentLink)
        <div style="padding-top: 10px">
            <a href="/id/{{ $item['id'] }}/{{ urlSlug($item['content']) }}">
                <em>Кометувати</em>
            </a>
        </div>
    @endif
</div>
