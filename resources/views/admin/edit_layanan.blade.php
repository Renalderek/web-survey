@include('admin.head')
@include('admin.header')
@include('admin.sidemenu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit layanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.layanan') }}">Layanan</a></li>
                <li class="breadcrumb-item active">Edit layanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit layanan</h5>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.layanan.update', $layanan->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namalayanan">Nama layanan</label>
                                <input type="text" class="form-control" id="namalayanan" name="nama_layanan" value="{{ $layanan->nama_layanan }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('admin.footer')
