@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Danh sách sản phẩm</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.products.add') }}" class="btn btn-outline-primary m-2">Thêm sản phẩm<i
                                class="ms-2 fa-solid fa-plus"></i></a>
                        <form class="d-md-flex w-50" action="{{ route('admin.products.search') }}" method="get">
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
                                    <th scope="col">Mã Sản phẩm</th>
                                    <th scope="col">Ảnh sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($products))
                                    <tr>
                                        <td colspan="10">Không có sản phẩm nào!</td>
                                    </tr>
                                @else
                                    @foreach ($products as $product)
                                        <tr>
                                            <td scope="row">{{ $product->idsp }}</td>
                                            <td><img src="{{ asset('frontend/img/' . $product->anh . '') }}" width="80px"
                                                    height="80px" alt=""></td>
                                            <td>{{ $product->tensp }}</td>
                                            <td>{{ $product->tenloai }}</td>
                                            <td>{{ $product->soluong }}</td>
                                            <td>{{ number_format($product->gia, 0, ',', '.') }}đ</td>
                                            <td>{{ $product->mtsp }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.products.delete', ['id' => $product->idsp, 'image' => $product->anh]) }}"
                                                        class="d-block btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    <a href="{{ route('admin.products.edit', ['id' => $product->idsp]) }}"
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

