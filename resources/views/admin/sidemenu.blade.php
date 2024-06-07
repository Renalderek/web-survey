<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse"
                href="{{ route('admin.bidang') }}">
                <i class="bi bi-journal-text"></i><span>Form Bidang</span><i></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse"
                href="{{ route('admin.layanan') }}">
                <i class="bi bi-bar-chart"></i><span>Form Layanan</span><i></i>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.kuisioner') }}">
                <i class="bi bi-envelope"></i>
                <span>Form Kuisioner</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-card-list"></i>
                <span>Grafik Pengguna</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>LOGOUT</span>
            </a>
        </li><!-- End Logout Page Nav -->
    </ul>

</aside>
