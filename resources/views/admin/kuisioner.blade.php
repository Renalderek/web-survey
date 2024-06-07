@include('admin.head');
@include('admin.header');
@include('admin.sidemenu');
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pertanyaan Kuisioner</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Kuisioner</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section kuisioner">
        <div class="row">


            <div class="col-lg-8">
                <div class="row">
                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-12">

                        <div class="card info-card customers-card">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Responden <span>| Saat ini</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>1244 User</h6>

                                </div>
                            </div>

                        </div>
                    </div>

                </div><!-- End Customers Card -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Laporan <span>Saat ini</span></h5>

                            <!-- Line grafik -->
                            <div id="reportsChart"></div>

                        </div>

                    </div>
                </div><!-- End Reports -->

            </div>
        </div><!-- End Left side columns -->
        </div>
    </section>

</main>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kelola Pertanyaan Kuisioner</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.kuisioner.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan Kuisioner</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Pertanyaan</button>
                    </form>

                    <hr>

                    <h3>Daftar Pertanyaan</h3>
                    <ul class="list-group">
                        @foreach ($kuisioners as $kuisioner)
                            <li class="list-group-item">{{ $kuisioner->pertanyaan }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@include('admin.footer');
