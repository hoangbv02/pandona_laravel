        <div class="header">
            <div class="header__top container">
                <div class="header__top-left">
                    <div class="contact">
                        <span>Địa chỉ</span>
                        <p>Số 209 Xã Đàn, Nam Đồng, Đống Đa, Hà Nội</p>
                    </div>
                    <div class="contact">
                        <span>HOTLINE</span>
                        <p>086.780.2860</p>
                    </div>
                </div>
                <a href="{{ route('index') }}" class="header__top-center">
                    <img src="{!! asset('frontend/img/logo.png') !!}" alt="" class="logo" />
                </a>
                <div class="header__top-right">
                    <form action="{{ route('search') }}" method="get" class="header__top-search">
                        <input type="text" placeholder="Tìm kiếm..." name="q" value="{{ $q ?? '' }}" />
                        <button type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <div id="search__box">
                        </div>
                    </form>
                    <div class="header__top-cart">
                        <a class="header__top-icon" href='{{ route('carts.index') }}'>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span>{{ $quantity ?? 0 }}</span>
                        </a>
                        <form action="{{ route('carts.pay') }}" method="post" class="header__cart">
                            @csrf
                            <h3>Giỏ hàng</h3>
                            <ul class="header__cart-list">
                                @if (empty($carts))
                                    <li class="header__cart-item">Chưa có sản phẩm nào được thêm vào giỏ hàng!</li>
                                @else
                                    @foreach ($carts as $cart)
                                        <li class="header__cart-item">
                                            <a href="{{ route('product-details', ['id' => $cart->idsp]) }}">
                                                <img src="{{ asset('frontend/img/' . $cart->anh) }}" alt="">
                                                <div class="header__cart-info">
                                                    <h4>{{ $cart->tensp }}</h4>
                                                    <p>Số lượng: {{ $cart->sl }}</p>
                                                    <span>Tổng giá:
                                                        {{ number_format($cart->tonggia, 0, ',', '.') }}đ</span>
                                                    <a href="{{ route('carts.delete', ['id' => $cart->idgh]) }}"><i
                                                            class="header__cart-icon fa-solid fa-trash-can"></i><a>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                            <h4 class="header__cart-sum">Tạm tính :
                                {{ !empty($total_money) ? number_format($total_money, 0, ',', '.') : 0 }}đ</h4>
                            <div class="header__cart-btn">
                                <a href="{{ route('carts.index') }}" class="btn">Xem giỏ hàng</a>
                                <button type="submit" class="btn primary">Thanh toán</button>
                            </div>
                        </form>
                    </div>
                    <div class="header__top-user">
                        @if (session('user'))
                            <div class="header__user-login">
                                <img src="{{ asset('frontend/img/user.jpg') }}" alt="user">
                            </div>
                            <ul class="header__action-list">
                                <li class="header__action-item"><a href="{{ route('info') }}">Thông tin tài khoản</a>
                                </li>
                                <li class="header__action-item"><a href="{{ route('logout', ['auth' => 'user']) }}">Đăng
                                        xuất</a></li>
                            </ul>
                        @else
                            <span class="header__top-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <ul class="header__action-list">
                                <li class="header__action-item"><a href="{{ route('login') }}">Đăng nhập</a></li>
                                <li class="header__action-item"><a href="{{ route('register') }}">Đăng ký tài
                                        khoản</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
