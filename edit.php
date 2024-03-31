<?php

include("vendor/autoload.php");
use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$table = new UsersTable(new MySQL);
$all = $table->getAll();
$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mb-5 mt-5">
            <?= $auth->name ?>
            <span class="fw-normal text-muted">
                (<?= $auth->role ?>)
            </span>
        </h1>

        <?php if($auth->photo): ?>
            <img
                class="img-thumbnail mb-3"
                src="_actions/photos/<?= $auth->photo ?>"
                alt="Profile Photo" width="200">
        <?php endif ?>

        <form action="_actions/create.php" method="post" enctype="multipart/form-data">
            <label for="file" class="form-label">Update Image</label>
            <input type="file" name="photo" class="form-control mb-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control mb-2" value="<?= $auth->name ?>"
                 required>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control mb-2" value="<?= $auth->email ?>"
                 required>
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control mb-2" value="<?= $auth->phone ?>"
                 required>
            <label for="address" class="form-label">Address</label>
            <textarea name="address" class="form-control mb-2"
                 required><?= $auth->address ?></textarea>
            <button type="submit"
                 class="w-100 btn btn-lg btn-primary mb-3">
                Update
                </button>
        </form>
    </div>
</body>
</html>