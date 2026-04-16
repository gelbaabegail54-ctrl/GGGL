<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?= view('theme/sidebar') ?> <!-- Sidebar Called Here -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">User Management</h1>
                <a href="<?= base_url('users/create') ?>" class="btn btn-primary">Add New User</a>
            </div>

            <?php if(session()->getFlashdata('status')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('status') ?></div>
            <?php endif; ?>

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['created_at'] ?></td>
                        <td>
                            <a href="<?= base_url('users/edit/'.$user['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('users/delete/'.$user['id']) ?>" onclick="return confirm('Delete this user?')" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
</div>
</body>
</html>