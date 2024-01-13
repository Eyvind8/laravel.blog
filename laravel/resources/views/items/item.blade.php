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

                        <div class="form-group">
                            @foreach ($comments as $comment)
                                <div class="col-lg-12" style="margin-bottom: 25px; padding-left: 0px">
                                    <span class="col-lg-2">{{ date('Y-m-d', strtotime($comment->created)) }}</span>
                                    <span class="col-lg-10">{{ $comment->text }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group col-lg-6" style="margin-top: 10px">
                            <form id="commentForm" action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                                <textarea autocomplete="off" id="commentTextarea" class="form-control" name="comment" rows="4" placeholder="Коментувати"></textarea>
                                <div class="form-group" style="margin-top: 10px;">
                                    <button id="submitComment" class="btn btn-primary" type="button">Коментувати</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop
