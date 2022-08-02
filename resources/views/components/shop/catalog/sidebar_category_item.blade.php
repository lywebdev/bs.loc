<li>
    <a href="{{ route('catalog.category', $category->slug) }}">
{{--        <i class="fa fa-chevron-right"></i>--}}
        {{ $category->name }} <span>({{ $category->products->count() }})</span>
    </a>
</li>
