<div class="blog-item blog-list-item">
    <div class="blog-content">
        <div class="blog-meta">
            <ul>
{{--                <li class="author">--}}
{{--                    <a href="#">By: Admin</a>--}}
{{--                </li>--}}
                <li class="date">{{ \Illuminate\Support\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}</li>
            </ul>
        </div>
        <h2 class="title">
            <a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a>
        </h2>
        <p class="short-desc mb-7">{!! substr($post->content, 0, 200) !!}</p>
    </div>
    @if ($post->preview)
        <div class="blog-img img-hover-effect">
            <a href="{{ route('blog.show', $post->slug) }}">
                <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($post->preview) }}" alt="Blog Image">
            </a>
            <div class="inner-btn-wrap">
                <a class="inner-btn" href="{{ route('blog.show', $post->slug) }}">
                    <i class="pe-7s-link"></i>
                </a>
            </div>
        </div>
    @endif
</div>
