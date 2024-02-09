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
                            <div class="row container">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="example_length"><label>Show
                                            <select onchange="handleSelectChange('/admin/items', this)"
                                                    id="limitItemsSet"
                                                    class="custom-select custom-select-sm form-control form-control-sm">
                                                <option {{ $items['limit'] == 10 ? 'selected' : '' }} value="10">10
                                                </option>
                                                <option {{ $items['limit'] == 25 ? 'selected' : '' }} value="25">25
                                                </option>
                                                <option {{ $items['limit'] == 50 ? 'selected' : '' }} value="50">50
                                                </option>
                                                <option {{ $items['limit'] == 100 ? 'selected' : '' }} value="100">100
                                                </option>
                                            </select> entries</label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example_filter" class="dataTables_filter">
                                        <form action="/admin/items" method="GET" class="search-form">
                                            <label>Search:
                                                <input
                                                    type="search"
                                                    name="search"
                                                    class="form-control form-control-sm"
                                                    placeholder=""
                                                    onkeypress="handleSearchKeyPress(event, this)"
                                                    value="{{ request()->input('search') }}"
                                                >
                                            </label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @include('admin.includes.item_create')

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped table-hover table-bordered dataTable"
                                       role="grid"
                                       aria-describedby="example_info">
                                    <thead>
                                    <tr role="row">
                                        <th data-column="created" class="sorting_{{ $items['sort_dir'] }}"
                                            aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"
                                            style="width: 10px; padding-right: 0px;"
                                            onclick="changeSorting('/admin/items', 'created')">
                                            Data
                                        </th>
                                        <th aria-controls="example" rowspan="1" colspan="1"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            Content / Tags
                                            <div style="text-align: right;">
                                                    <a href="#" onclick="$('#create-item-js').slideToggle('slow');"><img width="26px" src="/img/admin/plus.png"/></a>
                                            </div>
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
                                @php
                                    $currentPage = $items['current_page'];
                                    $perPage = $items['limit'];
                                    $totalEntries = $items['total'];

                                    $startEntry = ($currentPage - 1) * $perPage + 1;
                                    $endEntry = min($currentPage * $perPage, $totalEntries);
                                @endphp

                                <div class="dataTables_info" id="example_info" role="status" aria-live="polite">
                                    Showing {{ $startEntry }} to {{ $endEntry }} of {{ $totalEntries }} entries
                                </div>

                            </div>
                            <div class="col-sm-12 col-md-7">
                                <div style="padding-top: 14px;" class="dataTables_paginate paging_simple_numbers"
                                     id="example_paginate">
                                        <?= buildAdminPaginator($items); ?>
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
