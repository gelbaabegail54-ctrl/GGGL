<!DOCTYPE html>
<html>
<head>
    <title>Edit Variety | EJ Rice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background: #f4f7f6;">

<div class="container-fluid">
    <div class="row">
        <?= view('theme/sidebar') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-5" style="margin-left: 16.66%;">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card shadow border-0">
                        <div class="card-header bg-info text-white p-3">
                            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Update Variety Details</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?= base_url('inventory/update/'.$item['id']) ?>" method="post">
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-muted small">Variety Name</label>
                                    <!-- Updated to Dropdown with Choices -->
                                    <select name="variety" class="form-select form-select-lg" required>
                                        <option value="Sinandomeng" <?= ($item['variety'] == 'Sinandomeng') ? 'selected' : '' ?>>Sinandomeng</option>
                                        <option value="Jasmine" <?= ($item['variety'] == 'Jasmine') ? 'selected' : '' ?>>Jasmine</option>
                                        <option value="Brown Rice" <?= ($item['variety'] == 'Brown Rice') ? 'selected' : '' ?>>Brown Rice</option>
                                        <option value="Regular Milled" <?= ($item['variety'] == 'Regular Milled') ? 'selected' : '' ?>>Regular Milled</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold text-muted small">Rice Grade</label>
                                    <select name="grade" class="form-select form-control-lg">
                                        <option <?= $item['grade'] == 'Premium' ? 'selected' : '' ?>>Premium</option>
                                        <option <?= $item['grade'] == 'Well-Milled' ? 'selected' : '' ?>>Well-Milled</option>
                                        <option <?= $item['grade'] == 'Regular Milled' ? 'selected' : '' ?>>Regular Milled</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold text-muted small">Current Stock</label>
                                        <div class="input-group input-group-lg">
                                            <input type="number" name="stock_kg" step="0.01" value="<?= $item['stock_kg'] ?>" class="form-control" required>
                                            <span class="input-group-text text-muted small">kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold text-muted small">Price per kg</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text text-muted small">₱</span>
                                            <input type="number" name="price" step="0.01" value="<?= $item['price'] ?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="<?= base_url('inventory') ?>" class="btn btn-light border btn-lg px-4">Back</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow">Update Records</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

</body>
</html>