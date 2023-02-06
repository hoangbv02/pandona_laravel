@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Thêm sản phẩm</h6>
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputTenloai" class="form-label">Tên loại</label>
                            <select class="form-select mb-3" name="id_loai" aria-label="Default select example"
                                id="exampleInputTenloai">
                                <option>--Chọn--</option>
                                @if (!empty($categorys))
                                    @foreach ($categorys as $category)
                                        <option {{ $category->idloai == old('id_loai') ? 'selected' : '' }}
                                            value="{{ $category->idloai }}">{{ $category->tenloai }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('id_loai')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputTensp" class="form-label">Tên sản phẩm</label>
                            <input type="text" name="ten_san_pham" class="form-control" id="exampleInputTensp"
                                placeholder="Nhập tên sản phẩm" value="{{ old('ten_san_pham') }}">
                            @error('ten_san_pham')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSoLuong" class="form-label">Số lượng</label>
                            <input type="number" name="so_luong" class="form-control" id="exampleInputSoLuong"
                                placeholder="Nhập số lượng" value="{{ old('so_luong') }}">
                            @error('so_luong')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputGia" class="form-label">Giá</label>
                            <input type="number" name="gia" class="form-control" id="exampleInputGia"
                                placeholder="Nhập giá" value={{ old('gia') }}>
                            @error('gia')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Ảnh</label>
                            <input class="form-control" name="anh" type="file" id="formFile"
                                value="{{ old('anh') }}">
                            @error('anh')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="mo_ta" id="floatingTextarea" style="height: 150px;">{{ old('mo_ta') }}</textarea>
                            <label for="floatingTextarea">Mô tả</label>
                            @error('mo_ta')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        <button type="reset" class="btn btn-light">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
