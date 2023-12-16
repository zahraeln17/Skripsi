<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">HASIL KUESIONER</p>

    <div class="row">
        <?php if (isset($chart_data)) : ?>
            <?php foreach ($chart_data as $key => $value) : ?>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <?= $value['subTitle'] ?></h6>
                        </div>
                        <div class="card-body mb-5">
                            <h6 class="m-0 text-primary"> <?= $value['title'] ?></h6>
                            <div class="chart-bar mb-5" style="width: 100%; overflow-x: auto;">
                                <canvas id="myBarChart-<?= $key ?>"></canvas>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>

                <script>
                    // Parse JSON data and options
                    var chartData<?= $key ?> = <?= $value['data']; ?>;
                    var chartOptions<?= $key ?> = <?= $value['options']; ?>;

                    chartOptions<?= $key ?>.plugins = chartOptions<?= $key ?>.plugins || {};
                    chartOptions<?= $key ?>.plugins.tooltip = {
                        callbacks: {
                            title: (context) => {
                                console.log(context[0].label)
                                return context[0].label.replaceAll(',', ' ');
                            }
                        }
                    };

                    chartOptions<?= $key ?>.scales = chartOptions<?= $key ?>.scales || {};

                    var maxDataValue = Math.max(...chartData<?= $key ?>.datasets[0].data);

                    var maxYValue = Math.min(maxDataValue, 100);
                    chartOptions<?= $key ?>.scales = {
                        yAxes: [{
                            display: true,
                            ticks: {
                                max: 100,  
                                stepSize: 10,
                                beginAtZero: true 
                            }
                        }]
                    }
                    

                    var ctx<?= $key ?> = document.getElementById('myBarChart-<?= $key ?>').getContext('2d');

                    var myBarChart<?= $key ?> = new Chart(ctx<?= $key ?>, {
                        type: 'bar',
                        data: chartData<?= $key ?>,
                        options: chartOptions<?= $key ?>
                    });
                </script>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Lengkap Draft Kuisioner.</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <!-- Dynamically generated column headers -->
                        <?php
                        foreach ($result_tables[0] as $columnName => $value) {
                            if ($columnName !== 'user_name') {
                                echo "<th>$columnName</th>";
                            }
                        }
                        ?>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($result_tables as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['user_name'] ?></td>
                            <!-- Dynamically generated column values -->
                            <?php
                            foreach ($row as $columnName => $value) {
                                if ($columnName !== 'user_name') {
                                    echo "<td>$value</td>";
                                }
                            }
                            ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

