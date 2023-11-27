<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-xl-3 col-md-6 ms-4">
            <div class="card text-white shadow h-10" style="background-color: #AF6666">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Total Responden
                        </div>
                        <div class="h4 mt-2 font-weight-bold"><?= $user; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-2 ms-4">
            <div class="card text-white shadow h-10" style="background-color: #418C3F">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Gender
                        </div>
                        <div class="mt-2">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <span><i class="fas fa-male"></i> :<?= $laki; ?> </h1>
                                <span><i class="fas fa-female"></i> :<?= $cewe; ?> </h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-2 ms-4">
            <div class="card text-white shadow h-10" style="background-color: #E5D434">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Program Studi
                        </div>
                        <div class="mt-2">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <span>ILKOM  : <?= $ilkom; ?> </h1>
                                <span>P.ILKOM: <?= $pilkom; ?> </h1>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-2 ms-4">
            <div class="card text-white shadow h-10" style="background-color: #2D2083">
                <div class="card-body">
                    <div class="col-py-0">
                        <div class="font-weight-bold text-uppercase">
                            Angkatan
                        </div>
                        <div class="h4 mt-2 font-weight-bold">-</div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>