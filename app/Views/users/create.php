<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-sm border-0 glass-card">
            <div class="card-header bg-success text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-user-plus me-2"></i> Register New User Account</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('users/store') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Full Username</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-user text-muted"></i>
                            </span>
                            <input type="text" name="username" class="form-control border-start-0" placeholder="Enter full name" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-envelope text-muted"></i>
                            </span>
                            <input type="email" name="email" class="form-control border-start-0" placeholder="example@email.com" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold text-secondary">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0">
                                <i class="fas fa-key text-muted"></i>
                            </span>
                            <input type="password" name="password" class="form-control border-start-0" placeholder="Minimum 6 characters" required>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?= base_url('users') ?>" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm fw-bold">
                            <i class="fas fa-save me-1"></i> Save User
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>