<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">เมนูผู้ใช้งาน</li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? '' : 'collapsed' }}" 
                href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Nav -->
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('list*')) ? '' : 'collapsed' }}" 
                href="{{ route('pm.list') }}">
                <i class="bi bi-folder2-open"></i>
                <span>ข้อมูลแผนงานโครงการ</span>
            </a>
        </li><!-- End PM Nav -->
        <li class="nav-item" hidden>
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-calendar-event"></i>
                <span>ปฏิทินแผนงานโครงการ</span>
            </a>
        </li><!-- End Calendar Nav -->
        <li class="nav-item" hidden>
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>ข้อมูลแผนงานโครงการ</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>ปีงบประมาณ 2566</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>ปีงบประมาณ 2565</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->
        <li class="nav-heading">คู่มือการใช้งาน</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ asset('files/flow.pdf') }}" target="_blank">
                <i class="bi bi-patch-question"></i>
                <span>ขั้นตอนการอนุมัติ</span>
            </a>
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-patch-question"></i>
                <span>วิธีส่งแผนงานโครงการ</span>
            </a>
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-patch-question"></i>
                <span>วิธีติดตามแผนงานโครงการ</span>
            </a>
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-patch-question"></i>
                <span>วิธีสืบค้นแผนงานโครงการ</span>
            </a>
        </li><!-- End Nav -->
        <li class="nav-heading">ดาวน์โหลด</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ asset('files/th-sarabun-psk.zip') }}" target="_blank">
                <i class="bi bi-download"></i>
                <span>ดาวน์โหลด TH-Sarabun-PSK</span>
            </a>
            <a class="nav-link collapsed" href="{{ asset('files/frm_2.docx') }}" target="_blank">
                <i class="bi bi-download"></i>
                <span>ดาวน์โหลดแบบฟอร์มแนวตั้ง</span>
            </a>
            <a class="nav-link collapsed" href="{{ asset('files/frm_1.doc') }}" target="_blank">
                <i class="bi bi-download"></i>
                <span>ดาวน์โหลดแบบฟอร์มแนวนอน</span>
            </a>
        </li><!-- End Nav -->
    </ul>
</aside><!-- End Sidebar-->
