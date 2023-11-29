<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">HASIL KUISIONER</a>.</p>
    <!-- <a href="#" class="btn btn-primary mb-3">Tambah Kuisioner</a> -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
        </div>
        <div class="card-body">
            <div class="chart-bar">
                <canvas id="myBarChart"></canvas>
            </div>
            <hr>
            Styling for the bar chart can be found in the
            <code>/js/demo/chart-bar-demo.js</code> file.
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
                            <th>Question</th>
                            <th>Total User Answer</th>
                            <th>Result </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Question</th>
                            <th>Total User Answer</th>
                            <th>Result </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1;
                        foreach ($questions as $key => $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->questioner_text ?></td>
                                <td class="text-center"><?= $value->answer_count ?></td>
                                <td class="text-center" width="20%">
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo ($value->average_value / 5) * 100; ?>%;" aria-valuenow="<?php echo $value->average_value; ?>" aria-valuemin="0" aria-valuemax="5"> <?= intval($value->average_value) ?> out of 5</div>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>