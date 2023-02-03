@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">{{ $title }}</h6>
                    <form action="" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputTensp" class="form-label">Tên loại sản phẩm</label>
                            <input type="text" name="ten_loai"
                                value="{{ !empty($category) ? old('ten_loai', $category->tenloai) : old('ten_loai') }}"
                                class="form-control" id="exampleInputTensp" placeholder="Nhập tên loại sản phẩm">
                            @error('ten_loai')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="mo_ta" id="floatingTextarea" style="height: 150px;">{{ !empty($category) ? old('mo_ta', $category->mota) : old('mo_ta') }}</textarea>
                            <label for="floatingTextarea">Mô tả</label>
                            @error('mo_ta')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $title }}</button>
                        <button type="reset" class="btn btn-light">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
