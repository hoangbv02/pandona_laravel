@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Sửa đơn hàng</h6>
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputIdkh" class="form-label">Khách hàng</label>
                            <select class="form-select mb-3" name="id_kh" aria-label="Default select example"
                                id="exampleInputIdkh">
                                <option>--Chọn--</option>
                                @if (!empty($users))
                                    @foreach ($users as $user)
                                        <option {{ old('id_kh', $order->idkh) == $user->idkh ? 'selected' : '' }}
                                            value="{{ $user->idkh }}">
                                            {{ $user->tenkh }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('id_kh')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputIdsp" class="form-label">Sản phẩm</label>
                            <select class="form-select mb-3" name="id_sp" aria-label="Default select example"
                                id="exampleInputIdsp">
                                <option>--Chọn--</option>
                                @if (!empty($products))
                                    @foreach ($products as $product)
                                        <option {{ old('id_sp', $orderDetails->idsp) == $product->idsp ? 'selected' : '' }}
                                            value="{{ $product->idsp }}">{{ $product->tensp }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('id_sp')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSoluong" class="form-label">Số lượng</label>
                            <input type="number" name="so_luong" class="form-control" id="exampleInputSoluong"
                                placeholder="Nhập số lượng" value="{{ old('so_luong', $orderDetails->soluong) }}">
                            @error('so_luong')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                            <input type="number" name="sdt" class="form-control" id="exampleInputSdt"
                                placeholder="Nhập số điện thoại" value="{{ old('sdt', $order->sdt) }}">
                            @error('sdt')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputNgay" class="form-label">Ngày đặt hàng</label>
                            <input type="date" name="ngay_dat_hang"
                                value="{{ old('ngay_dat_hang', $order->ngaydathang) }}" class="form-control"
                                id="exampleInputNgay">
                            @error('ngay_dat_hang')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" form-floating mb-3">
                            <textarea class="form-control" name="dia_chi" id="floatingTextarea" style="height: 150px;">{{ old('dia_chi', $order->diachi) }}</textarea>
                            <label for="floatingTextarea">Địa chỉ</label>
                            @error('dia_chi')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTrangThai" class="form-label">Trạng thái</label>
                            <select class="form-select mb-3" name="trang_thai" aria-label="Default select example"
                                id="exampleInputTrangThai">
                                <option>--Chọn--</option>
                                <option {{ old('trang_thai', $order->trangthai) == '0' ? 'selected' : '' }} value="0">
                                    Đã đặt hàng
                                </option>
                                <option {{ old('trang_thai', $order->trangthai) == '1' ? 'selected' : '' }} value="1">
                                    Đã giao hàng
                                </option>
                            </select>
                            @error('trang_thai')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Sửa đơn hàng</button>
                        <button type="reset" class="btn btn-light">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
