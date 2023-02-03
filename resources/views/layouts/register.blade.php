@extends('layouts.client')
@section('content')
    <form action="" method="post" class="form">
        @csrf
        <h2>Đăng ký</h2>
        <div class="form__wrapper">
            <div class="">
                <label for="ten">Tên</label>
                <input class="form-input" type="text" name="ten_kh" id="ten" placeholder="Nhập tên">
                @error('ten_kh')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="sdt">Số điện thoại</label>
                <input class="form-input" type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại">
                @error('sdt')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-gender">
                <label for="gioitinh">Giới tính:</label>
                <div>
                    Nam: <input type="radio" name="gioi_tinh" value="Nam" id="gioitinh">
                    Nữ: <input type="radio" name="gioi_tinh" value="Nữ" id="gioitinh">
                </div>
                @error('gioi_tinh')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="ngaysinh">Ngày sinh</label>
                <input class="form-input" type="date" name="ngay_sinh" id="ngaysinh">
            </div>
            @error('ngay_sinh')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="form-address">
                <label for="diachi">Địa chỉ</label>
                <textarea class="" name="dia_chi" id="diachi"
                    style="height: 100px; width: 70%;border: 1px solid var(--primary-color-text);"></textarea>
            </div>
            @error('dia_chi')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="">
                <label for="email">Email</label>
                <input class="form-input" type="email" name="email" id="email" placeholder="Nhập email">
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
            <div class="">
                <label for="matkhau">Mật khẩu</label>
                <input class="form-input" type="password" placeholder="Nhập mật khẩu" name="mat_khau" id="matkhau">
                @error('mat_khau')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form__btn">
            <input class="btn primary" type="submit" value="Đăng ký">
            <input class="btn" type="reset" name="reset" value="Nhập lại">
        </div>
        <a href="{{ route('login') }}">Đã có tài khoản!</a>
    </form>
@endsection
@if (session('message'))
    @section('script')
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('message') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endsection
@endif
