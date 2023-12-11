<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (session()->getFlashdata('message')) : ?>
        <?= session()->getFlashdata('message'); ?>
    <?php endif; ?>
    <form method="post" action="/home/spreadsheet_import" enctype="multipart/form-data">
        <div class="form-group">
            <? //= csrf_field(); 
            ?>
            <input type="file" name="upload_file" class="form-control" placeholder="Enter File" id="upload_file">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary">
        </div>
    </form>
</body>

</html>