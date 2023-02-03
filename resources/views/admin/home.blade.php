@extends('layouts.admin')
@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center p-4">
                    <i class="fa-solid fa-users fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng số người</p>
                        <h6 class="mb-0">{{ $sumUser ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng số sản phẩm</p>
                        <h6 class="mb-0">{{ $sumProduct ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-regular fa-calendar-minus fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng số đơn hàng chưa xử lý</p>
                        <h6 class="mb-0">{{ $sumOrderNoProcess ?? '' }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa-solid fa-circle-check fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng số đơn hàng đã giao thành công</p>
                        <h6 class="mb-0">{{ $sumOrderProcess ?? '' }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

