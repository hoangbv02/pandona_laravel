<div class="breadcrumb">
    <div class="breadcrumb__wrapper container">
        <a href="{{ route('index') }}">Trang chủ</a>
        <span>/</span>
        @if (strpos(request()->path(), '/'))
            @php
                $path = explode('/', request()->path());
                switch ($path[0]) {
                    case 'products':
                        foreach ($categorys as $category) {
                            if ($category->idloai == $path[1]) {
                                echo '<a href="">' . $category->tenloai . '</a>';
                            }
                        }
                        break;
                    case 'product_details':
                        echo '<a href="">' .
                            $product->tenloai .
                            '</a>
                                /<a href="">' .
                            $product->tensp .
                            '</a>';
                        break;
                }
            @endphp
        @else
            @switch(request()->path())
                @case('register')
                    <a href="">Đăng ký</a>
                @break

                @case('login')
                    <a href="">Đăng nhập</a>
                @break

                @case('products')
                    <a href="">Sản phẩm</a>
                @break

                @case('carts')
                    <a href="">Giỏ hàng</a>
                @break

                @case('search')
                    <a href="">Tìm kiếm</a>
                @break

                @case('info')
                    <a href="">Thông tin tài khoản</a>
                @break
            @endswitch
        @endif
    </div>
</div>
