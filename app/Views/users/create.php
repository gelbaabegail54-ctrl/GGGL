<!DOCTYPE html>
<html>
<head>
    <title>Add New User | EJ Rice</title>
    <!-- Bootstrap and FontAwesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: #f4f7f6;">

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Called Here -->
        <?= view('theme/sidebar') ?> 

        <!-- Main Content Area (Shifted to allow space for the fixed sidebar) -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5" style="margin-left: 16.66% !important;">
            
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <!-- Styled Card -->
                    <div class="card shadow border-0">
                        <div class="card-header bg-success text-white p-3">
                            <h5 class="mb-0"><i class="fas fa-user-plus me-2"></i> Register New User Account</h5>
                        </div>
                        <div class="card-body p-4">
                            
                            <form action="<?= base_url('users/store') ?>" method="post">
                                
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary">Full Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" name="username" class="form-control border-start-0 ps-0" placeholder="Enter full name" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold text-secondary">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control border-start-0 ps-0" placeholder="example@email.com" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bold text-secondary">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light text-muted border-end-0">
                                            <i class="fas fa-key"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control border-start-0 ps-0" placeholder="Minimum 6 characters" required>
                                    </div>
                                </div>

                                <hr>

                                <div class="d-flex justify-content-between pt-2">
                                    <a href="<?= base_url('users') ?>" class="btn btn-light border px-4 text-secondary">
                                        <i class="fas fa-arrow-left me-1"></i> Back to List
                                    </a>
                                    <button type="submit" class="btn btn-success px-5 shadow">
                                        Save User <i class="fas fa-save ms-1"></i>
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