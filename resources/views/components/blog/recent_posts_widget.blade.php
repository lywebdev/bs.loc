@php
    $latestPosts = \App\Models\Blog\Post::orderBy('id', 'desc')->limit(15)->get();
@endphp

<div class="widgets-item">
    <h2 class="widgets-title mb-4">Последнее</h2>
    <div class="swiper-container widgets-list-slider">
        <div class="swiper-wrapper">
            @foreach ($latestPosts as $latestPost)
                @if (!$loop->last)
                    <div class="swiper-slide">
                        <div class="widgets-list-item">
                            @if ($latestPost->preview)
                                <div class="widgets-list-img">
                                    <a href="#">
                                        <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($latestPost->preview) }}" alt="Blog Images">
                                    </a>
                                </div>
                            @endif
                            <div class="widgets-list-content">
                                <div class="widgets-meta">
                                    <ul>
                                        <li class="date">
                                            {{ \Illuminate\Support\Carbon::parse($latestPost->created_at)->translatedFormat('j F Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="title mb-0">
                                    <a href="#">{{ $latestPost->title }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="swiper-slide without-border">
                        <div class="widgets-list-item">
                            @if ($latestPost->preview)
                                <div class="widgets-list-img">
                                    <a href="#">
                                        <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($latestPost->preview) }}" alt="Blog Images">
                                    </a>
                                </div>
                            @endif
                            <div class="widgets-list-content">
                                <div class="widgets-meta">
                                    <ul>
                                        <li class="date">
                                            {{ \Illuminate\Support\Carbon::parse($latestPost->created_at)->translatedFormat('j F Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <h2 class="title mb-0">
                                    <a href="#">{{ $latestPost->title }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
