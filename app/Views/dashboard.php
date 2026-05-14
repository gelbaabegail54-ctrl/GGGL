<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold text-dark">Dashboard</h1>
        <p class="text-muted">Welcome back, <strong>EJ RICE RETAILING</strong></p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <span class="badge bg-primary rounded-pill px-3 py-2">
            <i class="bi bi-person-fill"></i> Admin: <?= session()->get('username') ?>
        </span>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-stat bg-success-gradient text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between p-4">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-uppercase fw-bold opacity-75 mb-0">Total Inventory</h6>
                        <i class="fas fa-warehouse fs-4 opacity-50"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0"><?= number_format($totalStock, 2) ?> <small class="fs-6 fw-normal opacity-75">kg</small></h3>
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('inventory') ?>" class="btn btn-white btn-sm w-100 bg-white text-success fw-bold py-2 shadow-sm border-0">
                        View Details <i class="fas fa-chevron-right ms-1 small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat bg-primary-gradient text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between p-4">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-uppercase fw-bold opacity-75 mb-0">Total Revenue</h6>
                        <i class="fas fa-coins fs-4 opacity-50"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0">₱<?= number_format($totalRevenue, 2) ?></h3>
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('sales/history') ?>" class="btn btn-white btn-sm w-100 bg-white text-primary fw-bold py-2 shadow-sm border-0">
                        View History <i class="fas fa-chevron-right ms-1 small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat bg-dark-gradient text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between p-4">
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="text-uppercase fw-bold opacity-75 mb-0">Staff Team</h6>
                        <i class="fas fa-users fs-4 opacity-50"></i>
                    </div>
                    <h3 class="card-title fw-bold mb-0"><?= $totalUsers ?> <small class="fs-6 fw-normal opacity-75">Members</small></h3>
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('users') ?>" class="btn btn-white btn-sm w-100 bg-white text-dark fw-bold py-2 shadow-sm border-0">
                        Manage Team <i class="fas fa-chevron-right ms-1 small"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-8 mb-4">
        <div class="card analytics-card h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold mb-1">Weekly Sales Trend</h5>
                    <p class="text-muted small mb-0">Revenue performance over the last 7 days</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Last 7 Days
                    </button>
                </div>
            </div>
            <div class="card-body px-4 pb-4">
                <div style="height: 300px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card analytics-card h-100 border-0 shadow-sm">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-1">Sales by Variety</h5>
                <p class="text-muted small mb-0">Revenue distribution per product</p>
            </div>
            <div class="card-body px-4 pb-4 d-flex flex-column justify-content-center">
                <div style="height: 250px;">
                    <canvas id="inventoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // 1. Sales Trend Chart
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: <?= $salesLabels ?>,
            datasets: [{
                label: 'Sales (PHP)',
                data: <?= $salesData ?>,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // 2. Inventory Distribution
    const ctxInv = document.getElementById('inventoryChart').getContext('2d');
    new Chart(ctxInv, {
        type: 'doughnut',
        data: {
            labels: <?= $varietyLabels ?>,
            datasets: [{
                data: <?= $varietyData ?>,
                backgroundColor: [
                    'rgba(25, 135, 84, 0.7)', 
                    'rgba(255, 193, 7, 0.7)', 
                    'rgba(13, 202, 240, 0.7)', 
                    'rgba(108, 117, 125, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
<?= $this->endSection() ?>