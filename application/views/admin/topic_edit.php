<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <p class="mb-4">Edit Topic</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Topic.</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('admin/update_topic') ?>" method="POST">
            <input type="hidden" name="topic_id" value="<?= $topic->id ?>">
                <div class="mb-3">
                    <label for="topicTitle" class="form-label">Topic Title</label>
                    <input type="text" class="form-control" id="topicTitle" name="topicTitle" value="<?= $topic->title?>">
                </div>
                <div class="mb-3">
                    <label for="topicSubtitle" class="form-label">Topic Subtitle</label>
                    <input type="text" class="form-control" id="topicSubtitle" name="topicSubtitle" value="<?= $topic->sub_title?>">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="button" class="btn btn-danger">Cancel</button>
                <div class="text-danger mt-2" id="errorMessagesTopics"><!-- Error messages here --></div>
            </form>
        </div>
    </div>
</div>