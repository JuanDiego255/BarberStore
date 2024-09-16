@extends('admin.layouts.app')

@section('title')
    @lang('Banner Configuración')
@endsection


@section('content')

    <div class="container-fluid">
        <div class="bd-callout bd-callout-warning my-4 m-md-0 ">
            <i class="fas fa-info-circle mr-2"></i> @lang("After changes logo/seo. Please clear your browser's cache to see changes.")
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card card-primary shadow">
                    <div class="card-body">


                        <form action="{{ route('admin.breadcrumbActualizar')}}" method="post"
                              enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        @csrf
                                        <div class="image-input">
                                            <label for="image-upload" id="image-label"><i
                                                    class="fas fa-upload"></i></label>
                                            <input type="file" name="banner" placeholder="@lang('Choose image')"
                                                   id="image">
                                            <img id="image_preview_container" class="preview-image"
                                                 src="{{getFile(config('location.logo.path').'banner.jpg') ? : 0}}"
                                                 alt="preview image">
                                        </div>
                                        @error('banner')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">



                                <div class="col-md-6">
                                    <div class="submit-btn-wrapper text-center mt-4">
                                        <button type="submit"
                                                class="btn waves-effect waves-light btn-primary btn-block btn-rounded">
                                            <span>@lang('Guardar Changes')</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection

@push('js')
    <script>
        $(document).ready(function (e) {
            "use strict";

            $('#image').on("change",function () {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

        });
    </script>
@endpush
