<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">HASIL KUISIONER</a>.</p>
    <!-- <a href="#" class="btn btn-primary mb-3">Tambah Kuisioner</a> -->
    <!-- DataTales Example -->
    <div class="row">
        <?php if (isset($chart_data)) : ?>
            <?php foreach ($chart_data as $key => $value) : ?>
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> <?= $value['subTitle'] ?></h6>
                        </div>
                        <div class="card-body mb-5">
                            <div class="chart-bar mb-5" style="width: 600px; overflow-x: auto;">
                                <canvas id="myBarChart-<?= $key ?>"></canvas>
                            </div>
                            <hr>
                            Keterangan :
                            <ul>
                                <?php foreach ($value['list_questions'] as $key => $question) {
                                    echo  $question['id'].' => '. $question['question'].'<br/>';
                                } ?>
                                   
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
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