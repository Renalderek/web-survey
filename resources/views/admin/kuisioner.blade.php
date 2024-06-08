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

                    <div class="container">
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
                                                <input type="text" class="form-control" id="pertanyaan"
                                                    name="pertanyaan" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Tambah
                                                Pertanyaan</button>
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
                    </div>

                </div>
            </div>
    </section>

</main>
@include('admin.footer');
