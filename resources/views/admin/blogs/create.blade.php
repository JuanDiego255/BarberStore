@extends('admin.layouts.app')
@section('title')
    @lang('Crear Blog')
@endsection
@section('content')
    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">
            <div class="media mb-4 justify-content-end">
                <a href="{{ route('admin.blog.list') }}" class="btn btn-sm  btn-primary mr-2">
                    <span><i class="fas fa-arrow-left"></i> @lang('Back')</span>
                </a>
            </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach ($languages as $key => $language)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : '' }}" data-toggle="tab"
                            href="#lang-tab-{{ $key }}" role="tab" aria-controls="lang-tab-{{ $key }}"
                            aria-selected="{{ $loop->first ? 'true' : 'false' }}">@lang($language->name)</a>
                    </li>
                @endforeach
            </ul>
            <div class="tab-content mt-2" id="myTabContent">
                @foreach ($languages as $key => $language)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="lang-tab-{{ $key }}"
                        role="tabpanel">
                        <form method="post" action="{{ route('admin.blog.store', $language->id) }}" class="mt-4"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @if ($loop->index == 0)
                                    <div class="col-sm-12 col-md-12 ">
                                        <label for="category_name"> @lang('Categoría Name') </label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            <option selected disabled>@lang('Categoría name')</option>
                                            @foreach ($blogCategory as $category)
                                                <option value="{{ $category->id }}">@lang(optional($category->blogCategoryDetails)->name)</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback d-inline-block mt-3">
                                            @error('category_id')
                                                @lang($message)
                                            @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                @endif
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group ">
                                        <label for="author"> @lang('Author') </label>
                                        <input type="text" name="author[{{ $language->id }}]"
                                            class="form-control  @error('author' . '.' . $language->id) is-invalid @enderror"
                                            value="{{ old('author' . '.' . $language->id) }}">
                                        <div class="invalid-feedback">
                                            @error('author' . '.' . $language->id)
                                                @lang($message)
                                            @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group ">
                                        <label for="author"> @lang('Service Name') </label>
                                        <input type="text" name="service_name[{{ $language->id }}]"
                                            class="form-control  @error('service_name' . '.' . $language->id) is-invalid @enderror"
                                            value="{{ old('service_name' . '.' . $language->id) }}">
                                        <div class="invalid-feedback">
                                            @error('service_name' . '.' . $language->id)
                                                @lang($message)
                                            @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 mt-3">
                                    <div class="form-group ">
                                        <label for="title"> @lang('Title') </label>
                                        <input type="text" name="title[{{ $language->id }}]"
                                            class="form-control  @error('title' . '.' . $language->id) is-invalid @enderror"
                                            value="{{ old('title' . '.' . $language->id) }}">
                                        <div class="invalid-feedback">
                                        </div>
                                        <div class="invalid-feedback">
                                            @error('title' . '.' . $language->id)
                                                @lang($message)
                                            @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12">
                                    <div class="form-group ">
                                        <label for="description"> @lang('Description') </label>
                                        <textarea
                                            class="form-control summernote
                                            @error('description' . '.' . $language->id) is-invalid @enderror"
                                            name="description[{{ $language->id }}]" id="summernote" rows="15"
                                            value="{{ old('description' . '.' . $language->id) }}">{{ old('description' . '.' . $language->id) }}
                                        </textarea>
                                        <div class="invalid-feedback">
                                            @error('description' . '.' . $language->id)
                                                @lang($message)
                                            @enderror
                                        </div>
                                        <div class="valid-feedback"></div>
                                    </div>
                                </div>
                                @if ($loop->index == 0)
                                    <div class="col-sm-12 col-md-4 d-block">
                                        <div class="form-group">
                                            <label for="image">{{ 'Image' }}</label>
                                            <div class="image-input ">
                                                <label for="image-upload" id="image-label"><i
                                                        class="fas fa-upload"></i></label>
                                                <input type="file" name="image" placeholder="@lang('Choose image')"
                                                    id="image">
                                                <img id="image_preview_container" class="preview-image"
                                                    src="{{ getFile(config('location.blog.path')) }}"
                                                    alt="@lang('preview image')">
                                            </div>
                                            @if (config('location.blog.path'))
                                                <span class="text-muted mb-2">{{ trans('Image size should be') }} {{ config('location.blog.size') }} {{ trans('px') }}</span>
                                            @endif
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button type="submit"
                                class="btn waves-effect waves-light btn-rounded btn-primary btn-block mt-3">@lang('Guardar')</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


@push('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/tagsinput.css') }}" />
@endpush
@push('js-lib')
    <script src="{{ asset('assets/admin/js/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/tagsinput.js') }}"></script>
@endpush


@push('js')

    <script>
        "use strict";
        $(document).ready(function(e) {

            $('#image').on("change",function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('.summernote').summernote({
                height: 250,
                callbacks: {
                    onBlurCodeview: function() {
                        let codeviewHtml = $(this).siblings('div.note-editor').find('.note-codable')
                            .val();
                        $(this).val(codeviewHtml);
                    }
                }
            });

            $('select').select2({
                selectOnClose: true
            });

        });


    </script>

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
