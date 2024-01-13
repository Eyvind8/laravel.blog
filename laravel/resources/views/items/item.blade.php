@extends('layouts.default')
@section('content')

    <div class="row">
        <!-- Single item view -->
        <div class="col-lg-9">
            <div class="blog-item">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 style="white-space: pre-line; margin-top:-15px; margin-bottom: 15px; color: #444e67; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif">
                            {{ Str::ucfirst($item['content']) }}
                        </h3>

                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                            <textarea name="comment" rows="4" placeholder="Коментувати"></textarea>
                            <button type="submit">Відправити</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
