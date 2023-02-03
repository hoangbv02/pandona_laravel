@extends('layouts.client')
@section('content')
    <h3 class="text-center mb-5 ">Tài khoản của bạn</h3>
    <div class="row info">
        <div class="col-lg-4 col-12">
            <div class="info__acc">
                <h4>Thông tin tài khoản</h4>
                <p>Tên: <span>{{ session('user')->tenkh }}</span></p>
                <p>Giới tính: <span>{{ session('user')->gioitinh }}</span></p>
                <p>Số điện thoại: <span>{{ session('user')->sdt }}</span></p>
                <p>Email: <span>{{ session('user')->email }}</span></p>
                <p>Ngày sinh: <span>{{ session('user')->ngaysinh }}</span></p>
                <p>Địa chỉ: <span>{{ session('user')->diachi }}</span></p>
            </div>
        </div>
        <div class="col-lg-8 col-12">
            <div class="info_history">
                <h4>Lịch sử giao dịch</h4>
                <table width="100%">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                        <th>Hành động</th>
                    </tr>
                    @if (!empty($orders))
                        @foreach ($orders as $order)
                            @if ($order->idkh !== session('user')->idkh)
                                <tr>
                                    <td colspan="10">Bạn chưa có đơn hàng nào!</td>
                                </tr>
                                @php
                                    break;
                                @endphp
                            @else
                                <tr>
                                    <td>
                                        @foreach ($orderDetails as $item)
                                            @if ($order->dhcode == $item->dhcode)
                                                <div class="info__sub">
                                                    <img src="{{ asset('frontend/img/' . $item->anh) }}" alt="">
                                                    <div class="info__sub-inner">
                                                        <a href="{{ route('product-details', ['id' => $item->idsp]) }}">
                                                            {{ $item->tensp }}</a>
                                                        <p>Số lượng: {{ $item->sl }}</p>
                                                        <p>Giá: {{ number_format($item->gia, 0, ',', '.') }}đ</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $order->ngaydathang }}</td>
                                    <td>{{ !empty($order->trangthai) ? 'Đã giao hàng' : 'Đã đặt hàng' }}</td>
                                    <td>{{ number_format($order->tongtien, 0, ',', '.') }}đ</td>
                                    <td>
                                        @if (empty($order->trangthai))
                                            <a href="{{ route('order-cancel', ['id' => $order->dhcode]) }}"
                                                class="btn primary">Hủy</a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
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
