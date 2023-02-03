@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Thống kê sản phẩm</h4>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Loại sản phẩm</th>
                                    <th scope="col">Số lượng sản phẩm</th>
                                    <th scope="col">Tổng số lượng sản phẩm</th>
                                    <th scope="col">Giá cao nhất</th>
                                    <th scope="col">Giá thấp nhất</th>
                                    <th scope="col">Giá trung binh</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!empty($report))
                                    @foreach ($report as $item)
                                        <tr>
                                            <th scope="row">{{ $item->tenloai }}</th>
                                            <td>{{ $item->soluong }}</td>
                                            <td>{{ $item->tongsoluong }}</td>
                                            <td>{{ number_format($item->giacao, 0, ',', '.') }}đ</td>
                                            <td>{{ number_format($item->giathap, 0, ',', '.') }}đ</td>
                                            <td>{{ number_format(round($item->giatb), 0, ',', '.') }}đ</td>
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
