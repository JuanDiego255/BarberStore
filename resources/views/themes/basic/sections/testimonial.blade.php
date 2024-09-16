@if(isset($templates['testimonial'][0]) && $testimonial = $templates['testimonial'][0])
    <section class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="section_header text-center">
                    <h2>@lang(optional($testimonial->description)->title)</h2>
                    <p class="title_details pb-45">@lang(optional($testimonial->description)->short_title)</p>
                </div>
            </div>
            <div class="row g-5 g-md-4">
                <div class="col-md-6 col-12">
                    <div class="row align-items-center">
                        <div class="col-4 ">
                            <div class="testimonial_thamnail" data-aos="fade-left">
                                @if(isset($contentDetails['testimonial']))
                                    @foreach($contentDetails['testimonial'] as $key=>$data)
                                        <div class="image_area">
                                            <img
                                                src="{{getFile(config('location.content.path').'thumb_'.optional(optional(optional($data->content)->contentMedia)->description)->image)}}"
                                                alt="...">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="image_area testimonial_slider">
                                @if(isset($contentDetails['testimonial']))
                                    @foreach($contentDetails['testimonial'] as $key=>$data)
                                        <div class="image_area">
                                            <img
                                                src="{{getFile(config('location.content.path').optional(optional(optional($data->content)->contentMedia)->description)->image)}}"
                                                alt="">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-auto" data-aos="fade-right">
                    <div class="content_area testimonial_slider">
                        @if(isset($contentDetails['testimonial']))
                            @foreach($contentDetails['testimonial'] as $key=>$data)
                                <div class="text_area d-flex align-items-center">
                                    <div class="text_area_inner">
                                        <div class="section_header d-flex pb-40">
                                            <img
                                                src="{{ asset($themeTrue. 'images/quotes.png') }}"
                                                alt="">
                                            <div class="text">
                                                <h5 class="heading">@lang(optional($data->description)->name)</h5>
                                                <p>@lang(optional($data->description)->designation)</p>
                                            </div>
                                        </div>
                                        <p class="description">
                                            @lang(optional($data->description)->description)
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
