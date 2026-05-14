<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="card shadow-sm border-0 glass-card">
            <div class="card-header bg-info text-white py-3">
                <h5 class="mb-0 fw-bold"><i class="fas fa-edit me-2"></i> Update Variety Details</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('inventory/update/'.$item['id']) ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Variety Name</label>
                        <select name="variety" class="form-select form-select-lg" required>
                            <option value="Sinandomeng" <?= ($item['variety'] == 'Sinandomeng') ? 'selected' : '' ?>>Sinandomeng</option>
                            <option value="Jasmine" <?= ($item['variety'] == 'Jasmine') ? 'selected' : '' ?>>Jasmine</option>
                            <option value="Brown Rice" <?= ($item['variety'] == 'Brown Rice') ? 'selected' : '' ?>>Brown Rice</option>
                            <option value="Regular Milled" <?= ($item['variety'] == 'Regular Milled') ? 'selected' : '' ?>>Regular Milled</option>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold text-secondary">Rice Grade</label>
                        <select name="grade" class="form-select form-select-lg">
                            <option <?= $item['grade'] == 'Premium' ? 'selected' : '' ?>>Premium</option>
                            <option <?= $item['grade'] == 'Well-Milled' ? 'selected' : '' ?>>Well-Milled</option>
                            <option <?= $item['grade'] == 'Regular Milled' ? 'selected' : '' ?>>Regular Milled</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-secondary">Current Stock</label>
                            <div class="input-group input-group-lg">
                                <input type="number" name="stock" step="0.01" value="<?= $item['stock_kg'] ?>" class="form-control" required>
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
                                <input type="number" name="price" step="0.01" value="<?= $item['price'] ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between align-items-center">
                        <a href="<?= base_url('inventory') ?>" class="btn btn-outline-secondary px-4">
                            <i class="fas fa-arrow-left me-1"></i> Back
                        </a>
                        <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm fw-bold">
                            <i class="fas fa-sync-alt me-1"></i> Update Records
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>