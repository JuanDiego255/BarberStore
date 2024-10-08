@extends($theme.'layouts.app')
@section('title',$page_title)

@section('content')
    <section class="login_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 registration_form">
                    <div class="form-block py-5">
                        <form class="login-form" action="{{route('user.twoFA-Verify')}}"  method="post">
                            @csrf
                            <div class="signin">
                                <h3 class="title mb-30">@lang($page_title)</h3>
                                <div class="form-group mb-30">
                                    <input class="form-control" type="text" name="code" value="{{old('code')}}" placeholder="@lang('Code')" autocomplete="off">

                                    @error('code')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                    @error('error')<span class="text-danger  mt-1">{{ $message }}</span>@enderror
                                </div>

                                <div class="btn-area">
                                    <button class="common_btn" type="submit"><span>@lang('Submit')</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
