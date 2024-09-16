@extends('admin.layouts.app')
@section('title')
    @lang('Stock Lista')
@endsection
@section('content')
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="row d-flex justify-content-between">
                <div class="col-md-10">
                    <form action="{{ route('admin.product.stock.search') }}" method="get">
                        <div class="row">
                            <div class="col-md-3 ">
                                <div class="form-group">
                                    <input type="text" name="product_name" value="{{ @request()->product_name }}"
                                        class="form-control get-trx-id" placeholder="@lang('Buscar Product')">
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

                <div class="col-md-2">
                    <div class="media mb-4 float-right">
                        <a href="{{ route('admin.product.stock.create') }}" class="btn btn-sm btn-primary mr-2">
                            <span><i class="fa fa-plus-circle"></i> @lang('Add New')</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered" id="zero_config">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">@lang('Product Name')</th>
                            <th scope="col">@lang('Quantity')</th>
                            <th scope="col">@lang('Acción')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productStock as $stock)
                            <tr>
                                <td data-label="@lang('Product')">
                                    <div class="d-lg-flex d-block align-items-center">
                                        <div class="mr-3"><img
                                                src="{{ getFile(config('location.product.path_thumbnail') . optional($stock->getProduct)->thumbnail_image) }}"
                                                alt="user" class="rounded-circle" width="45" height="45"></div>
                                        <div class="">
                                            <p class="text-secondary mb-0">@lang(optional(optional($stock->getProduct)->details)->product_name)</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-label="@lang('Quantity')"> {{ $stock->qty }}</td>

                                <td data-label="@lang('Acción')">
                                    <a href="{{ route('admin.product.stock.edit', $stock->product_id) }}"
                                        class="btn btn-sm btn-primary edit-button text-white">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="100%">@lang('No Data Found')</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
            {{ $productStock->links('partials.pagination') }}
        </div>
    </div>
    <!-- Eliminar Modal -->
    <div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">@lang('Eliminar Confirmation')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to delete this?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                    <form action="" method="post" class="deleteRoute">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-primary">@lang('Yes')</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@push('js')

    @if ($errors->any())
        @php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        @endphp
        <script>
            "use strict";
            @foreach ($errors as $error)
                Notiflix.Notify.Failure("{{ trans($error) }}");
            @endforeach
        </script>
    @endif

    <script>
        'use strict'
        $(document).ready(function() {
            $('.notiflix-confirm').on('click', function() {
                var route = $(this).data('route');
                $('.deleteRoute').attr('action', route)
            })
        });
    </script>
@endpush
