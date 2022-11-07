@extends('layouts.app')
@section('content')
@php $word = explode(',',$list->pj_word); @endphp
@php $pdf = explode(',',$list->pj_pdf); @endphp
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title">
                                <i class="bi bi-file-earmark-text"></i>
                                {{ $list->pj_name }}
                            </h5>
                        </div>
                        <div class="col-md-2 text-end" style="margin-top: 1rem;">
                            <span class="badge {{ $list->p_status_color }}">
                                <i class="{{ $list->p_status_icon }} me-1"></i>
                                {{ $list->p_status_name }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe src="{{ asset('plan/pdf/'.end($pdf)) }}" style="width: 100%;height: 720px;border: none;"></iframe>
                        </div>
                        <div class="col-md-6">
                            <form action="" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">
                                        <i class="bi bi-person-square"></i>
                                        ผู้จัดทำ
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{ $list->pj_author }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">
                                        <i class="bi bi-envelope"></i>
                                        หน่วยงาน
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{ $list->h_name }}" readonly>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">
                                        <i class="bi bi-coin"></i>
                                        งบประมาน
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="text" value="{{ $list->bud_name." : xx,xxx บาท" }}" readonly>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('pm.file_update',$list->pj_id) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('POST') }}
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">
                                        <i class="bi bi-file-earmark-word text-primary"></i>
                                        Word
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="docFile" name="docFile" accept=".doc, .docx, .rtf" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-3 col-form-label">
                                        <i class="bi bi-file-earmark-pdf text-danger"></i>
                                        PDF
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" id="pdfFile" name="pdfFile" accept=".pdf" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-success btn-block"
                                                onclick="Swal.fire({
                                                    title: 'ยืนยันการอัพโหลดไฟล์ใหม่ ?',
                                                    text: 'ต้องมีการแนบไฟล์ทั้ง Word และ PDF',
                                                    showCancelButton: true,
                                                    confirmButtonText: `อัพโหลด`,
                                                    cancelButtonText: `ยกเลิก`,
                                                    icon: 'warning',
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            form.submit();
                                                        } else if (result.isDenied) {
                                                            form.reset();
                                                        }
                                                    })"
                                            >
                                                <i class="bi bi-cloud-upload"></i>
                                                อัพโหลดเอกสารใหม่
                                            </button>
                                          </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <form action="{{ route('pm.list_status',$list->pj_id) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-3 col-form-label">
                                            <i class="bi bi-card-checklist"></i>
                                            สถานะ
                                        </label>
                                        <div class="col-sm-9">
                                            <select name="pj_status" class="form-select">
                                                @foreach ($stat as $res)
                                                <option value="{{ $res->p_status_id }}"
                                                {{ ($res->p_status_id == $list->pj_status) ? 'SELECTED' : '' }}>
                                                    {{ $res->p_status_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <div class="d-grid">
                                                <button type="button" class="btn btn-primary btn-block" {{ ($list->pj_status == 9) ? 'disabled' : '' }}
                                                    onclick="Swal.fire({
                                                        title: 'ยืนยันการอัพเดตสถานะ ?',
                                                        showCancelButton: true,
                                                        confirmButtonText: `อัพเดต`,
                                                        cancelButtonText: `ยกเลิก`,
                                                        icon: 'success',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                form.submit();
                                                            } else if (result.isDenied) {
                                                                form.reset();
                                                            }
                                                        })"
                                                    >
                                                    <i class="bi bi-check-circle-fill"></i>
                                                    อัพเดตสถานะ
                                                </button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                            <h5 class="card-title">
                                <i class="bi bi-clock-history"></i>
                                ไฟล์เอกสาร : Log
                            </h5>
                            <ul class="list-group">
                                @foreach ($word as $words)
                                <li class="list-group-item">
                                    <a href="{{ asset('plan/word/'.$words) }}" target="_blank">
                                        <i class="bi bi-file-word"></i>
                                        {{ $words }}
                                    </a>
                                </li>
                                @endforeach
                                @foreach ($pdf as $pdfs)
                                <li class="list-group-item">
                                    <a href="{{ asset('plan/pdf/'.$pdfs) }}" target="_blank">
                                        <i class="bi bi-file-pdf text-danger"></i>
                                        {{ $pdfs }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
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
