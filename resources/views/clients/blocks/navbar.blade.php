<div class="navbar container">
    <div class="navbar__item">
        <a class="navbar__link {{ request()->path() == '/' ? 'active' : '' }}" href="{{ route('index') }}">Trang chủ</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link {{ strpos(request()->path(), 'products') !== false ? 'active' : '' }}"
            href="{{ route('products') }}">Sản
            phẩm
            <i class="fa-sharp fa-solid fa-angle-down"></i></a>
        <ul class="menu__list">
            @if (!empty($categorys))
                @foreach ($categorys as $category)
                    <li class="menu__item"><i class="fa-solid fa-angle-right"></i><a
                            href="{{ route('products', ['id' => $category->idloai]) }}">{{ $category->tenloai }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Tin tức</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Giới thiệu</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Liên hệ</a>
    </div>
</div>
