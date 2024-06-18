@include('admin.head');
@extends('admin.header');

@include('admin.sidemenu');
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Form Bidang</h1>
        <nav>
            <ol class="breadcrumb">
<!-- Suggested code may be subject to a license. Learn more: ~LicenseLog:2094511397. -->
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Bidang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section bidang">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Kelola Bidang</div>

                            <section class="section bidang">
                                <div class="row">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8">


                                                <div class="card-body">
                                                    @if (session('success'))
                                                        <div class="alert alert-success">
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif

                                                    <form method="POST" action="{{ route('admin.bidang.store') }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="nama_bidang">Nama Bidang</label>
                                                            <input type="text" class="form-control" id="nama_bidang"
                                                                name="nama_bidang" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mt-3">Tambah
                                                            Bidang</button>
                                                    </form>

                                                    <hr>

                                                    <h3>Daftar Bidang</h3>
                                                    <ul class="list-group">
                                                        @foreach ($bidangs as $bidang)
                                                            <li
                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                {{ $bidang->nama_bidang }}
                                                                <div>
                                                                    <a href="{{ route('admin.bidang.edit', $bidang->id) }}"
                                                                        class="btn btn-sm btn-warning">Edit</a>
                                                                    <form method="POST"
                                                                        action="{{ route('admin.bidang.delete', $bidang->id) }}"
                                                                        style="display:inline;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div><!-- End Left side columns -->
                        </div>
    </section>
    </div>
    </div>
    </div>
    </div>
    </div><!-- End Left side columns -->
    </div>
    </section>

</main>

@include('admin.footer');
