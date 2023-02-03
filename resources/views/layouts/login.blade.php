@extends('layouts.client')
@section('content')
    <form action="" method="post" class="form">
        @csrf
        <h2>Đăng Nhập</h2>
        <div class="form__wrapper">
            <div class="form-control">
                <label for="email">Email</label>
                <input placeholder="Nhập email" class="form-input" type="email" name="email" id="email">
            </div>
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <div class="form-control">
                <label for="matkhau">Mật khẩu</label>
                <input class="form-input" placeholder="Nhập mật khẩu" type="password" name="mat_khau" id="matkhau">
            </div>
            @error('mat_khau')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <input class="btn primary" type="submit" name="submit" value="Đăng Nhập">
            <input class="btn" type="reset" name="reset" value="Nhập lại">
        </div>
        <a href="{{ route('register') }}">Đăng ký tài khoản?</a>
    </form>
@endsection
@if (session('message'))
    @section('script')
        <script>
            Swal.fire({
                position: 'center',
                icon: '{{ is_array(session('message')) ? session('message')[0] : 'success' }}',
                title: '{{ is_array(session('message')) ? session('message')[1] : session('message') }}',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endsection
@endif
