@extends('layouts.client')
@section('content')
    <div class="banner" id="banner">
        <div class="banner__conatiner row">
            <div class="banner__block col-lg-4">
                <img src="{{ asset('frontend/img/banner-1.png') }}" alt="" class="banner__img" />
                <div class="banner__inner">
                    <div class="banner__content">
                        <h2>TRANG SỨC BẠC</h2>
                        <span>Giảm 50%</span>
                        <a href="" class="btn primary btn__banner">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="banner__block col-lg-4">
                <img src="{{ asset('frontend/img/banner-2.png') }}" alt="" class="banner__img" />
                <div class="banner__inner">
                    <div class="banner__content">
                        <h2>TRANG SỨC HOT 2022</h2>
                        <span>Giảm 20%</span>
                        <a href="" class="btn primary btn__banner">Xem ngay</a>
                    </div>
                </div>
            </div>
            <div class="banner__block col-lg-4">
                <img src="{{ asset('frontend/img/banner-3.png') }}" alt="" class="banner__img" />
                <div class="banner__inner">
                    <div class="banner__content">
                        <h2>TRANG SỨC NỮ</h2>
                        <span>Giảm 40%</span>
                        <a href="" class="btn primary btn__banner">Xem ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="body row">
        <div class="category col-lg-3">
            <div class="sidebar">
                <div class="sidebar__filter">
                    <h3 class="sidebar__price-range">Khoảng giá</h3>
                    <ul class="sidebar__price-list">
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="0:999999999999" id="option0" class="sidebar__form-input"
                                checked />
                            <label for="option0">Tất cả</label>
                        </li>
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="0:1000000" id="option1" class="sidebar__form-input" />
                            <label for="option1">Nhỏ hơn 1.000.000₫</label>
                        </li>
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="1000000:3000000" id="option2" class="sidebar__form-input" />
                            <label for="option2">Từ 1.000.000₫ - 3.000.000₫</label>
                        </li>
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="3000000:7000000" id="option3" class="sidebar__form-input" />
                            <label for="option3">
                                Từ 3.000.000₫ - 7.000.000₫</label>
                        </li>
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="7000000:10000000" id="option4" class="sidebar__form-input" />
                            <label for="option4">Từ 7.000.000₫ - 10.000.000₫</label>
                        </li>
                        <li class="sidebar__price-item">
                            <input type="checkbox" value="10000000:999999999999" id="option5"
                                class="sidebar__form-input" />
                            <label for="option5">
                                Lớn hơn 10.000.000₫</label>
                        </li>
                    </ul>
                </div>
                <div class="sidebar__filter">
                    <h3 class="sidebar__price-range">
                        Loại sản phẩm
                    </h3>
                    <ul class="sidebar__filter-list">
                        @if (!empty($categorys))
                            @foreach ($categorys as $category)
                                <li class="sidebar__filter-item">
                                    <input type="checkbox" value="{{ $category->idloai }}" id="{{ $category->idloai }}"
                                        class="sidebar__input-type" />
                                    <label for="{{ $category->idloai }}">{{ $category->tenloai }}</label>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="ctproduct col-lg-9">
            <div class="ctproduct__head">
                <h2 class="ctproduct__title">Sản phẩm</h2>
                <div class="ctproduct__head-right">
                    <select name="sap_xep" id="sort">
                        <option value="">
                            --Lọc theo--
                        </option>
                        <option value="gia:asc">
                            Giá từ thấp tới cao
                        </option>
                        <option value="gia:desc">
                            Giá từ cao tới thấp
                        </option>
                        <option value="tensp:asc">
                            Chữ cái từ A-Z
                        </option>
                        <option value="tensp:desc">
                            Chữ cái từ Z-A
                        </option>
                    </select>
                </div>
            </div>
            <div class="row" id="ctproduct">

            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        var getType = {{ $id ?? '' }};
    </script>
    <script src="{{ asset('frontend/js/products.js') }}"></script>
    @if (session('message'))
        <script>
            Swal.fire({
                position: 'center',
                icon: '{{ is_array(session('message')) ? session('message')[0] : 'success' }}',
                title: '{{ is_array(session('message')) ? session('message')[1] : session('message') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
@endsection
