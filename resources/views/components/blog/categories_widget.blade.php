
<div class="widgets-item pt-0">
    <h2 class="widgets-title mb-4">Категории</h2>
    <ul class="widgets-category">
        @foreach ($categories as $category)
            <li>
                <a href="#">
    {{--                <i class="fa fa-chevron-right"></i>--}}
                    {{ $category->name }} {{--<span>(65)</span>--}}
                </a>
            </li>
        @endforeach
    </ul>
</div>
