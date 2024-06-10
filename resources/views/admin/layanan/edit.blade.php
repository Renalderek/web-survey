<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Layanan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.layanan.update', $layanan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Layanan</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $layanan->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="bidang_id">Bidang</label>
                            <select class="form-control" id="bidang_id" name="bidang_id" required>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}"
                                        @if ($layanan->bidang_id == $bidang->id) selected @endif>{{ $bidang->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form method="POST" action="{{ route('admin.layanan.delete', $layanan->id) }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
