<!DOCTYPE html>
<html>
<head>
    <title>Add Variety | EJ Rice</title>
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
                        <div class="card-header bg-primary text-white p-3">
                            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i> Register New Rice Variety</h5>
                        </div>
                        <div class="card-body p-4">
                            <form action="<?= base_url('inventory/store') ?>" method="post">
                                
                                <!-- Updated Variety Field to Dropdown -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Variety Name</label>
                                    <select name="variety" class="form-select form-select-lg" required>
                                        <option value="" disabled selected>Select Variety...</option>
                                        <option value="Sinandomeng">Sinandomeng</option>
                                        <option value="Jasmine">Jasmine</option>
                                        <option value="Brown Rice">Brown Rice</option>
                                        <option value="Regular Milled">Regular Milled</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-bold">Rice Grade</label>
                                    <select name="grade" class="form-select form-control-lg">
                                        <option>Premium</option>
                                        <option>Well-Milled</option>
                                        <option>Regular Milled</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Stock Quantity</label>
                                        <div class="input-group input-group-lg">
                                            <input type="number" name="stock_kg" step="0.01" class="form-control" required>
                                            <span class="input-group-text">kg</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price per kg</label>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text">₱</span>
                                            <input type="number" name="price" step="0.01" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="<?= base_url('inventory') ?>" class="btn btn-light border btn-lg px-4">Cancel</a>
                                    <button type="submit" class="btn btn-success btn-lg px-5 shadow">Save Variety</button>
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