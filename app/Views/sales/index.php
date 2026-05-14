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

        <div class="card shadow-sm border-0 glass-card mb-4">
            <div class="card-header bg-primary text-white py-3">
                <h5 class="card-title mb-0 fw-bold">Add Rice to Cart</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('sales/add_to_cart') ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Customer Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                            <input type="text" name="customer_name" class="form-control border-start-0" placeholder="Walk-in Customer" value="<?= !empty($cart) ? esc($cart[0]['customer_name']) : '' ?>">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Select Rice Variety</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-seedling text-muted"></i></span>
                            <select name="variety_id" class="form-select border-start-0" required>
                                <option value="" disabled <?= empty($selected_variety_id) ? 'selected' : '' ?>>Choose variety...</option>
                                <?php foreach($inventory as $item): ?>
                                    <option value="<?= $item['id'] ?>" <?= (isset($selected_variety_id) && $selected_variety_id == $item['id']) ? 'selected' : '' ?>>
                                        <?= esc($item['variety']) ?> (₱<?= number_format($item['price'], 2) ?>/kg)
                                    </option>
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

                    <button type="submit" class="btn btn-outline-primary w-100 py-2 fw-bold shadow-sm mb-2">
                        <i class="fas fa-cart-plus me-2"></i> Add to Cart
                    </button>
                </form>
            </div>
        </div>

        <?php if(!empty($cart)): ?>
        <div class="card shadow-sm border-0 glass-card mb-4">
            <div class="card-header bg-success text-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0 fw-bold">Current Cart</h5>
                <span class="badge bg-white text-success rounded-pill"><?= count($cart) ?> Items</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Variety</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th class="text-end pe-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $grand_total = 0;
                            foreach($cart as $index => $item): 
                                $grand_total += $item['total_price'];
                            ?>
                            <tr>
                                <td class="ps-3">
                                    <div class="fw-bold"><?= esc($item['variety']) ?></div>
                                    <small class="text-muted"><?= esc($item['grade']) ?></small>
                                </td>
                                <td><?= number_format($item['quantity_kg'], 2) ?>kg</td>
                                <td class="fw-bold text-success">₱<?= number_format($item['total_price'], 2) ?></td>
                                <td class="text-end pe-3">
                                    <a href="<?= base_url('sales/remove_from_cart/'.$index) ?>" class="btn btn-sm btn-link text-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th colspan="2" class="ps-3 text-uppercase">Grand Total</th>
                                <th colspan="2" class="text-end pe-3 fs-5 text-success fw-bold">₱<?= number_format($grand_total, 2) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="p-3">
                    <form action="<?= base_url('sales/store') ?>" method="post">
                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold shadow-sm">
                            <i class="fas fa-check-circle me-2"></i> Complete Transaction
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        
        <div class="text-center mt-2">
            <a href="<?= base_url('sales/history') ?>" class="btn btn-link text-decoration-none text-secondary">
                <i class="fas fa-history me-1"></i> View Transaction History
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
