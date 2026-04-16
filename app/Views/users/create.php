<!-- Same structure as index, but with this form in the Main section -->
<form action="<?= base_url('users/store') ?>" method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save User</button>
    <a href="<?= base_url('users') ?>" class="btn btn-secondary">Cancel</a>
</form>