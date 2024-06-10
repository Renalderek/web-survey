@include('admin.head');
@include('admin.header');


@include('admin.sidemenu');
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Layanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Form Layanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section layanan">
        <div class="row">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Kelola Layanan</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.layanan.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="bidang_id">Bidang</label>
                                        <select class="form-control" id="bidang_id" name="bidang_id" required>
                                            @foreach ($bidangs as $bidang)
                                                <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="nama_layanan">Nama Layanan</label>
                                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                            required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Tambah Layanan</button>
                                </form>

                                <hr>

                                <h3>Daftar Layanan</h3>
                                <ul class="list-group">
                                    @foreach ($layanans as $layanan)
                                        <li class="list-group-item">{{ $layanan->nama_layanan }} (Bidang:
                                            {{ $layanan->bidang->nama_bidang }})
                                            <div>
                                                <a href="{{ route('admin.layanan.edit', $layanan->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form method="POST"
                                                    action="{{ route('admin.layanan.delete', $layanan->id) }}"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                                </form>
                                            </div>
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

</main>

@include('admin.footer');
