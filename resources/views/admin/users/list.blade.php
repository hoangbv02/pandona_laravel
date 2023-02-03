@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h4 class="mb-4">Danh sách khách hàng</h4>
                    <div class="d-flex justify-content-between align-items-center mb-3 row">
                        <a href="{{ route('admin.users.add') }}" class="btn btn-outline-primary ms-2 col-12 col-lg-3">Thêm
                            khách hàng<i class="ms-2 fa-solid fa-plus"></i></a>
                        <form class="d-md-flex w-50 col-12 col-lg-9"
                            action="{{ route('admin.users.search', ['page' => 1]) }}" method="get">
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
                                    <th scope="col">Mã khách hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Giới tính</th>
                                    <th scope="col">Ngày sinh</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (empty($users))
                                    <tr>
                                        <td colspan="10">Không có khách hàng nào!</td>
                                    </tr>
                                @else
                                    @foreach ($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user->idkh }}</th>
                                            <td>{{ $user->tenkh }}</td>
                                            <td>{{ $user->sdt }}</td>
                                            <td>{{ $user->gioitinh }}</td>
                                            <td>{{ $user->ngaysinh }}</td>
                                            <td>{{ $user->diachi }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.users.delete', ['id' => $user->idkh]) }}"
                                                        class="d-block btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                    <a href="{{ route('admin.users.edit', ['id' => $user->idkh]) }}"
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

