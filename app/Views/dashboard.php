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
        <div class="card card-stat bg-success-trans text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h6 class="text-uppercase fw-bold opacity-75">Total Inventory</h6>
                    <h3 class="card-title">🌾 Stock Levels</h3>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('inventory') ?>" class="btn btn-light btn-sm w-100">View Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat bg-primary-trans text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h6 class="text-uppercase fw-bold opacity-75">Revenue</h6>
                    <h3 class="card-title">💰 Sales History</h3>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('sales/history') ?>" class="btn btn-light btn-sm w-100">View History</a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat bg-dark-trans text-white shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h6 class="text-uppercase fw-bold opacity-75">Team</h6>
                    <h3 class="card-title">👥 Staff Management</h3>
                </div>
                <div class="mt-3">
                    <a href="<?= base_url('users') ?>" class="btn btn-light btn-sm w-100">Manage Access</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-8 mb-4">
        <div class="card analytics-card h-100">
            <div class="card-header bg-transparent border-0 pt-3">
                <h5 class="fw-bold">Weekly Sales Trend</h5>
            </div>
            <div class="card-body">
                <canvas id="salesChart" height="250"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card analytics-card h-100">
            <div class="card-header bg-transparent border-0 pt-3">
                <h5 class="fw-bold">Rice Varieties</h5>
            </div>
            <div class="card-body">
                <canvas id="inventoryChart"></canvas>
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
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Sales (PHP)',
                data: [12000, 19000, 15000, 25000, 22000, 30000, 28000],
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
            labels: ['Sinandomeng', 'Brown Rice', 'Jasmine', 'Regular Milled'],
            datasets: [{
                data: [40, 25, 20, 15],
                backgroundColor: [
                    'rgba(25, 135, 84, 0.7)', 
                    'rgba(255, 193, 7, 0.7)', 
                    'rgba(13, 202, 240, 0.7)', 
                    'rgba(108, 117, 125, 0.7)'
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