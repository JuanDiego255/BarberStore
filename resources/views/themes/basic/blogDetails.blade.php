@extends($theme . 'layouts.app')
@section('title', trans('Blog Details'))
@section('content')
    <section class="blog_details_area recent_blog_area all_product_area newsfeed_area">
        <div class="container">
            <div class="row g-lg-5 g-4">
                <div class="col-lg-8 order-2 order-lg-1">
                    <div class="single_card_area mb-5">
                        <div class="card_header">
                            <a href="#">
                                <img src="{{ getFile(config('location.blog.path') . $blogDetails->image) }}" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="blog_content">
                                <div class="section_overlay d-flex justify-content-center align-items-center">
                                    @lang(optional($blogDetails->blogDetails)->service_name)
                                </div>
                                <h5 class="card-title">
                                    <span class="blog_title" >@lang(optional($blogDetails->blogDetails)->title)</span>
                                </h5>
                                <ul class="section_list d-flex justify-content-between">
                                    <li>
                                        <span class="blog_icon"><i class="fa-regular fa-calendar-check"></i></span>
                                        <span class="blog_date">{{ dateTime($blogDetails->created_at, 'd M Y') }}</span>
                                    </li>
                                    <li>
                                        <span class="blog_icon"><i class="fa-solid fa-user-tag"></i></span>
                                        <span class="blog_date">@lang(optional($blogDetails->blogDetails)->author)</span>
                                    </li>
                                </ul>
                                <div class="card-text pt-15 pb-30">
                                    @lang(optional($blogDetails->blogDetails)->description)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2">
                    <div class="side_bar">
                        <div class="recent_post_area cmn_bg_border mb-40" data-aos="fade-up">
                            <div class="section_header mb-30">
                                <h5>@lang('Recent Post')</h5>
                            </div>
                            @forelse($recentBlog->take(3) as $blog)
                                <a href="#" class="d-flex mb-30">
                                    <div class="image_area">
                                        <img src="{{ getFile(config('location.blog.path') . $blog->image) }}" alt="">
                                    </div>
                                    <div class="text_area">
                                        <div class="recent_post_subtitle highlight">
                                            {{ dateTime($blogDetails->created_at, 'd M Y') }}</div>
                                        <div class="recent_post_title mt-20">@lang(optional($blogDetails->blogDetails)->title)</div>
                                    </div>
                                </a>
                            @empty
                            @endforelse
                        </div>
                        <div class="categories_area cmn_bg_border" data-aos="fade-up">
                            <div class="section_header">
                                <h5 class="mb-40">@lang('Categories')</h5>
                            </div>
                            <ul class="categories_list">
                                @forelse($blogCategory as $category)
                                    <li>
                                        <a
                                            href="{{ route('category.wise.blog', [@slug(optional($category->blogCategoryDetails)->name), $category->id]) }}"><span>@lang(optional($category->blogCategoryDetails)->name)</span>
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
