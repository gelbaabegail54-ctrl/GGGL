<!DOCTYPE html>
<html>
<head>
    <title>Edit User | EJ Rice</title>
    <!-- Bootstrap and FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: #f4f7f6;">

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Called Here -->
        <?= view('theme/sidebar') ?> 

        <!-- Main Content Area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5" style="margin-left: 16.66% !important;">
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Styled Card -->
                    <div class="card shadow border-0">
                        <div class="card-header bg-primary text-white p-3">
                            <h5 class="mb-0"><i class="fas fa-user-edit me-2"></i> Update User Account</h5>
                        </div>
                        <div class="card-body p-4">
                            
                            <form action="<?= base_url('users/update/'.$user['id']) ?>" method="post">
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-user text-muted"></i></span>
                                        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope text-muted"></i></span>
                                        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-secondary">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock text-muted"></i></span>
                                        <input type="password" name="password" class="form-control" placeholder="Leave blank if not changing">
                                    </div>
                                    <small class="text-muted">Security: Enter a new password only if you want to update it.</small>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between">
                                    <a href="<?= base_url('users') ?>" class="btn btn-light border px-4">
                                        <i class="fas fa-times me-1"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary px-4 shadow">
                                        Update User <i class="fas fa-check-circle ms-1"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>