<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">Login</h2>
                    
                    <?php if(session()->getFlashdata('msg')):?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif;?>

                    <form action="<?= base_url('loginAuth') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Login</button>
                            <!-- Added Create Account Button below -->
                            <a href="<?= base_url('register') ?>" class="btn btn-outline-secondary">Create Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>