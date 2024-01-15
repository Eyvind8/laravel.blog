@extends('layouts.default')
@section('content')

    <!-- Single item view -->
    <div class="col-lg-9">
        <div class="blog-item">
            <div class="row">
                <div class="col-lg-12">
                    @include('includes.item_one', ['item' => $item, 'commentLink' => false])
                    <div class="col-lg-2"></div>
                    <div class="col-lg-10">
                        <div class="form-group" style="padding-bottom: 10px; margin-top: 20px">
                            @foreach ($comments as $comment)
                                <div class="col-lg-12" style="margin-bottom: 25px; padding-left: 0px">
                                    <span  style="padding-left: 0px;" class="col-lg-2">{{ date('Y-m-d', strtotime($comment->created)) }}</span>
                                    <span class="col-lg-10" style="font-size: 22px; margin-top: -7px">{{ $comment->text }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group col-lg-6" style="margin-top: 10px; padding-left: 0px;">
                            <form id="commentForm" action="{{ route('comments.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                                <textarea autocomplete="off" id="commentTextarea" class="form-control" name="comment"
                                          rows="4" placeholder="Коментувати"></textarea>
                                <div class="form-group" style="margin-top: 10px;">
                                    <button id="submitComment" class="btn btn-primary" type="button">Коментувати
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
