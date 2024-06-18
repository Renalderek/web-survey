@include('admin.head')
@include('admin.header')
@include('admin.sidemenu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit Bidang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.bidang') }}">Bidang</a></li>
                <li class="breadcrumb-item active">Edit Bidang</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Bidang</h5>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.bidang.update', $bidang->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namaBidang">Nama Bidang</label>
                                <input type="text" class="form-control" id="namaBidang" name="nama_bidang" value="{{ $bidang->nama_bidang }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('admin.footer')
