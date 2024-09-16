@extends($theme . 'layouts.app')
@section('title', trans($title))

@section('content')
    @if (isset($templates['book-appointment'][0]) && ($bookCita = $templates['book-appointment'][0]))
        <section class="appoinment_area"
            style="background: linear-gradient(rgb(53, 49, 47, 0.9),rgb(53, 49, 47, 0.9)), url({{ getFile(config('location.content.path') . $bookCita->templateMedia()->background_image) }}); background-repeat: no-repeat; background-size: 100% 50%; background-position: top">
            <div class="container">
                <div class="row g-4">
                    <div class="col-md-6" data-aos="fade-left">
                        <div class="section_left h-100">
                            <div class="card bg-transparent border-0 rounded-0 h-100">
                                <div class="section_header pb-40">
                                    <h2>@lang(optional($bookCita->description)->title)</h2>
                                    <p>
                                        @lang(optional($bookCita->description)->short_details)
                                    </p>
                                </div>
                                <div class="image_area h-100">
                                    <iframe class="w-100 h-100 border-0" src="{{ @$bookCita->templateMedia()->map_link }}"
                                        width="600" height="450"  allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-right">
                        <div class="section_right">
                            <form action="{{ route('user.book.appointment') }}" method="post">
                                @csrf
                                <div class="mt-3">
                                    <input type="text" name="full_name" class="form-control"
                                        placeholder="@lang('Full Name')" value="{{ old('full_name') }}" autocomplete="off">
                                    @error('full_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="email" name="email" class="form-control"
                                        placeholder="@lang('Correo electrónico Address')" value="{{ old('email') }}" autocomplete="off">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <input type="number" name="phone" class="form-control"
                                        placeholder="@lang('Phone Number')" value="{{ old('phone') }}" autocomplete="off">
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <select class="form-select form-control" name="service_name"
                                        aria-label="Default select example">
                                        <option selected disabled>@lang('Choose service')</option>
                                        @foreach ($servicesName as $data)
                                            <option value="{{ $data->id }}">@lang(optional($data->serviceDetails)->service_name)</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('service_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mt-4 date">
                                    <input type="date" name="date_of_appointment" class="form-control"
                                        value="{{ old('date_of_appointment') }}" autocomplete="off">
                                    @error('date_of_appointment')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <textarea class="form-control" name="message" placeholder="Type Your Massage" rows="5">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="common_btn mt-4">@lang('BOOK APPOINTMENT')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
