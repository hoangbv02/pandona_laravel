@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Danh sách đơn hàng</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.orders.add') }}" class="btn btn-outline-primary m-2">Thêm đơn hàng<i
                                class="ms-2 fa-solid fa-plus"></i></a>
                        <form action="{{ route('admin.orders.search') }}" class="d-md-flex w-50" method="get">
                            <input class="form-control border-0" type="search" name="q" placeholder="Tìm kiếm..."
                                value="{{ $q ?? '' }}">
                            <button type="submit" class="btn btn-square btn-primary ms-2"><i
                                    class="fa-solid fa-search"></i></button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Mã code</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ngày đặt hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($orders))
                                    <tr>
                                        <td colspan="10">Không có đơn hàng nào!</td>
                                    </tr>
                                @else
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->iddh }}</th>
                                            <td>{{ $order->dhcode }}</td>
                                            <td>{{ $order->tenkh }}</td>
                                            <td>{{ $order->sdtdh }}</td>
                                            <td>{{ $order->dcdh }}</td>
                                            <td>{{ $order->ngaydathang }}</td>
                                            <td>{{ !empty($order->trangthai) ? 'Đã giao hàng' : 'Đã đặt hàng' }}</td>
                                            <td>{{ number_format($order->tongtien, 0, ',', '.') }}đ</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.orders.details', ['id' => $order->dhcode]) }}"
                                                        class="d-block btn btn-info">
                                                        <i class="fa-solid fa-eye"></i></a>
                                                    <a href="{{ route('admin.orders.delete', ['id' => $order->dhcode]) }}"
                                                        class="d-block btn btn-danger">
                                                        <i class="fa-solid fa-trash"></i></a>
                                                    <a href="{{ route('admin.orders.edit', ['id' => $order->dhcode]) }}"
                                                        class="d-block btn btn-light"><i
                                                            class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @include('admin.blocks.paging')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
