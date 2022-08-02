@if (isset($latestPosts) && $latestPosts->count())
<!-- Begin Blog Area -->
<div class="blog-area section-space-bottom-100 {{ $classes ?? '' }}">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-title mb-7">Блог</h2>
            <p class="section-desc">Рассказываем интересное о нас</p>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container blog-slider">
                    <div class="swiper-wrapper">
                        @foreach ($latestPosts as $latestPost)
                            <div class="swiper-slide">
                                <div class="blog-item">
                                    <div class="blog-content">
                                        <div class="blog-meta">
                                            <ul>
{{--                                                <li class="author">--}}
{{--                                                    <a href="#">By: Admin</a>--}}
{{--                                                </li>--}}
                                                <li class="date">{{ \Illuminate\Support\Carbon::parse($latestPost->created_at)->translatedFormat('j F Y') }}</li>
                                            </ul>
                                        </div>
                                        <h2 class="title">
                                            <a href="{{ route('blog.show', $latestPost->slug) }}">{{ $latestPost->title }}</a>
                                        </h2>
                                        <p class="short-desc mb-7">{!! substr($latestPost->content, 0, 200) !!}</p>
                                    </div>
                                    @isset($latestPost->preview)
                                        <div class="blog-img img-hover-effect">
                                            <a href="{{ route('blog.show', $latestPost->slug) }}">
                                                <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($latestPost->preview) }}"
                                                     alt="Blog Image">
                                            </a>
                                            <div class="inner-btn-wrap">
                                                <a class="inner-btn" href="{{ route('blog.show', $latestPost->slug) }}">
                                                    <i class="pe-7s-link"></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End Here -->
@endisset
