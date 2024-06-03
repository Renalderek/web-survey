<!-- resources/views/components/form.blade.php -->

@props(['bidangOptions', 'layananOptions'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" required>
                        </div>

                        <div class="mb-3">
                            <label for="pendidikan_terakhir" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" class="form-control" id="pendidikan_terakhir"
                                name="pendidikan_terakhir" required>
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>

                        @if ($bidangOptions)
                            <div class="mb-3">
                                <label for="bidang" class="form-label">Bidang</label>
                                <select class="form-select" id="bidang" name="bidang" required>
                                    @foreach ($bidangOptions as $bidang)
                                        <option value="{{ $bidang->id }}">{{ $bidang->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        @if ($layananOptions)
                            <div class="mb-3">
                                <label for="layanan" class="form-label">Layanan</label>
                                <select class="form-select" id="layanan" name="layanan" required>
                                    @foreach ($layananOptions as $layanan)
                                        <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
