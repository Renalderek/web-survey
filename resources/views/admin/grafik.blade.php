@include('admin.head')
@extends('admin.header')

@include('admin.sidemenu')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Grafik Pengguna Berdasarkan Pekerjaan</h1>
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
                            <div class="card-header">Grafik Pengguna Berdasarkan Pekerjaan</div>

                            <div class="card-body">
                                <canvas id="pekerjaanChart"></canvas>
                                <button id="printPDF" class="btn btn-primary mt-3">Cetak PDF</button>
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
<script src="https://cdn.jsdelivr.net/npm/dom-to-image@2.6.0/dist/dom-to-image.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById('pekerjaanChart').getContext('2d');

        var pekerjaanLabels = {!! json_encode($pekerjaanData->keys()) !!};
        var pekerjaanValues = {!! json_encode($pekerjaanData->values()) !!};

        // Define colors for each job
        var backgroundColors = [
            'rgba(255, 99, 132, 0.2)', // PNS
            'rgba(54, 162, 235, 0.2)', // Swasta
            'rgba(255, 206, 86, 0.2)', // Ibu Rumah Tangga
            'rgba(75, 192, 192, 0.2)', // TNI/POLRI
            'rgba(153, 102, 255, 0.2)', // Wiraswasta
            'rgba(255, 159, 64, 0.2)', // Mahasiswa
            'rgba(201, 203, 207, 0.2)' // Wartawan
        ];

        var borderColors = [
            'rgba(255, 99, 132, 1)', // PNS
            'rgba(54, 162, 235, 1)', // Swasta
            'rgba(255, 206, 86, 1)', // Ibu Rumah Tangga
            'rgba(75, 192, 192, 1)', // TNI/POLRI
            'rgba(153, 102, 255, 1)', // Wiraswasta
            'rgba(255, 159, 64, 1)', // Mahasiswa
            'rgba(201, 203, 207, 1)' // Wartawan
        ];

        var pekerjaanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: pekerjaanLabels,
                datasets: [{
                    label: 'Jumlah Pengguna',
                    data: pekerjaanValues,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
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

        document.getElementById('printPDF').addEventListener('click', function() {
            domtoimage.toPng(document.getElementById('pekerjaanChart'))
                .then(function(blob) {
                    var pdf = new jspdf.jsPDF('landscape');
                    pdf.addImage(blob, 'PNG', 10, 10, 280, 150);
                    pdf.save('grafik-pekerjaan.pdf');
                });
        });
    });
</script>
