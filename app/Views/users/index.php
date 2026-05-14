<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 fw-bold text-dark">User Management</h1>
    <a href="<?= base_url('users/create') ?>" class="btn btn-primary shadow-sm">Add New User</a>
</div>

<?php if(session()->getFlashdata('status')): ?>
    <div class="alert alert-success shadow-sm border-0 alert-dismissible fade show">
        <?= session()->getFlashdata('status') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm glass-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-4">ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td class="ps-4"><?= $user['id'] ?></td>
                        <td class="fw-bold"><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= date('M d, Y', strtotime($user['created_at'])) ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('users/edit/'.$user['id']) ?>" class="btn btn-sm btn-outline-primary me-1 rounded-circle" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('users/delete/'.$user['id']) ?>" onclick="return confirm('Delete this user?')" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>