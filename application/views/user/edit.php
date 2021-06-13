<!DOCTYPE html>
<html>

<head>
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Practical</a>
    </nav>

    <div class="container">
        <form class="pt-5" action="<?= base_url('user/edit/'). $user['id'] ?>" method="POST">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="font-weight-bold">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="first_name" value="<?= set_value('first_name', $user['first_name']) ?>">
                        <?= form_error('first_name') ?>
                    </div>
                    
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Last Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="last_name" value="<?= set_value('last_name', $user['last_name']) ?>">
                        <?= form_error('last_name') ?>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" value="<?= set_value('phone', $user['phone']) ?>">
                        <?= form_error('phone') ?>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" value="<?= set_value('email', $user['email']) ?>">
                        <?= form_error('email') ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="float-right">
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary mr-2 px-4">Cancel</a>
                        <button type="submit" class="btn btn-success px-4">Update</button>
                    </div>
                </div>
        </form>
    </div>
</body>

</html>