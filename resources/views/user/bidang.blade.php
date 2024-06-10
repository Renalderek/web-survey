@include('admin.head')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pilih Bidang</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.bidang.submit') }}">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="bidang">Bidang</label>
                            <select class="form-control" id="bidang" name="bidang_id" required>
                                <i class="bi bi-chevron-down"></i>
                                @foreach ($bidangs as $bidang)
                                    <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
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
@include('admin.footer')
