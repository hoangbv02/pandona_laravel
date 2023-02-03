@extends('layouts.client')
@section('content')
    <h2 class="text-center">Kết quả tìm kiếm: {{ $q ?? '' }}</h2>
    <h3>Sản phẩm phù hợp nhất</h3>
    <div class="body row">
        @if (empty($products))
            <div>Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn.</div>
        @else
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-6 col-6 p-2">
                    <form action="{{ route('carts.add', ['id' => $product->idsp]) }}" method="post" class="product__item">
                        @csrf
                        <a href="{{ route('product-details', ['id' => $product->idsp]) }}"><img
                                src="{{ asset('frontend/img/' . $product->anh . '') }}" alt="" class="item__img" /><a>
                                <div class="item__body">
                                    <h3 class="title">
                                        <a
                                            href="{{ route('product-details', ['id' => $product->idsp]) }}">{{ $product->tensp }}</a>
                                    </h3>
                                    <div class="price">{{ number_format($product->gia, 0, ',', '.') }}đ</div>
                                    <input type="submit" value="Thêm vào giỏ hàng" class="btn btn__prd">
                                </div>
                    </form>
                </div>
            @endforeach
        @endif
    </div>
@endsection
