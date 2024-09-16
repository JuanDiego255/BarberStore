@extends('admin.layouts.app')
@section('title')
    @lang('Order Lista')
@endsection

@section('content')
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-2 pt-4 pl-4 shadow">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <form action="{{ route('admin.product.order.search') }}" method="get">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="order_number" value="{{ @request()->order_number }}"
                                    class="form-control get-trx-id" placeholder="@lang('Order Number')">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="user_name" value="{{ @request()->user_name }}"
                                    class="form-control get-username" placeholder="@lang('Username')">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="payment_type" value="{{ @request()->payment_type }}"
                                    class="form-control get-username" placeholder="@lang('Pago Type')">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="date" class="form-control" name="date" id="datepicker" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <button type="submit" class="btn waves-effect waves-light btn-primary"><i
                                        class="fas fa-search"></i> @lang('Buscar')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow p-3">
        @php
            $segment = collect(request()->segments())->last();
        @endphp
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('admin.order.list') }}"
                    class="nav-link theme-a {{ $segment == 'list' ? 'activeLista' : '' }}">@lang('All Order')
                    ({{ $all_order }})</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'pending') }}"
                    class="nav-link theme-a {{ $segment == 'pending' ? 'activeLista' : '' }}">@lang('Pending')
                    ({{ $pending_order }})</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'processing') }}"
                    class="nav-link theme-a {{ $segment == 'processing' ? 'activeLista' : '' }}">@lang('Processing')
                    ({{ $processing_order }})</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'on_Shipping') }}"
                    class="nav-link theme-a {{ $segment == 'on_Shipping' ? 'activeLista' : '' }}">
                    @lang('On Shipping') ({{ $onShipping_order }})
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'ship') }}"
                    class="nav-link theme-a {{ $segment == 'ship' ? 'activeLista' : '' }}">@lang('Ship')
                    ({{ $ship_order }})</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'completed') }}"
                    class="nav-link theme-a {{ $segment == 'completed' ? 'activeLista' : '' }}">@lang('Completed')
                    ({{ $completed_order }})</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.order.list', 'cancel') }}"
                    class="nav-link theme-a {{ $segment == 'cancel' ? 'activeLista' : '' }}">@lang('Cancelar')
                    ({{ $cancel_order }})</a>
            </li>
        </ul>
    </div>
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="dropdown mb-2 text-right">
                <button class="btn btn-sm  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-bars pr-2"></i> @lang('Acción')</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item pending" type="button" data-toggle="modal"
                        data-target="#all_active">@lang('Pending')
                    </button>
                    <button class="dropdown-item processing" type="button" data-toggle="modal"
                        data-target="#all_inactive">@lang('Processing')
                    </button>
                    <button class="dropdown-item on_shipping" type="button" data-toggle="modal"
                        data-target="#all_inactive">@lang('On Shipping')
                    </button>
                    <button class="dropdown-item ship" type="button" data-toggle="modal"
                        data-target="#all_inactive">@lang('Ship')
                    </button>
                    <button class="dropdown-item completed" type="button" data-toggle="modal"
                        data-target="#all_inactive">@lang('Completed')
                    </button>
                    <button class="dropdown-item cancel" type="button" data-toggle="modal"
                        data-target="#all_inactive">@lang('Cancelar')
                    </button>

                </div>
            </div>
            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">
                                <input type="checkbox" class="form-check-input check-all tic-check" name="check-all"
                                    id="check-all">
                                <label for="check-all"></label>
                            </th>
                            <th scope="col">@lang('#Order Number')</th>
                            <th scope="col">@lang('User')</th>
                            <th scope="col">@lang('Pago Type')</th>
                            <th scope="col">@lang('Order Time')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Acción')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orderLista as $order)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="chk-{{ $order->id }}"
                                        class="form-check-input row-tic tic-check" name="check"
                                        value="{{ $order->id }}" data-id="{{ $order->id }}">
                                    <label for="chk-{{ $order->id }}"></label>
                                </td>
                                <td data-label="@lang('#Order Number')">#{{ $order->order_number }}</td>
                                <td data-label="@lang('User')">
                                    <div class="d-lg-flex d-block align-items-center ">
                                        <div class="mr-3"><img
                                                src="{{ getFile(config('location.user.path') . optional($order->getUser)->image) }}"
                                                alt="user" class="rounded-circle" width="45" height="45">
                                        </div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">
                                                {{ optional($order->getUser)->username ?? 'Guest' }}</h5>
                                            <span class="text-muted font-14">{{ optional($order->getUser)->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                @if ($order->payment_type == 'Cash On Delivery')
                                    <td data-label="@lang('Pago Type')">{{ $order->payment_type }}</td>
                                @else
                                    <td data-label="@lang('Pago Type')">{{ optional($order->gateway)->name }}</td>
                                @endif
                                <td data-label="@lang('Order Time')">{{ dateTime($order->created_at, 'd M Y') }}</td>
                                <td data-label="@lang('Status')" class="order_status">
                                    @if ($order->status == 0)
                                        <span class="badge badge-pill badge-warning text-white">@lang('Pending')</span>
                                    @endif
                                    @if ($order->status == 1)
                                        <span class="badge badge-pill processing">@lang('Processing')</span>
                                    @endif
                                    @if ($order->status == 2)
                                        <span class="badge badge-pill shipping">@lang('On Shipping')</span>
                                    @endif
                                    @if ($order->status == 3)
                                        <span class="badge badge-pill ship">@lang('Ship')</span>
                                    @endif
                                    @if ($order->status == 4)
                                        <span class="badge badge-pill badge-success">@lang('Completed')</span>
                                    @endif
                                    @if ($order->status == 5)
                                        <span class="badge badge-pill badge-danger">@lang('Cancelar')</span>
                                    @endif
                                </td>
                                <td data-label="@lang('Acción')">
                                    <a href="{{ route('admin.order.product.info', $order->id) }}" type="button"
                                        class="btn btn-outline-primary btn-sm ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center text-danger" colspan="9">@lang('No Data Found!')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $orderLista->links('partials.pagination') }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        "use strict";
        $(document).on('click', '#check-all', function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(document).on('change', ".row-tic", function() {
            let length = $(".row-tic").length;
            let checkedLength = $(".row-tic:checked").length;
            if (length == checkedLength) {
                $('#check-all').prop('checked', true);
            } else {
                $('#check-all').prop('checked', false);
            }
        });

        //dropdown menu is not working
        $(document).on('click', '.dropdown-menu', function(e) {
            e.stopPropagation();
        });

        //multiple processing
        $(document).on('click', '.pending', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.pending') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });

        //multiple processing
        $(document).on('click', '.processing', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.processing') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });
        //multiple On Shipping
        $(document).on('click', '.on_shipping', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.on.shipping') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });
        //multiple Ship
        $(document).on('click', '.ship', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.ship') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });
        //multiple Ship
        $(document).on('click', '.completed', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.completed') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });
        //multiple Ship
        $(document).on('click', '.cancel', function(e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                },
                url: "{{ route('admin.stage.cancel') }}",
                data: {
                    strIds: strIds
                },
                datatType: 'json',
                type: "post",
                success: function(data) {
                    location.reload();

                },
            });
        });
        //multiple Ship
    </script>
@endpush
