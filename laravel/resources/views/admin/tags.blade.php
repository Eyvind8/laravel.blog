@extends('admin.layouts.default')

@section('content')
    @php use App\Models\Tag; @endphp
    <a href="/admin/tags">
        <h5 class="mb-3"><strong>Tags</strong></h5>
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
                                            <select onchange="handleSelectChange('/admin/tags', this)"
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
                                    <form method="POST" action="{{ route('admin.tags.recalculate') }}">
                                        @method('PUT')
                                        <button class="btn btn-primary" style="cursor: pointer;" type="submit">Recalculate</button>
                                    </form>
{{--                                    <div id="example_filter" class="dataTables_filter">--}}
{{--                                        <form action="/admin/tags" method="GET" class="search-form">--}}
{{--                                            <label>Search:--}}
{{--                                                <input--}}
{{--                                                    type="search"--}}
{{--                                                    name="name"--}}
{{--                                                    class="form-control form-control-sm"--}}
{{--                                                    placeholder=""--}}
{{--                                                    onkeypress="handleSearchKeyPress(event, this)"--}}
{{--                                                    value="{{ request()->input('search') }}"--}}
{{--                                                >--}}
{{--                                            </label>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
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
                                        <th>
                                            Data
                                        </th>
                                        <th aria-controls="example" rowspan="1" colspan="1"
                                            style="display: flex; justify-content: space-between; align-items: center;">
                                            Name
                                        </th>
                                        <th>
                                            Records
                                        </th>
                                        <th>
                                            Parent
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($items['list'] as $item)
                                        <tr role="row" class="items" id="item-js-{{ $item->id }}">
                                            <td>
                                                Id: {{ $item->id }}

                                                @if($item->active === Tag::STATUS_ACTIVE)
                                                    <label style="margin: 0px" class="badge badge-success badge-pill">active</label>
                                                @else
                                                    <label style="margin: 0px" class="badge badge-warning badge-pill">inactive</label>
                                                @endif
                                            </td>
                                            <td>
                                                <b style="font-size: 18px;">{{ $item->name }}</b>
                                            </td>
                                            <td>
                                                Active records: {{ $item->active_records_count }} <br>
                                                Total records: {{ $item->total_records_count }}
                                            </td>
                                            <td>
                                                <b>{{ implode(', ', $item->children->pluck('name')->toArray()) }}</b>
                                            </td>
                                        </tr>
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
