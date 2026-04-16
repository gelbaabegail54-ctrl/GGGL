<!DOCTYPE html>
<html>
<head>
    <title>Sales Transaction | EJ Rice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: #f4f7f6;">

<div class="container-fluid">
    <div class="row">
        <?= view('theme/sidebar') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-4" style="margin-left: 16.66%;">
            <h1 class="h2 mb-4"><i class="fas fa-cash-register text-primary me-2"></i> Sales Transaction</h1>

            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger shadow-sm"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('status')): ?>
                <div class="alert alert-success shadow-sm"><?= session()->getFlashdata('status') ?></div>
            <?php endif; ?>

            <div class="row">
                <!-- New Sale Form -->
                <div class="col-md-4">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-header bg-primary text-white">Record New Sale</div>
                        <div class="card-body">
                            <form action="<?= base_url('sales/store') ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" placeholder="Walk-in Customer">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Rice</label>
                                    <select name="variety_id" class="form-select" required>
                                        <option value="" disabled selected>Choose variety...</option>
                                        <?php foreach($inventory as $item): ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['variety'] ?> (₱<?= $item['price'] ?>/kg)</option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Quantity (kg)</label>
                                    <input type="number" name="quantity_kg" step="0.01" class="form-control" placeholder="0.00" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100 py-2 shadow">Complete Sale</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Sales History -->
                <div class="col-md-8">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-dark text-white text-center">Recent Sales History</div>
                        <div class="card-body p-0">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Customer</th>
                                        <th>Rice</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sales as $sale): ?>
                                    <tr>
                                        <td><small><?= date('M d, h:i A', strtotime($sale['transaction_date'])) ?></small></td>
                                        <td><?= $sale['customer_name'] ?></td>
                                        <td><?= $sale['variety'] ?></td>
                                        <td><?= $sale['quantity_kg'] ?> kg</td>
                                        <td class="fw-bold text-success">₱<?= number_format($sale['total_price'], 2) ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>