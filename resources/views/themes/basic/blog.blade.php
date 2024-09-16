@extends($theme . 'layouts.app')
@section('title', trans($title))
@section('content')
    <section class="recent_blog_area   all_product_area newsfeed_area">
        <div class="container">
            <div class="row g-xl-5 g-4">
                <div class="col-lg-8 order-2 order-lg-1">
                    @forelse($blogs as $key => $item)
                        <div class="single_card_area mb-5" data-aos="{{ $key % 2 != 0 ? 'fade-up' : 'fade-down' }}">
                            <div class="card_header">
                                <a href="{{ route('blogDetails', [slug(
                                optional($item->blogDetails)->title), $item->id]) }}">
                                    <img src="{{ getFile(config('location.blog.path') . $item->image) }}" alt="">
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="blog_content">
                                    <div class="section_overlay d-flex justify-content-center align-items-center">
                                        @lang(optional($item->blogDetails)->service_name)
                                    </div>
                                    <h5 class="card-title">
                                        <a class="blog_title" href="{{ route('blogDetails', [slug(optional($item->blogDetails)->title), $item->id]) }}">{{\Illuminate\Soporte\Str::limit(trans(optional($item->blogDetails)->title), 45)}}</a>
                                    </h5>
                                    <ul class="section_list d-flex justify-content-between">
                                        <li>
                                            <span class="blog_icon"><i class="fa-regular fa-calendar-check"></i></span>
                                            <span class="blog_date">{{ dateTime($item->created_at, 'd M Y') }}</span>
                                        </li>

                                        @if(optional($item->blogDetails)->author)
                                            <li>
                                                <span class="blog_icon"><i class="fa-solid fa-user-tag"></i></span>
                                                <span
                                                    class="blog_date">@lang(optional($item->blogDetails)->author)</span>
                                            </li>
                                        @endif
                                    </ul>
                                    <p class="card-text">@lang(Str::limit(optional($item->blogDetails)->description, 200))</p>
                                </div>
                                <div class="card_bottom d-flex align-items-center justify-content-between mt-3">
                                    <div class="left d-flex align-items-center">
                                        <a class="text-dark"
                                           href="{{ route('blogDetails', [slug(optional($item->blogDetails)->title), $item->id]) }}">@lang('READ MORE')
                                            <i class="fa-solid fa-arrow-right-long"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="d-flex flex-column justify-content-center py-5">
                            <h3 class="text-center mt-5 mb-3">@lang("Blog doesn't Available")</h3>
                            <a href="{{ route('blog') }}" class="text-center">
                                <button class="btn common_btn">@lang('Back')</button>
                            </a>
                        </div>
                    @endforelse
                    <div class="pagination_area" data-aos="fade-left">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                                {{ $blogs->links('partials.pagination') }}
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="side_bar">
                        <div class="search_area d-flex align-items-center mb-40">
                            <form action="{{ route('blog.search') }}" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                           placeholder="@lang('Buscar Here...')" value="{{ @request()->search }}"
                                           autocomplete="off">
                                    <button type="submit" class="input-group-text hover" id="basic-addon1"><i
                                            class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="recent_post_area cmn_bg_border mb-40" data-aos="fade-up">
                            <div class="section_header mb-30">
                                <h5>@lang('Recent Post')</h5>
                            </div>
                            @foreach ($blogs->take(3) as $item)
                                <a href="{{ route('blogDetails', [slug(optional($item->blogDetails)->title), $item->id]) }}"
                                   class="d-flex mb-30">
                                    <div class="image_area">
                                        <img src="{{ getFile(config('location.blog.path') . $item->image) }}" alt="">
                                    </div>
                                    <div class="text_area">
                                        <div class="recent_post_subtitle highlight">
                                            {{ dateTime($item->created_at, 'd M Y') }}</div>
                                        <div
                                            class="recent_post_title mt-15">@lang(optional($item->blogDetails)->title)</div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="categories_area cmn_bg_border" data-aos="fade-up">
                            <div class="section_header">
                                <h5 class="mb-40">@lang('Categories')</h5>
                            </div>
                            <ul class="categories_list">
                                @forelse($blogCategoría as $category)
                                    <li>
                                        <a
                                            href="{{ route('category.wise.blog', [@slug(optional($category->blogCategoríaDetails)->name), $category->id]) }}"><span>@lang($category->blogCategoríaDetails->name)</span>
                                            <span>{{ $category->blog_count }}</span>
                                        </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
