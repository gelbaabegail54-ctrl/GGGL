<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm border-0 glass-card">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-plus-circle me-2"></i> Register New Rice Variety</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('inventory/store') ?>" method="post">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Variety Name</label>
                        <input type="text" name="variety" class="form-control form-control-lg" placeholder="Enter Variety Name (e.g. Sinandomeng)" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Rice Grade</label>
                        <select name="grade" class="form-select form-select-lg">
                            <option>Premium</option>
                            <option>Well-Milled</option>
                            <option>Regular Milled</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Stock Quantity</label>
                            <div class="input-group input-group-lg">
                                <input type="number" name="stock" step="0.01" class="form-control" placeholder="0.00" required>
                                <select name="unit" class="form-select" style="max-width: 120px; flex: none;">
                                    <option value="kg">kg</option>
                                    <option value="sack">Sack (50kg)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Price per kg</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light">₱</span>
                                <input type="number" name="price" step="0.01" class="form-control" placeholder="0.00" required>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?= base_url('inventory') ?>" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left me-1"></i> Back to Inventory
                        </a>
                        <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm fw-bold">
                            <i class="fas fa-save me-1"></i> Save Variety
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>