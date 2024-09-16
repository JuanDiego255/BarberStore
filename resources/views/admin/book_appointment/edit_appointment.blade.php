@extends('admin.layouts.app')
@section('title')
    @lang('Editar Cita')
@endsection
@section('content')
    <div class="m-0 m-md-4 my-4 m-md-0">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-body">
                        <h4 class="card-title"> @lang('Information')</h4>
                        <form method="post" action="" id="editForm" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                @if(!$appointment_info->service_id == null)
                                <div class="col-md-6">
                                    <label>@lang('Service Name')</label>
                                    <select class="form-select form-control" name="service_name"
                                        aria-label="Default select example">
                                        <option selected disabled>@lang('Choose service')</option>
                                        @foreach ($servicesName as $data)
                                            <option value="{{ $data->id }}"
                                                {{ $appointment_info->service_id == $data->id ? 'selected' : ' ' }}
                                                readonly>@lang(optional($data->serviceDetails)->service_name)</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                    <input type="hidden" name="plan_id"  value="{{ $appointment_info->plan_id }}">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>@lang('Full Name')</label>
                                        <input class="form-control" type="text" name="full_name"
                                            value="{{ $appointment_info->full_name ?? optional($appointment_info->user)->username }}" required>
                                        @error('full_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>@lang('Correo electrónico')</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $appointment_info->email ?? optional($appointment_info->user)->email }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>@lang('Phone Number')</label>
                                        <input class="form-control" type="text" name="phone"
                                            value="{{ $appointment_info->phone ?? optional($appointment_info->user)->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>@lang('Date Of Cita')</label>
                                        <input class="form-control" type="date" name="date_of_appointment"
                                            value="{{ $appointment_info->date_of_appointment }}">
                                        @error('date_of_appointment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label>@lang('Cita Time')</label>
                                        <input class="form-control" type="time" name="appointment_time"
                                            value="{{ $appointment_info->appointment_time }}">
                                        @error('appointment_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group ">
                                        <label>@lang('Message')</label>
                                        <textarea class="form-control" name="message" rows="3">{{ $appointment_info->message }}</textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <input type="hidden" class="confirm" name="isConfirmar" value="">
                                <input type="hidden" class="cancel" name="isCancelar" value="">
                            </div>
                            @if ($appointment_info->status == 0)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="submit-btn-wrapper mt-md-3  text-center text-md-left">
                                            <button type="button"
                                                data-route="{{ route('admin.update.appointment', $appointment_info->id) }}"
                                                data-toggle="modal" data-target="#confirm-modal"
                                                class=" btn waves-effect waves-light btn-success btn-block confirm_btn">
                                                <span>@lang('Confirmar')</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="submit-btn-wrapper mt-md-3  text-center text-md-left">
                                            <button type="button"
                                                data-route="{{ route('admin.update.appointment', $appointment_info->id) }}"
                                                data-toggle="modal" data-target="#cancel-modal"
                                                class=" btn waves-effect waves-light btn-danger btn-block cancel_btn">
                                                <span>@lang('Cancelar')</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @elseif(!$appointment_info->status == 0)
                                <div class="submit-btn-wrapper mt-md-3 text-center text-md-left">
                                    <button type="submit"
                                        data-route="{{ route('admin.update.appointment', $appointment_info->id) }}"
                                        class=" btn waves-effect waves-light btn-rounded btn-primary btn-block save_changes">
                                        <span>@lang('Guardar')</span>
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Confirmar Modal-->
    <div id="confirm-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">@lang('Cita Confirmaration')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to confirm this?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                    <input type="hidden" class="status" name="status" value="1">
                    <button type="submit" class="btn btn-success confirmCita">@lang('Confirmar')</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cancelar Modal-->
    <div id="cancel-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="primary-header-modalLabel">@lang('Cancelar Cita')
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                    </button>
                </div>
                <div class="modal-body">
                    <p>@lang('Are you sure to cancel appointment?')</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">@lang('Close')</button>
                    <input type="hidden" class="status" name="status" value="1">
                    <button type="submit" class="btn btn-danger cancelCita">@lang('Cancelar')</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        "use strict";
        $(document).on('click', '.save_changes', function() {
            $("#editForm").submit()
        })

        $('.save_changes').on('click', function() {
            var route = $(this).data('route');
            $('#editForm').attr('action', route)
        })

        $(document).on('click', '.confirmCita', function() {
            $("#editForm").submit()
        })

        $('.confirm_btn').on('click', function() {
            var route = $(this).data('route');
            $('.confirm').val('1');
            $('#editForm').attr('action', route)
        })

        $(document).on('click', '.cancelCita', function() {
            $("#editForm").submit()
        })

        $('.cancel_btn').on('click', function() {
            var route = $(this).data('route');
            $('.cancel').val('2');
            $('#editForm').attr('action', route)
        })
    </script>
@endpush
