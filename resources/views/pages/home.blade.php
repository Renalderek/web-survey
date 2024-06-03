@include('Home.head');
@include('Home.header');

<!-- Hero Section -->
<section id="hero" class="hero section">
    <div class="hero-bg">
        <img src=" assets-home/img/foto-puprd.jpg" alt="" />
    </div>
    <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="">
                Selamat Datang <br> di WEB <span>SURVEY KEPUASAN MASYARAKAT</span>
            </h1>
            <p class="">
                Di DINAS PEKERJAAN UMUM dan PENATAAN RUANG DAERAH<br />Kabupaten Kepulauan Sangihe
            </p>
            <div class="d-flex">
                <a href="{{ route('user.biodata') }}" class="btn-get-started">Mengisi Kuisioner</a>
            </div>

        </div>
    </div>
</section>
<!-- /Hero Section -->
@include('Home.footer');
