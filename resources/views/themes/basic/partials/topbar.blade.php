<div class="header_top_area">
    <div class="container">
        <div class="row align-items-center g-3">

            <div class="col-md-6 text-center text-md-start d-none d-sm-block">
                @if(isset($topbarSection['topbar'][0]) && $topbarSection = $topbarSection['topbar'][0])
                    <div class="header_left">
                        <p class="para_text">
                            @lang(optional($topbarSection->description)->title)
                        </p>
                    </div>
                @endif
            </div>

            <div class="col-md-6 ">
                <div class="header_right d-flex justify-content-md-end justify-content-center align-items-center">
                    <div class="language_select_area">
                        <select class="form-select language">
                            @foreach($languages as $data)
                                <option value="{{$data->short_name}}"
                                        @if(session()->get('trans') == $data->short_name) selected @endif>@lang($data->name)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="login_area">
                        @if (Auth::check())
                            <a class="login_btn" href="{{ route('user.home') }}">@lang('My Account')</a>
                        @else
                            <a class="login_btn" href="{{ route('login') }}">@lang('log in')</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('script')
    <script>
        $(document).on('change', '.language', function () {
            window.location.href = "{{route('language')}}/" + $(this).val()
        });
    </script>
@endpush
