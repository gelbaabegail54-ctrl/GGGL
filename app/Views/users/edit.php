<form action="<?= base_url('users/update/'.$user['id']) ?>" method="post">
    <div class="mb-3">
        <label>Username</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Password (Leave blank if not changing)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
    <a href="<?= base_url('users') ?>" class="btn btn-secondary">Cancel</a>
</form>