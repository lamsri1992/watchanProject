@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       <div class="col-md-10">
                           <h5 class="card-title">
                               <i class="bi bi-folder2-open"></i>
                               ข้อมูลแผนงานโครงการ
                           </h5>
                       </div>
                       <div class="col-md-2">
                           <div class="d-grid gap-2 mt-3">
                               <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPM">
                                   <i class="bi bi-clipboard-plus"></i>
                                   เพิ่มแผนงานโครงการใหม่
                                </button>
                            </div>
                        </div>
                   </div>
                    <table id="tableFilter" class="display" style="width: 100%;font-size:14px;">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    ID
                                </th>
                                <th>ชื่อโครงการ</th>
                                <th class="text-center" width="20%">แหล่งงบ</th>
                                <th class="text-center" width="15%">หน่วยบริการ</th>
                                <th class="text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $res)
                            <tr>
                                <td class="text-center">{{ $res->pj_id }}</td>
                                <td>
                                    <a href="{{ route('pm.list_show',$res->pj_id) }}">
                                        {{ $res->pj_name }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $res->bud_name }}</td>
                                <td class="text-center">{{ $res->h_name }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $res->p_status_color }}">
                                        <i class="{{ $res->p_status_icon }} me-1"></i>
                                        {{ $res->p_status_name }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2" class="text-center">
                                    <i class="bi bi-filter-square-fill"></i>
                                    Filter : กรองข้อมูล
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="addPM" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-clipboard-plus"></i>
                    เพิ่มแผนงานโครงการใหม่
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-clipboard"></i>
                                ระบุชื่อโครงการ
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-person-square"></i>
                                ผู้จัดทำ
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-envelope"></i>
                                หน่วยงาน
                            </label>
                            <div class="col-sm-10">
                                <select name="" class="form-select">
                                    <option>----- กรุณาเลือก -----</option>
                                    @foreach ($hos as $res)
                                    <option value="{{ $res->h_id }}">
                                        {{ $res->h_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-coin"></i>
                                แหล่งงบประมาน
                            </label>
                            <div class="col-sm-10">
                                <select name="" class="form-select">
                                    <option>----- กรุณาเลือก -----</option>
                                    @foreach ($budget as $res)
                                    <option value="{{ $res->bud_id }}">
                                        {{ $res->bud_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-cash-coin"></i>
                                งบประมานที่ใช้
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-file-earmark-word text-primary"></i>
                                ไฟล์ Word
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="docFile" name="docFile" accept=".doc, .docx, .rtf" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">
                                <i class="bi bi-file-earmark-pdf text-danger"></i>
                                ไฟล์ PDF
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="pdfFile" name="pdfFile" accept=".pdf" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-12 text-center">
                                <button type="button" class="btn btn-success"
                                    onclick="Swal.fire({
                                        title: 'บันทึกข้อมูล ?',
                                        text: 'กรุณาตรวจสอบข้อมูลให้ครบถ้วน ถูกต้อง',
                                        showCancelButton: true,
                                        confirmButtonText: `บันทึก`,
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
                                    บันทึกข้อมูล
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="bi bi-x-circle-fill"></i>
                                    ปิดหน้าต่าง
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#tableFilter').DataTable({
            oLanguage: {
                    oPaginate: {
                        sFirst: '<small>หน้าแรก</small>',
                        sLast: '<small>หน้าสุดท้าย</small>',
                        sNext: '<small>ถัดไป</small>',
                        sPrevious: '<small>กลับ</small>'
                    },
                    sSearch: '<small><i class="fa fa-search"></i> ค้นหา</small>',
                    sInfo: '<small>ทั้งหมด _TOTAL_ รายการ</small>',
                    sLengthMenu: '<small>แสดง _MENU_ รายการ</small>',
                    sInfoEmpty: '<small>ไม่มีข้อมูล</small>',
                },
            language : {
                    infoFiltered: '<small class="text-secondary"> | กรองข้อมูลจาก _MAX_ รายการ</small>'
                },
            initComplete: function () {
                this.api()
                    .columns([2,3])
                    .every(function () {
                        var column = this;
                        var select = $('<select class="form-select" style="font-size:14px;"><option value="">*</option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function () {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
        
                                column.search(val ? '^' + val + '$' : '', true, false).draw();
                            });
        
                        column
                            .data()
                            .unique()
                            .sort()
                            .each(function (d, j) {
                                select.append('<option value="' + d + '" style="font-size:14px;">' + d + '</option>');
                        });
                    });
                },
            });
        });
</script>
@endsection
