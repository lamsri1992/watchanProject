@extends('layouts.app')
@section('content')

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">รายการทั้งหมด</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-inboxes"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>XX รายการ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">รายการที่อนุมัติแล้ว</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check2-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>XX รายการ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">รายการรอการอนุมัติ</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-x-circle"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>XX รายการ</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <img src="{{ asset('img/timeline.png') }}" class="img img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Recent Activity -->
                    <div class="card" style="height: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">
                                <i class="bi bi-card-checklist"></i>
                                การดำเนินการ
                            </h5>
                            <div class="activity">
                                <div class="activity-item d-flex">
                                    <div class="activite-label text-center">31 ต.ค. 65</div>
                                    <i class='bi bi-check-circle-fill activity-badge text-success align-self-start'></i>
                                    <div class="activity-content">
                                        Test Beta Version
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')

@endsection
