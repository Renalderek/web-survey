@include('admin.head');
@include('admin.header');

<body>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>BIODATA</h1>
        </div>
        <section class="section">
            <div class="row">
                <div class="">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Masukan Data Diri</h5>


                            <form method="POST" action="{{ route('user.biodata.submit') }}">
                                @csrf
                                <div class="row mb-3">
                                    <label id="nama" name="nama" class="col-sm-2 col-form-label">Nama
                                        Lengkap</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label id="alamat" name="alamat" class="col-sm-2 col-form-label">Alamat
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="alamat" name="alamat">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label id="nomor_hp" name="nomor_hp" class="col-sm-2 col-form-label">Nomor Hp
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nomor_hp" name="nomor_hp">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label id="pendidikan_terakhir" name="pendidikan_terakhir"
                                        class="col-sm-2 col-form-label">Pendidikan Terakhir
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pendidikan_terakhir"
                                            name="pendidikan_terakhir">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label id="pekerjaan" name="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan
                                    </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main><!-- End #main -->


</body>
@include('admin.footer');
