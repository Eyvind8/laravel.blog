@extends('admin.layouts.default')

@section('content')

    <a href="/admin/items">
        <h5 class="mb-3"><strong>Items</strong></h5>
    </a>
    @if (empty($items['list']))
        <div class="blog-item">
            <h3>
                На ваш запит нічого не знайдено.
                Можливо, варто спробувати більш загальні чи специфічні ключові слова для пошуку
            </h3>
        </div>
    @else
        <div class="row mt-3">
            <div class="col-sm-12">
                <!--Datatable-->
                <div class="mt-1 mb-3 p-3 button-container bg-white border shadow-sm">

                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example_length"><label>Show <select
                                                    name="example_length" aria-controls="example"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> entries</label></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example_filter" class="dataTables_filter"><label>Search:<input
                                                    type="search"
                                                    class="form-control form-control-sm"
                                                    placeholder=""
                                                    aria-controls="example"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="table table-striped table-hover table-bordered dataTable"
                                           role="grid"
                                           aria-describedby="example_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                style="width: 10px; padding-right: 0px;">
                                                Id
                                            </th>
                                            <th tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1"
                                                style="width: 373px;">Text
                                            </th>
                                            <th tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1"
                                                style="width: 53px;">
                                                Data
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($items['list'] as $item)
                                            @include('admin.includes.item_one', ['item' => $item])
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                        Showing
                                        1 to 10 of 57 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div style="padding-top: 14px;" class="dataTables_paginate paging_simple_numbers" id="example_paginate">
                                         <?= buildAdminPaginator($items['total_pages'], $items['current_page']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Datatable-->

            </div>
        </div>
    @endif

@endsection
