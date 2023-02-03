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
                            <label for="exampleInputTenkh" class="form-label">Tên khách hàng</label>
                            <input type="text" name="ten_kh" class="form-control" id="exampleInputTenkh"
                                placeholder="Nhập tên khách hàng" value="{!! !empty($user) ? old('ten_kh', $user->tenkh) : old('ten_kh') !!}">
                            @error('ten_kh')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                            <input type="text" name="sdt" class="form-control" id="exampleInputSdt"
                                placeholder="Nhập số điện thoại" value="{!! !empty($user) ? old('sdt', $user->sdt) : old('sdt') !!}">
                            @error('sdt')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <fieldset class="mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input"
                                        @if (!empty($user)) {!! old('gioi_tinh', $user->gioitinh) == 'nam' ? 'checked' : '' !!}@else {!! old('gioi_tinh') == 'nam' ? 'checked' : '' !!} @endif
                                        type="radio" name="gioi_tinh" id="gridRadios1" value="nam">
                                    <label class="form-check-label" for="gridRadios1">
                                        Nam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"
                                        @if (!empty($user)) {!! old('gioi_tinh', $user->gioitinh) == 'nữ' ? 'checked' : '' !!}@else {!! old('gioi_tinh') == 'nữ' ? 'checked' : '' !!} @endif
                                        type="radio" name="gioi_tinh" id="gridRadios2" value="nữ">
                                    <label class="form-check-label" for="gridRadios2">
                                        Nữ
                                    </label>
                                </div>
                                @error('gioi_tinh')
                                    <span class="error-message">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>
                        <div class="mb-3">
                            <label for="exampleInputNgaySinh" class="form-label">Ngày sinh</label>
                            <input type="date" name="ngay_sinh" value="{!! !empty($user) ? old('ngay_sinh', $user->ngaysinh) : old('ngay_sinh') !!}" class="form-control"
                                id="exampleInputNgaySinh">
                            @error('ngay_sinh')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="dia_chi" id="floatingTextarea" style="height: 150px;">{!! !empty($user) ? old('dia_chi', $user->diachi) : old('dia_chi') !!}</textarea>
                            <label for="floatingTextarea">Địa chỉ</label>
                            @error('dia_chi')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail"
                                value="{!! !empty($user) ? old('email', $user->email) : old('email') !!}" placeholder="Nhập email">
                            @error('email')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Mật khẩu</label>
                            <input type="password" name="mat_khau" class="form-control" id="exampleInputPassword"
                                value="{!! !empty($user) ? old('mat_khau', $user->matkhau) : old('mat_khau') !!}" placeholder="Nhập mật khẩu">
                            @error('mat_khau')
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
