<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row d-flex justify-content-between">
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card text-white shadow h-10" style="background-color: #AF6666">
                <div class="card-body" style="min-height: 100px;">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Total Responden
                        </div>
                        <div class="h3 mt-3 font-weight-bold"><?= $user; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card text-white shadow h-10" style="background-color: #418C3F">
                <div class="card-body" style="min-height: 100px;">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Gender
                        </div>
                        <div class="mt-2">
                            <div class="d-flex justify-content-between fa-2x">
                                <span><i class="fas fa-male"></i> :<?= $laki; ?> </h3>
                                    <span><i class="fas fa-female ml-5"></i> :<?= $cewe; ?> </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-4">
            <div class="card text-white shadow h-10" style="background-color: #E5D434">
                <div class="card-body" style="min-height: 100px;">
                    <div class=" col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Program Studi
                        </div>
                        <div class="mt-2">
                            <div class="d-sm-flex align-items-center justify-content-between mb-0">
                                <span>ILMU KOMPUTER : <?= $ilkom; ?> </h1>
                                    <br>
                                    <span>P. ILMU KOMPUTER: <?= $pilkom; ?> </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!--- card 1 -->
    <div class="row d-flex justify-content-between">
        <div class="col-xl-5 col-md-3 mb-4">
            <div class="card text-white shadow h-10" style="background-color: #2D2C73">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Angkatan Mahasiswa
                        </div>

                        <!-- Chart Container -->
                        <canvas id="myChart" width="200" height="100"></canvas>

                        <script>
                            // Chart Data
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['2019', '2020', '2021', '2022'],
                                    datasets: [{
                                        label: 'Responses',
                                        data: [<?= $a2019 ?>, <?= $a2020 ?>, <?= $a2021 ?>, <?= $a2022 ?>], // Example data, replace with your data
                                        backgroundColor: [
                                            'rgba(255, 255, 255, 1)', // White background color
                                            'rgba(255, 255, 255, 1)',
                                            'rgba(255, 255, 255, 1)',
                                            'rgba(255, 255, 255, 1)',
                                        ],
                                        borderWidth: 0
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            min: 0,
                                            max: 50,
                                            stepSize: 1,
                                            color: 'rgba(255, 255, 255, 1)' // White text color
                                        },
                                        x: {
                                            beginAtZero: true,
                                            min: 0,
                                            max: 4,
                                            stepSize: 1,
                                            color: 'rgba(255, 255, 255, 1)' // White text color
                                        }
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <!-- card 2 -->
        <div class="col-xl-5 col-md-3 mb-4">
            <div class="card text-white shadow h-10" style="background-color: #711C09">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Angkatan Dosen
                        </div>
                        <!-- Chart Container -->
                        <canvas id="myChart2" width="200" height="100"></canvas>
                        <script>
                            // Chart Data
                            var ctx2 = document.getElementById('myChart2').getContext('2d');
                            var myChart2 = new Chart(ctx2, {
                                type: 'bar',
                                data: {
                                    labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
                                    datasets: [{
                                        label: 'Responses',
                                        data: [1, 2, 3, 4], // Example data, replace with your data
                                        backgroundColor: [
                                            'rgba(255, 255, 255, 1)', // White background color
                                            'rgba(255, 255, 255, 1)',
                                            'rgba(255, 255, 255, 1)',
                                            'rgba(255, 255, 255, 1)',
                                        ],
                                        borderWidth: 0
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            min: 0,
                                            max: 5,
                                            stepSize: 1,
                                            color: 'rgba(255, 255, 255, 1)' // White text color
                                        },
                                        x: {
                                            beginAtZero: true,
                                            min: 0,
                                            max: 4,
                                            stepSize: 1,
                                            color: 'rgba(255, 255, 255, 1)' // White text color
                                        }
                                    },
                                    legend: {
                                        display: false
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>