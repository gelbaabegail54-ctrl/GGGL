<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">
            <div class="col-4">
                <div class="card shadow-sm p-4">
                    <h2 class="text-center mb-4">Create Account</h2>
                    <form action="<?= base_url('registerStore') ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="username" placeholder="Name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Register Now</button>
                            <a href="<?= base_url('login') ?>" class="text-center mt-2">Already have an account? Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>