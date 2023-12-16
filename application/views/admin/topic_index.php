<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">Topics</p>
    <a href="<?= base_url('admin/create_topic') ?>" class="btn btn-primary mb-3">Tambah Topic</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Lengkap Topics.</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive small">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php $no = 1;
                        foreach ($topics as $key => $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->title ?></td>
                                <td><?= $value->sub_title ?></td>
                                <td width="15%">
                                    <a href="<?= base_url('admin/edit_topic/' . $value->id) ?>" class="btn btn-sm btn-warning btn-small"> <i class="fas fa-pencil-alt"></i> </a>
                                    <a href="<?= base_url('admin/delete_topic/' . $value->id) ?>" class="btn btn-sm btn-danger btn-small"><i class="fas fa-trash"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>