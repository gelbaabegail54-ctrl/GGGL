<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-sm border-0 glass-card">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-user-edit me-2"></i> Update User Account</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('users/update/'.$user['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" name="username" value="<?= esc($user['username']) ?>" class="form-control border-start-0" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                            <input type="email" name="email" value="<?= esc($user['email']) ?>" class="form-control border-start-0" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-lock text-muted"></i></span>
                            <input type="password" name="password" class="form-control border-start-0" placeholder="Leave blank if not changing">
                        </div>
                        <small class="text-muted d-block mt-1">Security: Enter a new password only if you want to update it.</small>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-times me-1"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg px-4 shadow-sm fw-bold">
                            <i class="fas fa-check-circle me-1"></i> Update User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>