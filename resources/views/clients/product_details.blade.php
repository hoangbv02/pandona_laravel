@extends('layouts.client')
@section('content')
    @if (!empty($product))
        <div class="product__single">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <img src="{{ asset('frontend/img/' . $product->anh) }}" alt="" />
                </div>
                <div class="col-lg-6 col-12">
                    <form action="{{ route('carts.add', ['id' => $product->idsp]) }}" method="post"
                        class="product__single-info">
                        @csrf
                        <h2 class="product__single-title">
                            {{ $product->tensp }}
                        </h2>
                        <p class="product__single-price">{{ number_format($product->gia, 0, ',', '.') }}đ</p>
                        <p class="product__single-type">Loại sản phẩm: {{ $product->tenloai }}</p>
                        <p class="product__single-type">Mô tả loại sản phẩm: {{ $product->mtloai }}</p>
                        <div class="product__single-quantity">
                            <label for="input-quantity">Số lượng :</label>
                            <span class="down">-</span>
                            <input type="text" value="1" id="input-quantity" name="so_luong" />
                            <span class="up">+</span>
                            <input type="hidden" value="{{ $product->gia }}" name="gia" />
                            <input type="hidden" value="{{ $product->soluong }}" name="sl" />
                            <input type="hidden" value="{{ $product->idsp }}" name="idsp" />
                        </div>
                        <div class="product__single-btn">
                            <button type="submit" class="btn" name='chi_tiet_san_pham'>
                                Thêm vào giỏ
                            </button>
                            <button type="button" class="btn" name='thanh_toan'>
                                Mua ngay
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="product__single-description">
                <div class="title">
                    <h3>
                        Mô tả
                    </h3>
                </div>
            </div>
            {{ $product->mtsp }}
        </div>
        <div class="product">
            <div class="product__heading">
                <h2 class="product__title">SẢN PHẨM LIÊN QUAN</h2>
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @if (empty($productList))
                        <div>Không có sản phẩm liên quan nào!</div>
                    @else
                        @foreach ($productList as $item)
                            <div class="swiper-slide col-12 col-md-6 col-lg-3 m-0">
                                <form action="{{ route('carts.add', ['id' => $item->idsp]) }}" method="post"
                                    class="product__item">
                                    @csrf
                                    <a href="{{ route('product-details', ['id' => $item->idsp]) }}"><img
                                            src="{{ asset('frontend/img/' . $item->anh . '') }}" alt=""
                                            class="item__img" /><a>
                                            <div class="item__body">
                                                <h3 class="title">
                                                    <a
                                                        href="{{ route('product-details', ['id' => $item->idsp]) }}">{{ $item->tensp }}</a>
                                                </h3>
                                                <div class="price">{{ number_format($item->gia, 0, ',', '.') }}đ</div>
                                                <input type="submit" value="Thêm vào giỏ hàng" class="btn btn__prd">
                                            </div>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif
@endsection
@section('script')
    <script>
        const valueIdsp = document.querySelector('input[name="idsp"]').value;
        const soLuong = document.querySelector('input[name="so_luong"]');
        const valueGia = document.querySelector('input[name="gia"]').value;
        const valueSl = document.querySelector('input[name="sl"]').value;
        const btnThanhToan = document.querySelector('button[name="thanh_toan"]');
        const down = document.querySelector('.down');
        const up = document.querySelector('.up');
        var valueSoLuong = soLuong.value;
        down.addEventListener('click', function() {
            if (soLuong.value > 0) {
                valueSoLuong = soLuong.value--;
            }
        })
        up.addEventListener('click', function() {
            if (valueSl - 1 > valueSoLuong)
                valueSoLuong = soLuong.value++;
        })
        btnThanhToan.addEventListener('click', function() {
            Swal.fire({
                title: 'Bạn có chắc không?',
                text: "Bạn không thể hoàn tác điều này!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location =
                        `pay?idsp=${valueIdsp}&soluong=${soLuong.value}&gia=${valueGia}`
                }
            })
        })
    </script>
@endsection
