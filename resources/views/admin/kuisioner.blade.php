@include('admin.head');
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
</div>
@include('admin.footer');
