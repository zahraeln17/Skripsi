<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">Edit Data Kuisioner</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Kuisioner.</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/update_question') ?>" method="POST">
                <input type="hidden" name="question_id" value="<?= $question->id ?>">
                <div class="form-group">
                    <label for="topicTitle">Select Option Topic Title</label>
                    <select class="form-control select2" id="topicTitle" name="topicTitle">
                        <?php
                            foreach ($topics as $key => $topic) {
                                if ($topic->id == $question->topic_id) {
                                    echo '<option value="'.$topic->id.'" selected>'.$topic->sub_title.'</option>';
                                } else {
                                    echo '<option value="'.$topic->id.'">'.$topic->sub_title.'</option>';
                                }
                            }
                        ?> 
                    </select>
                </div>
                <div class="mb-3">
                    <label for="indicator" class="form-label">Indicator <small>(Must Be Shorter Than Question)</small></label>
                    <input type="text" class="form-control" id="indicator" name="indicator" value="<?=$question->indicator?>">
                </div>
                <div class="mb-3">
                    <label for="questionText" class="form-label">Question Text</label>
                    <textarea class="form-control" id="questionText" name="questionText" rows="4"><?=$question->questioner_text?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-danger">Cancel</button>
                <div class="text-danger mt-2" id="errorMessagesQuestions"><!-- Error messages here --></div>
            </form>

        </div>
    </div>
</div>