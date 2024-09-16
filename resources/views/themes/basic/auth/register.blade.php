@extends($theme.'layouts.app')
@section('title','Registrar')
@section('content')
    <section class="register_area login_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section_header text-center">
                    <h2>@lang('Crear an Account')</h2>
                </div>
                <div class="col-lg-10 registration_form" data-aos="fade-right">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="firstname" class="form-control"
                                           placeholder="@lang('First Name')" value="{{ old('firstname') }}"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    @error('firstname')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="lastname" class="form-control"
                                           placeholder="@lang('Last Name')" value="{{ old('lastname') }}"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    @error('lastname')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="text" name="username" class="form-control"
                                           placeholder="@lang('Username')" value="{{ old('username') }}"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                    @error('username')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    @php
                                        $country_code = (string) @getIpInfo()['code'] ?: null;
                                        $myCollection = collect(config('country'))->map(function($row) {
                                            return collect($row);
                                        });
                                        $countries = $myCollection->sortBy('code');
                                    @endphp
                                    <div class="input-group phone-country-code">
                                        <select name="phone_code"
                                                class="form-select country_code dialCode-change text-secondary">
                                            @foreach($countries  as $value)
                                                <option value="{{$value['phone_code']}}"
                                                        data-name="{{$value['name']}}"
                                                        data-code="{{$value['code']}}"
                                                    {{$country_code == $value['code'] ? 'selected' : ''}}
                                                > {{$value['code']}} ({{$value['phone_code']}})

                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="phone" class="form-control dialcode-set"
                                               value="{{old('phone')}}"
                                               placeholder="@lang('Your Phone Number')">

                                        <div class="image_area mt-1">
                                            <i class="fa-regular fa-phone"></i>
                                        </div>
                                    </div>

                                    @error('phone')
                                    <span class="text-danger mt-1">{{ $message }}</span>
                                    @enderror

                                    <input type="hidden" name="country_code" value="{{old('country_code')}}"
                                           class="text-dark">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="name_area icon_position">
                                    <input type="email" name="email" class="form-control"
                                           placeholder="@lang('Correo electrónico Address')" value="{{ old('email') }}"
                                           autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-envelope"></i>
                                    </div>
                                    @error('email')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="@lang('Contraseña')" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-lock"></i>
                                    </div>
                                    @error('password')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="name_area icon_position">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="@lang('Confirmar Contraseña')" autocomplete="off">
                                    <div class="image_area mt-1">
                                        <i class="fa-regular fa-lock"></i>
                                    </div>
                                    @error('password_confirmation')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>
                            </div>

                            @if(basicControl()->reCaptcha_status_registration)
                                <div class="col-md-6 box mt-4 form-group">
                                    {!! NoCaptcha::renderJs(session()->get('trans')) !!}
                                    {!! NoCaptcha::display(['data-theme' => '']) !!}
                                    @error('g-recaptcha-response')
                                    <span class="text-danger mt-1">@lang($message)</span>
                                    @enderror
                                </div>
                            @endif

                        </div>
                        <div class="remember_forgot">
                            <div class="condition_area mt-4 mb-40 form-check  d-flex align-items-center">
                                <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1" value="{{ old('remember') ? 'checked' : '' }}">
                                <label class="form-check-label mt-1" for="exampleCheck1">@lang('I Have Read And Agree To The Website Terms And Conditions')</label>
                            </div>

                        </div>
                        <button type="submit"
                                class="common_btn mb-40 d-flex justify-content-center align-items-center">@lang('Registrar')</button>
                        <h6 class="highlight text-center mb-40">@lang('Already have account?') <a
                                href="{{ route('login') }}"> @lang('Sign In')</a>
                        </h6>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        "use strict";
        $(document).ready(function () {
            setDialCode();
            $(document).on('change', '.dialCode-change', function () {
                setDialCode();
            });

            function setDialCode() {
                let currency = $('.dialCode-change').val();
                $('.dialcode-set').val(currency);
            }

        });

    </script>
@endpush
