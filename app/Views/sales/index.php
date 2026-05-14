<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="text-center mb-4">
            <h1 class="h2 fw-bold text-dark">
                <i class="fas fa-cash-register text-primary me-2"></i> Sales Transaction
            </h1>
            <p class="text-muted">Record a new customer purchase</p>
        </div>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger shadow-sm border-0 alert-dismissible fade show">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <?php if(session()->getFlashdata('status')): ?>
            <div class="alert alert-success shadow-sm border-0 alert-dismissible fade show">
                <?= session()->getFlashdata('status') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0 glass-card">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0 fw-bold">Record New Sale</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('sales/store') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Customer Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" name="customer_name" class="form-control border-start-0" placeholder="Walk-in Customer">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Select Rice Variety</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-seedling text-muted"></i></span>
                            <select name="variety_id" class="form-select border-start-0" required>
                                <option value="" disabled selected>Choose variety...</option>
                                <?php foreach($inventory as $item): ?>
                                    <option value="<?= $item['id'] ?>"><?= esc($item['variety']) ?> (₱<?= number_format($item['price'], 2) ?>/kg)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Quantity (kg)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-weight-hanging text-muted"></i></span>
                            <input type="number" name="quantity_kg" step="0.01" class="form-control border-start-0" placeholder="0.00" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-3 fw-bold shadow-sm">
                        <i class="fas fa-check-circle me-2"></i> Complete Sale
                    </button>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="<?= base_url('sales/history') ?>" class="btn btn-link text-decoration-none text-secondary">
                <i class="fas fa-history me-1"></i> View Transaction History
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
