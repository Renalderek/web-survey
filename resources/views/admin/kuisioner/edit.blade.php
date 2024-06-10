<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Pertanyaan Kuisioner</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.kuisioner.update', $kuisioner->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan Kuisioner</label>
                            <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                                value="{{ $kuisioner->pertanyaan }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                    <form method="POST" action="{{ route('admin.kuisioner.delete', $kuisioner->id) }}" class="mt-2">
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
