@extends($theme.'layouts.user')
@section('title',trans('My Cita'))
@section('content')
    <div class="container-fluid">
        <div class="main row">
            <div class="col-12">
                <div class="search-bar">
                    <form action="{{ route('user.search.appointment') }}" method="get">
                        <div class="row g-3 align-items-end">
                            <div class="input-box col-lg-2">
                                <label for="">@lang('Service Name')</label>
                                <select class="form-select" name="service_name" aria-label="Default select example">
                                    <option value="">@lang('All Service')</option>
                                    @forelse($services as $data)
                                        <option
                                            value="{{ $data->id }}" {{ @request()->service_name == $data->id ? 'selected' : '' }}>@lang(optional($data->serviceDetails)->service_name)</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="input-box col-lg-2">
                                <label for="">@lang('From Cita Date')</label>
                                <input type="text" class="form-select flatpickr" name="from_date"
                                       placeholder="@lang('Date')" value="{{@request()->from_date}}" autocomplete="off">
                            </div>
                            <div class="input-box col-lg-2">
                                <label for="">@lang('To Cita Date')</label>
                                <input type="text" class="form-select flatpickr" name="to_date"
                                       placeholder="@lang('Date')" value="{{@request()->to_date}}" autocomplete="off">
                            </div>
                            <div class="input-box col-lg-2">
                                <button class="btn-custom w-100"><i class="fal fa-search"></i>@lang('Buscar')</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-parent table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">@lang('SL No.')</th>
                            <th scope="col">@lang('Service Name')</th>
                            <th scope="col">@lang('Date Of Cita')</th>
                            <th scope="col">@lang('Cita Time')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Acción')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($appointment_list as $data)
                            <tr>
                                <td data-label="SL No.">{{ $loop->index + 1 }}</td>
                                <td data-label="Service Name">
                                    @if(!$data->plan)
                                        @lang(optional(optional($data->service)->serviceDetails)->service_name)
                                    @else
                                        @lang(optional($data->plan)->name . ' ' . 'Plan Services')
                                    @endif
                                </td>
                                <td data-label="Date Of Cita">
                                    @if(!$data->date_of_appointment)
                                        <span>N/A</span>
                                    @else
                                        {{ dateTime($data->date_of_appointment, 'd M Y') }}
                                    @endif
                                </td>
                                <td data-label="Cita Time">
                                    {{ !empty($data->appointment_time) ? timeFormat($data->appointment_time) : 'N/A' }}
                                </td>
                                <td data-label="Status">
                                    @if($data->status == 0)
                                        <span class="badge bg-warning">@lang('Pending')</span>
                                    @elseif($data->status == 1)
                                        <span class="badge bg-success">@lang('Confirmar')</span>
                                    @elseif($data->status == 2)
                                        <span class="badge bg-danger">@lang('Cancelar')</span>
                                    @endif
                                </td>
                                <td data-label="Acción">
                                    <button type="button"
                                            data-route="{{ route('user.my.appointment.date.fixed', $data->id) }}"
                                            data-status="{{ $data->status }}"
                                            class="date_fixed"
                                            >
                                        <i class="fas fa-calendar-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <td class="text-center text-danger" colspan="100%">@lang('No Found Data')</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        {{ $appointment_list->links('partials.pagination') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Make a Cita</h4>
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fal fa-times"></i>
                    </button>
                </div>
                <form action="" class="addRoute" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="row g-4">
                            <div class="input-box col-12">
                                <input class="form-control" type="date" name="date" placeholder="Date"/>
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-box col-12">
                                <input class="form-control" type="time" name="time" placeholder="Date"/>
                                @error('time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-custom btn2" data-bs-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn-custom">@lang('Guardar changes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        'use strict';
        $(".flatpickr").flatpickr();

        $('.date_fixed').on('click', function () {
            let status = $(this).data('status');
            if(status == 1){
                $('#editModal').modal('hide');
                Notiflix.Notify.Warning("You can't change this");
            }else{
                $('#editModal').modal('show');
            }
            let route = $(this).data('route');
            $('.addRoute').attr('action', route)
        })


    </script>
@endpush

@push('script')
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
@endpush
