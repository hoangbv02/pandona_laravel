@extends('layouts.client')
@section('content')
    <form action="{{ route('carts.pay') }}" method="post" class="cart">
        @csrf
        <h2>Giỏ hàng</h2>
        <table width="100%">
            <tr class="cart__row-header">
                <th colspan="5">Thông tin chi tiết sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Tổng giá</th>
            </tr>
            @if (empty($carts))
                <tr>
                    <td>Chưa có sản phẩm nào được thêm vào giỏ hàng!</td>
                </tr>
            @else
                @foreach ($carts as $cart)
                    <tr class="cart__row">
                        <td colspan="5">
                            <div class="cart__info">
                                <img src="{{ asset('frontend/img/' . $cart->anh) }}" alt="" />
                                <div class="cart__info-inner">
                                    <a class="cart__info-title" href="">
                                        {{ $cart->tensp }}
                                    </a>
                                    <a class="cart__info-del" href="{{ route('carts.delete', ['id' => $cart->idgh]) }}"><i
                                            class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </td>
                        <td>{{ number_format($cart->gia, 0, ',', '.') }}đ</td>
                        <td>
                            <div class="cart__amount">
                                <a href="{{ route('carts.down', ['id' => $cart->idsp]) }}">-</a>
                                <input type="number" disabled value="{{ $cart->sl }}" />
                                <a href="{{ route('carts.up', ['id' => $cart->idsp]) }}">+</a>
                            </div>
                        </td>
                        <td>{{ number_format($cart->tonggia, 0, ',', '.') }}đ</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="cart__footer">
            <span name="tong">Tổng tiền: {{ number_format($total_money, 0, ',', '.') }}đ</span>
            <div class="group-btn w-100 d-flex justify-content-between">
                @if (!empty($carts))
                    <a class="btn" href="{{ route('carts.delete-all') }}">Xóa tất cả</a>
                @endif
                <div class="cart__buy-mobile">
                    <a class="btn" href="{{ route('products') }}">Tiếp tục mua hàng</a>
                    <button class="btn primary" onclick="handlePay()" type="submit">Thanh toán</button>
                </div>
            </div>
        </div>
    </form>
@endsection
@if (session('message'))
    @section('script')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endsection
@endif
