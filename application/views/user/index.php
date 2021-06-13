<!DOCTYPE html>
<html>

<head>
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/datatable/css/jquery.dataTables.css') ?>">
    <script type="text/javascript" src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Practical</a>
    </nav>
    <section>
        <div class="container mt-5">
            <?php if ($this->session->userdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->userdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
            <?php elseif ($this->session->userdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->userdata('error') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="row pt-5">
                <div class="col-6">
                    <h5>User List</h5>
                </div>
                <div class="col-6">
                    <a class="btn btn-primary float-right" href="<?= base_url('user/add') ?>">Add New</a>
                </div>
            </div>
            <hr>


            <table id="users" class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $value) : ?>
                        <tr>
                            <td><?= $value->id ?></td>
                            <td><?= $value->first_name . ' ' . $value->last_name ?></td>
                            <td><?= $value->phone ?></td>
                            <td><?= $value->email ?></td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('user/edit/') . $value->id ?>">Edit</a>
                                <a class="btn btn-danger" href="<?= base_url('user/delete/') . $value->id ?>" onclick="return confirm('Are your sure want to delete this user')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>

    <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/datatable/js/jquery.dataTables.min.js') ?>"></script>
    <script>
        $('#users').DataTable({
            "autoWidth": false,
            "columnDefs" : [
                {"orderable": false, "targets": [4]}
            ],
            "order": [
                [0, 'desc']
            ],
            "columns":[
                {"width": "5%"},
                {"width": "30%"},
                {"width": "20%"},
                {"width": "30%"},
                {"width": "15%"}
            ]
            
        })
    </script>
</body>

</html>