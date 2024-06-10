<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Bidang</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Bidang</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $bidang->nama }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form method="POST" action="{{ route('admin.bidang.delete', $bidang->id) }}" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
