<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= $title; ?></title>
</head>

<body>
<div class="container">
    <h2 class="text-center mt-3 mb-4">Membuat Grafik Dengan CodeIgniter 4</h2>
    <div class="row">
        <!-- Bar Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Program Studi</h6>
                </div>
                <div class="card-body">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Grafik Jenis Kelamin</h6>
                </div>
                <div class="card-body">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Daftar Mahasiswa -->
    <div class="row mt-5">
        <div class="col-12">
            <h5 class="mb-3">Daftar Nama Mahasiswa</h5>
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($mhs['nim']); ?></td>
                            <td><?= esc($mhs['nama']); ?></td>
                            <td><?= esc($mhs['prodi']); ?></td>
                            <td><?= esc($mhs['jenis_kelamin']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/js/sb-admin-2.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>

<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Bar Chart
    var ctxBar = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: [<?php foreach ($program_studi as $prodi) echo "'" . $prodi['prodi'] . "',"; ?>],
            datasets: [{
                label: "Jumlah",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [<?php foreach ($program_studi as $prodi) echo $prodi['jumlah'] . ","; ?>],
                borderWidth: 1
            }],
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    gridLines: { display: false, drawBorder: false },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: { beginAtZero: true },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        drawBorder: false,
                        zeroLineColor: "rgb(234, 236, 244)"
                    }
                }]
            },
            legend: { display: false },
            tooltips: {
                backgroundColor: "rgb(92, 210, 221)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            }
        }
    });

    // Pie Chart
    var ctxPie = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ["Laki-laki", "Perempuan"],
            datasets: [{
                data: [<?php foreach ($jenis_kelamin as $jenkel) echo $jenkel['jumlah'] . ","; ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgb(255, 0, 0)"
            }]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255, 255, 255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10
            },
            cutoutPercentage: 70
        }
    });
</script>

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="text-center  p-5" style="background-color:rgb(255, 255, 255);">
        © <?= date('Y'); ?> Wahyu Eko Suroso. All rights reserved.
    </div>
</footer>

</body>
</html>
