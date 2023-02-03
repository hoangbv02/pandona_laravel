<div class="btn-toolbar" role="toolbar">
    <div class="btn-group me-2" role="group" aria-label="First group">
        @if (!empty($sumPage) && !empty($page) && !empty($route))
            @if ($page > 1)
                <a href="{{ route('admin.' . $route . '.index', ['page' => $page - 1]) }}" class="btn btn-light"><i
                        class="fa-solid fa-chevron-left"></i></a>
            @endif
            @for ($i = 1; $i <= $sumPage && $sumPage > 1; $i++)
                @if ($i == $page)
                    <a href="{{ route('admin.' . $route . '.index', ['page' => $i]) }}"
                        class="btn btn-primary">{{ $i }}</a>
                @else
                    <a href="{{ route('admin.' . $route . '.index', ['page' => $i]) }}"
                        class="btn">{{ $i }}</a>
                @endif
            @endfor
            @if ($page < $sumPage)
                <a href="{{ route('admin.' . $route . '.index', ['page' => $page + 1]) }}" class="btn btn-light"><i
                        class="fa-solid fa-chevron-right"></i></a>
            @endif
        @endif
    </div>
</div>
