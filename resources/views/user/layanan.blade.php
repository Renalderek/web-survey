@include('admin.head');
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pilih Layanan</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.layanan.submit') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="layanan">Layanan</label>
                            <select class="form-control" id="layanan" name="layanan_id" required>
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_layanan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.footer');
