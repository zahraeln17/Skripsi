<div class="container mb-5">
    <!-- Page Content -->
    <?php if (isset($questions) && $questions ) {
        if ($status == "on-progress") {
    ?>
            <div class="row mb-4">
                <div class="col-lg-12 text-right text-gray-600">
                    <!-- Page Number -->
                    <!-- <?= $userId ?> -->
            
                    <p>Halaman 
                    <?php $currentAnswer = 1; ?>
                    <?php if ($countAnswered == 0): ?>
                        1
                    <?php else: ?>
                        <?php foreach ($countAnswered as $row): ?>
                            <?php $currentAnswer = $row->count + 1; ?>
                            <?= $currentAnswer; ?>
                        <?php endforeach; ?>
                    <?php endif; ?> / 
                    <?= $totalQuestions ?></p>
                </div>
                <div class="col-lg-12 mt-3">
                    <h5 class="text-dark pt-3 font-weight-bold">
                        <?= $questions->title ?>
                    </h5>
                    <h5 class="text-dark font-weight-bold">
                    <?= $questions->title ? $questions->sub_title  : '' ?>
                    </h5>
                    <div class="card text-white shadow" style="background-color: #2d2c73; color: white;">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="text-white">  <?= $questions->questioner_text ?></div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <!-- start form question -->
                                    <form class="justify-content-center mt-3 pt-4 mb-5" method="post" action="<?= base_url('votes/storeQuestionAnswer'); ?>">
                                        <input type="hidden" name="questioners_id" value="<?= $questions->id ?>">
                                        <div class="row">
                                            <div class="col-md-3 mt-3">
                                                Sangat Tidak Setuju
                                            </div>
                                            <div class="col-md-6 ">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-2">
                                                        <div class="d-flex justify-content-between align-items-start align-items-lg-center">
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-auto">1</div>
                                                                <div>
                                                                    <input type="radio" name="answer" id="answer-1" value="1" required>
                                                                </div>
                                                            </div>
                                                            <!-- Add more columns for additional items -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex justify-content-between align-items-start align-items-lg-center">
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-auto">2</div>
                                                                <div>
                                                                    <input type="radio" name="answer" id="answer-2" value="2" required>
                                                                </div>
                                                            </div>
                                                            <!-- Add more columns for additional items -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex justify-content-between align-items-start align-items-lg-center">
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-auto">3</div>
                                                                <div>
                                                                    <input type="radio" name="answer" id="answer-3" value="3" required>
                                                                </div>
                                                            </div>
                                                            <!-- Add more columns for additional items -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex justify-content-between align-items-start align-items-lg-center">
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-auto">4</div>
                                                                <div>
                                                                    <input type="radio" name="answer" id="answer-4" value="4" required>
                                                                </div>
                                                            </div>
                                                            <!-- Add more columns for additional items -->
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="d-flex justify-content-between align-items-start align-items-lg-center">
                                                            <div class="d-flex flex-column">
                                                                <div class="mb-auto">5</div>
                                                                <div>
                                                                    <input type="radio" name="answer" id="answer-5" value="5" required>
                                                                </div>
                                                            </div>
                                                            <!-- Add more columns for additional items -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-3">
                                                Sangat Setuju
                                            </div>
                                        </div>
                                        <!-- Floating Button -->
                                        <button type="submit" class="btn btn-danger float-button" >
                                            <i class="fas fa-chevron-right mr-2"></i> <?= $currentAnswer == $totalQuestions ? 'Finish'  : 'Next' ?>
                                        </button>
                                    </form>
                                    <!-- end form question -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    <?php } else  if ($status == "finish") { ?>
        <div class="row">
                <div class="col-lg-12 mt-5">    
                    <div class="card text-white shadow" style="background-color: #2d2c73; color: white;">
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <div class="text-white"> Terimakasih Telah Menajawab hingga selesai. Data yang ada masukan sangat berarti bagi riset kami. <br/> Klik Selesai untuk keluar dari halaman ini.</div>
                                    <div class="text-white"> <button class="btn btn-primary mt-5">Selesai</button></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    <?php  } } else { ?>
    <!-- Outer Row -->
    <div class="row justify-content-center mb-4">

        <div class="col-lg-12">

            <div class="card o-hidden border-0 shadow-lg my-5" style="color: #2D2C73;">
                <div class="card-body p-0">
                    <h5 class="card-title">Information</h5>
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4 mt-4" style="color: #2D2C73;">No Question Available></h1>
                                </div>
                                <div class="text-center" id="intro">
                                    <h1 class="h4 mb-4 mt-4" style="color: red;">Please Reload This Page.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>