@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Danh sách loại sản phẩm</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="{{ route('admin.categorys.add') }}" class="btn btn-outline-primary m-2">Thêm loại sản phẩm<i
                                class="ms-2 fa-solid fa-plus"></i></a>
                        <form class="d-md-flex w-50" action="{{ route('admin.categorys.search') }}" method="get">
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
                                    <th scope="col">Mã loại</th>
                                    <th scope="col">Tên loại</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($categorys))
                                    <tr>
                                        <td colspan="10">Không có loại sản phẩm nào!</td>
                                    </tr>
                                @else
                                    @foreach ($categorys as $category)
                                        <tr>
                                            <th scope="row">{{ $category->idloai }}</th>
                                            <td>{{ $category->tenloai }}</td>
                                            <td>{{ $category->mota }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.categorys.delete', ['id' => $category->idloai]) }}"
                                                        class="d-block btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    <a href="{{ route('admin.categorys.edit', ['id' => $category->idloai]) }}"
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
