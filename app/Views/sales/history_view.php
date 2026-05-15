<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">📜 Sales Transaction History</h2>
    <a href="<?= base_url('sales/new') ?>" class="btn btn-primary shadow-sm">+ Record New Sale</a>
</div>

<div class="card shadow-sm border-0 glass-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-4">Date & Time</th>
                        <th>Ref No.</th>
                        <th>Customer Name</th>
                        <th>Items</th>
                        <th>Total Qty</th>
                        <th class="text-end">Total Amount</th>
                        <th class="text-end pe-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($sales)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No sales transactions found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($sales as $sale): ?>
                        <tr>
                            <td class="ps-4 small">
                                <?= date('M d, Y | h:i A', strtotime($sale['transaction_date'])) ?>
                            </td>
                            <td><code class="text-primary fw-bold"><?= esc($sale['reference_no']) ?></code></td>
                            <td class="fw-bold"><?= esc($sale['customer_name']) ?></td>
                            <td>
                                <span class="badge bg-themed-pill text-neon-primary text-wrap text-start border border-white border-opacity-10" style="max-width: 250px;">
                                    <?= esc($sale['items_summary']) ?>
                                </span>
                            </td>
                            <td><?= number_format($sale['total_qty'], 2) ?> kg</td>
                            <td class="text-end fw-bold text-success">
                                ₱<?= number_format($sale['total_amount'], 2) ?>
                            </td>
                            <td class="text-end pe-4">
                                <?php if (!empty($sale['reference_no'])): ?>
                                    <a href="<?= base_url('sales/receipt/'.$sale['reference_no']) ?>" class="btn btn-sm btn-outline-primary" title="View Receipt">
                                        <i class="fas fa-file-invoice"></i> View Receipt
                                    </a>
                                <?php else: ?>
                                    <span class="text-muted small">No Receipt</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>