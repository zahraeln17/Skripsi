<div class="container">
    <!-- Page Content -->
    <div class="row">
        <div class="col-lg-12 text-right text-gray-600">
            <!-- Page Number -->
            <p>Halaman 1 / 30</p>
        </div>
        <div class="col-lg-12 mt-5">
            <h5 class="text-dark pt-3 font-weight-bold">
                Technology Acceptance Model (TAM)
            </h5>
            <h5 class="text-dark font-weight-bold">
                Perceived Easy Of Use
            </h5>
            <div class="card text-white shadow" style="background-color: #2d2c73; color: white;">
                <div class="card-body text-center">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <div class="text-white small"> Saya Merasa Spada UPI Mudah Untuk Dipelajari.</div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <!-- start form question -->
                            <form class="justify-content-center mt-3 pt-4 mb-5" method="post" action="<?= base_url('create'); ?>">
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
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
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
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
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
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
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
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
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
                                                            <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
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
                            </form>
                            <!-- end form question -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">
            <?php foreach ($questions as $question) : ?>
                <div class="card o-hidden border-0 shadow-lg my-5" style="color: #2D2C73;">
                    <div class="card-body p-0">
                        <h5 class="card-title"><?= $question->title; ?></h5>
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4 mt-4" style="color: #2D2C73;"><?= $question->questioner_text ?></h1>
                                    </div>
                                    <div class="text-center" id="intro">
                                        <h1 class="h4 mb-4 mt-4" style="color: red;"><b>HALLO!</b> I'm....</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Floating Button -->
<a href="#" class="btn btn-danger float-button">
    <i class="fas fa-chevron-right mr-2"></i> Next
</a>