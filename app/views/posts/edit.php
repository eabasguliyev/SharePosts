<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?= URLROOT ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Edit Post</h2>
        <p>Edit a post with this form</p>
        <form action="<?= URLROOT ?>/posts/edit/<?= $data['id'] ?>" method="POST">
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" class="form-control form-control-lg <?= !empty($data['title_err']) ? 'is-invalid' : '' ?>" id="title" value="<?= $data['title'] ?>">
                <span class="invalid-feedback"><?= $data['title_err'] ?></span>
            </div>
            <div class="form-group">
                <label for="body">Body: <sup>*</sup></label>
                <textarea name="body" class="form-control form-control-lg <?= !empty($data['body_err']) ? 'is-invalid' : '' ?>" id="body"><?= $data['body'] ?></textarea>
                <span class="invalid-feedback"><?= $data['body_err'] ?></span>
            </div>
            <input type="submit" value="Submit" class="btn btn-success mt-1">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>