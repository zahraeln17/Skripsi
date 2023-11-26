<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-5">
        <?php   foreach($questions as $question): ?>
            <div class="card o-hidden border-0 shadow-lg my-5" style="color: #2D2C73;">
                <div class="card-body p-0">
                    <h5 class="card-title"><?= $question->title; ?></h5>
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 mb-4 mt-4" style="color: #2D2C73;"><?= $question->questioner_text?></h1>
                                </div>
                                <div class="text-center" id="intro">
                                    <h1 class="h4 mb-4 mt-4" style="color: red;"><b>HALLO!</b>  I'm....</h1>
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