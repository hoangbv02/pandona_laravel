@foreach ($products as $product)
    <div class="col-lg-4 col-md-6 col-6 p-2">
        <form action="{{ route('carts.add', ['id' => $product->idsp]) }}" method="post" class="product__item">
            @csrf
            <a href="{{ route('product-details', ['id' => $product->idsp]) }}"><img
                    src="{{ asset('frontend/img/' . $product->anh . '') }}" alt="" class="item__img" /><a>
                    <div class="item__body">
                        <h3 class="title">
                            <a href="{{ route('product-details', ['id' => $product->idsp]) }}">{{ $product->tensp }}</a>
                        </h3>
                        <div class="price">{{ number_format($product->gia, 0, ',', '.') }}đ</div>
                        <input type="submit" value="Thêm vào giỏ hàng" class="btn btn__prd">
                    </div>
        </form>
    </div>
@endforeach
@if (empty($products))
    <div class="col">Không có sản phẩm nào!</div>
@endif
