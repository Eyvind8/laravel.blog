@extends('layouts.default')
@section('content')

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
                    <div class="row" style="margin-bottom: 20px">
                        @include('includes.item', ['item' => $item, 'commentLink' => true])
                    </div>
                @endforeach
            </div>

            <div class="text-center">
                    <?php echo buildPagination($items['total_pages'], $items['current_page']); ?>
            </div>
        @endif
    </div>
    <!--blog end-->
@stop

