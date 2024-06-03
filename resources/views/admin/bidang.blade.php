@include('admin.head');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kelola Bidang</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.bidang.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Bidang</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah Bidang</button>
                    </form>

                    <hr>

                    <h3>Daftar Bidang</h3>
                    <ul class="list-group">
                        @foreach ($bidangs as $bidang)
                            <li class="list-group-item">{{ $bidang->nama_bidang }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer');
