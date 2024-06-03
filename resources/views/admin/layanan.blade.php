@include('admin.head');

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
                            <label for="nama">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Layanan</button>
                    </form>

                    <hr>

                    <h3>Daftar Layanan</h3>
                    <ul class="list-group">
                        @foreach ($layanans as $layanan)
                            <li class="list-group-item">{{ $layanan->nama_layanan }} (Bidang:
                                {{ $layanan->bidang->nama_bidang }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer');
