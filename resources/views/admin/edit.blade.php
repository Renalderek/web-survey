@include('admin.head');
@extends('admin.header');

@include('admin.sidemenu');
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Bidang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <div class="card-header">Edit Bidang</div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="nama_bidang">Nama Bidang</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="nama_bidang"
                                            value="{{ $bidang->nama_bidang }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Update Bidang</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
        </div>
    </section>

</main>

@include('admin.footer');
