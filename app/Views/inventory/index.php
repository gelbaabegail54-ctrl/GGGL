<!DOCTYPE html>
<html>
<head>
    <title>Rice Inventory | EJ Rice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: #f4f7f6;">

<div class="container-fluid">
    <div class="row">
        <?= view('theme/sidebar') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4" style="margin-left: 16.66%;">
            <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                <h1 class="h2"><i class="fas fa-warehouse text-primary me-2"></i> Rice Inventory Management</h1>
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

            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light text-secondary">
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
                            <tr class="align-middle">
                                <td class="ps-4 fw-bold"><?= $item['variety'] ?></td>
                                <td><span class="text-muted small"><?= $item['grade'] ?></span></td>
                                <td><?= number_format($item['stock_kg'], 2) ?> kg</td>
                                <td class="fw-bold text-success">₱<?= number_format($item['price'], 2) ?></td>
                                <td>
                                    <?php 
                                        $badge = 'bg-success';
                                        if($item['status'] == 'Low Stock') $badge = 'bg-warning text-dark';
                                        if($item['status'] == 'Out of Stock') $badge = 'bg-danger';
                                    ?>
                                    <span class="badge rounded-pill <?= $badge ?>"><?= $item['status'] ?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('inventory/edit/'.$item['id']) ?>" class="btn btn-sm btn-outline-info me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('inventory/delete/'.$item['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Remove this variety?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>