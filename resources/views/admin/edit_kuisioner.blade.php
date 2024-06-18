@include('admin.head')
@include('admin.header')
@include('admin.sidemenu')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit kuisioner</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.kuisioner') }}">kuisioner</a></li>
                <li class="breadcrumb-item active">Edit kuisioner</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Kuisioner</h5>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.kuisioner.update', $kuisioner->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="namakuisioner">Kuisioner</label>
                                <input type="text" class="form-control" id="namakuisioner" name="pertanyaan" value="{{ $kuisioner->pertanyaan }}" required>
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
