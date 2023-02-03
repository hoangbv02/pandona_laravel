@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Chi tiết đơn hàng</h4>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Mã code</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($orderDetails))
                                    <tr>
                                        <td colspan="10">Không có sản phẩm nào!</td>
                                    </tr>
                                @else
                                    @foreach ($orderDetails as $item)
                                        <tr>
                                            <td><img src="{{ asset('frontend/img/' . $item->anh . '') }}" width="80px"
                                                    height="80px" alt=""></td>
                                            <td scope="row">{{ $item->dhcode }}</td>
                                            <td>{{ $item->tensp }}</td>
                                            <td>{{ number_format($item->gia, 0, ',', '.') }}đ</td>
                                            <td>{{ $item->sl }}</td>
                                            <td>{{ number_format($item->tongtien, 0, ',', '.') }}đ</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
