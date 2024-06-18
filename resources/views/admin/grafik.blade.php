@include('admin.head')
@extends('admin.header')

@include('admin.sidemenu')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Grafik Jawaban Kuisioner</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Grafik</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section grafik">
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Grafik Jawaban Kuisioner</div>

                            <div class="card-body">
                                <canvas id="jawabanKuisionerChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Left side columns -->
    </section>

</main>

@include('admin.footer')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('jawabanKuisionerChart').getContext('2d');

        var jawabanLabels = {!! json_encode($jawabanData->keys()) !!};
        var jawabanValues = {!! json_encode($jawabanData->values()) !!};

        var userJawabanLabels = {!! json_encode($userJawabanData->keys()) !!};
        var userJawabanValues = {!! json_encode($userJawabanData->values()) !!};

        var jawabanKuisionerChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: jawabanLabels,
                datasets: [{
                    label: 'Jumlah Jawaban',
                    data: jawabanValues,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    fill: false,
                    tension: 0.1
                }, {
                    label: 'Jumlah Pengguna',
                    data: userJawabanValues,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    fill: false,
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
