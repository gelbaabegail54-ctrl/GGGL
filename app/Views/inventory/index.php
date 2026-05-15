<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom border-white border-opacity-10">
    <h1 class="h2 fw-bold"><i class="fas fa-warehouse text-primary me-2"></i> Rice Inventory Management</h1>
    <a href="<?= base_url('inventory/create') ?>" class="btn btn-primary shadow-sm">
        <i class="fas fa-plus-circle"></i> Add New Variety
    </a>
</div>

<?php if(session()->getFlashdata('status')): ?>
    <div class="alert alert-success shadow-sm border-0 alert-dismissible fade show">
        <?= session()->getFlashdata('status') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card border-0 shadow-sm glass-card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th class="ps-4">Variety Name</th>
                        <th>Grade</th>
                        <th>Stock (kg)</th>
                        <th>Price per kg</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($inventory as $item): ?>
                    <tr>
                        <td class="ps-4 fw-bold"><?= esc($item['variety']) ?></td>
                        <td><span class="badge bg-themed-pill text-neon-primary border border-white border-opacity-10"><?= esc($item['grade']) ?></span></td>
                        <td><?= number_format($item['stock_kg'], 2) ?> kg</td>
                        <td class="fw-bold text-success">₱<?= number_format($item['price'], 2) ?></td>
                        <td>
                            <?php 
                                $badge = 'bg-success';
                                if($item['status'] == 'Low Stock') $badge = 'bg-warning text-dark';
                                if($item['status'] == 'Out of Stock') $badge = 'bg-danger';
                            ?>
                            <span class="badge rounded-pill <?= $badge ?> shadow-sm px-3"><?= esc($item['status']) ?></span>
                        </td>
                        <td class="text-center">
                            <a href="<?= base_url('inventory/edit/'.$item['id']) ?>" class="btn btn-sm btn-outline-primary me-1 rounded-circle" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete" onclick="return confirm('Remove this variety?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>