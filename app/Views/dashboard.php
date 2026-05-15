<?= $this->extend('theme/layout') ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-4 border-bottom border-white border-opacity-10">
    <div>
        <h1 class="h3 fw-bold mb-1">System Dashboard</h1>
        <p class="text-muted small">Real-time overview of <strong>EJ RICE RETAILING</strong></p>
    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="d-flex align-items-center gap-3 bg-themed-pill px-3 py-2 rounded-pill border border-white border-opacity-10">
            <i class="fa-solid fa-calendar-alt text-neon-primary small"></i>
            <span class="small fw-medium text-themed-50"><?= date('M d, Y') ?></span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card card-stat h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, #9d50bb, #6e48aa);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="p-2 rounded-3" style="background: rgba(255,255,255,0.25);">
                        <i class="fas fa-boxes-stacked text-white fs-5"></i>
                    </div>
                    <span class="badge bg-white bg-opacity-20 text-white rounded-pill small">+2.5%</span>
                </div>
                <h6 class="text-white-50 text-uppercase fw-bold small mb-1">Total Inventory</h6>
                <h2 class="text-white fw-bold mb-0"><?= number_format($totalStock, 1) ?> <small class="fs-6 fw-normal opacity-75">kg</small></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, #00d2ff, #3a7bd5);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="p-2 rounded-3" style="background: rgba(255,255,255,0.25);">
                        <i class="fas fa-hand-holding-dollar text-white fs-5"></i>
                    </div>
                    <span class="badge bg-white bg-opacity-20 text-white rounded-pill small">Weekly</span>
                </div>
                <h6 class="text-white-50 text-uppercase fw-bold small mb-1">Total Revenue</h6>
                <h2 class="text-white fw-bold mb-0">₱<?= number_format($totalRevenue, 0) ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card card-stat h-100 border-0 shadow-lg" style="background: linear-gradient(135deg, #00f2fe, #4facfe);">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="p-2 rounded-3" style="background: rgba(255,255,255,0.25);">
                        <i class="fas fa-users-gear text-white fs-5"></i>
                    </div>
                    <span class="badge bg-white bg-opacity-20 text-white rounded-pill small">Active</span>
                </div>
                <h6 class="text-white-50 text-uppercase fw-bold small mb-1">Staff Team</h6>
                <h2 class="text-white fw-bold mb-0"><?= $totalUsers ?> <small class="fs-6 fw-normal opacity-75">Users</small></h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-2">
    <div class="col-lg-8 mb-4">
        <div class="card analytics-card h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="fw-bold mb-0">Revenue Analytics</h5>
                    <p class="text-muted small mb-0">Performance over the last 7 days</p>
                </div>
                <div class="d-flex gap-2">
                    <div class="d-flex align-items-center gap-2 small">
                        <span class="d-inline-block rounded-circle" style="width: 8px; height: 8px; background: var(--primary-neon);"></span>
                        <span class="text-white-50">Sales</span>
                    </div>
                </div>
            </div>
            <div class="card-body px-4 pb-4">
                <div style="height: 320px;">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 mb-4">
        <div class="card analytics-card h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4">
                <h5 class="fw-bold mb-0">Sales Distribution</h5>
                <p class="text-muted small mb-0">Revenue per rice variety</p>
            </div>
            <div class="card-body px-4 pb-4 d-flex flex-column justify-content-center">
                <div style="height: 280px;">
                    <canvas id="inventoryChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    // Chart.js Default Config
    Chart.defaults.color = '#94a3b8';
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.borderColor = 'rgba(255, 255, 255, 0.05)';

    // 1. Sales Trend Chart (Neon Style)
    const ctxSales = document.getElementById('salesChart').getContext('2d');
    const salesGradient = ctxSales.createLinearGradient(0, 0, 0, 300);
    salesGradient.addColorStop(0, 'rgba(0, 210, 255, 0.3)');
    salesGradient.addColorStop(1, 'rgba(0, 210, 255, 0)');

    new Chart(ctxSales, {
        type: 'line',
        data: {
            labels: <?= $salesLabels ?>,
            datasets: [{
                label: 'Revenue',
                data: <?= $salesData ?>,
                borderColor: '#00d2ff',
                borderWidth: 3,
                pointBackgroundColor: '#00d2ff',
                pointBorderColor: 'rgba(255,255,255,0.2)',
                pointBorderWidth: 4,
                pointRadius: 4,
                pointHoverRadius: 6,
                backgroundColor: salesGradient,
                fill: true,
                tension: 0.45
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#1e293b',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    cornerRadius: 10,
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { drawBorder: false },
                    ticks: {
                        callback: function(value) { return '₱' + value.toLocaleString(); }
                    }
                },
                x: {
                    grid: { display: false }
                }
            }
        }
    });

    // 2. Inventory Distribution (Modern Ring)
    const ctxInv = document.getElementById('inventoryChart').getContext('2d');
    new Chart(ctxInv, {
        type: 'doughnut',
        data: {
            labels: <?= $varietyLabels ?>,
            datasets: [{
                data: <?= $varietyData ?>,
                backgroundColor: [
                    '#9d50bb', 
                    '#00d2ff', 
                    '#00f2fe', 
                    '#3a7bd5',
                    '#6e48aa'
                ],
                borderWidth: 0,
                hoverOffset: 15
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: { 
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>