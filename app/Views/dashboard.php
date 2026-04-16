<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EJ Rice Retailing | Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card-stat { border-radius: 15px; border: none; transition: transform 0.2s; }
        .card-stat:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar Inclusion -->
        <?= view('theme/sidebar') ?>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            <!-- Header Section -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-dark">Welcome, EJ RICE RETAILING</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <span class="badge bg-primary p-2">Admin Active: <?= session()->get('username') ?></span>
                </div>
            </div>

            <!-- Summary Statistics Cards -->
            <div class="row mt-4">
                <!-- Stock Card -->
                <div class="col-md-4 mb-4">
                    <div class="card card-stat bg-success text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">🌾 Total Inventory</h5>
                            <p class="card-text fs-4">Manage your stock levels and varieties.</p>
                            <a href="<?= base_url('inventory') ?>" class="btn btn-light btn-sm">View Stock</a>
                        </div>
                    </div>
                </div>

                <!-- Sales Card -->
                <div class="col-md-4 mb-4">
                    <div class="card card-stat bg-primary text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">💰 Sales Transaction</h5>
                            <p class="card-text fs-4">Process new orders and view history.</p>
                            <a href="<?= base_url('sales/new') ?>" class="btn btn-light btn-sm">New Sale</a>
                        </div>
                    </div>
                </div>

                <!-- Users Card -->
                <div class="col-md-4 mb-4">
                    <div class="card card-stat bg-dark text-white shadow">
                        <div class="card-body">
                            <h5 class="card-title">👥 Staff Management</h5>
                            <p class="card-text fs-4">Manage system users and permissions.</p>
                            <a href="<?= base_url('users') ?>" class="btn btn-light btn-sm">Manage Users</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Information Section -->
            <div class="mt-4 p-5 bg-white border rounded-3 shadow-sm">
                <h2>Business Overview</h2>
                <p>Ej Rice Retailing System is retail business that sells different types of rice per kilo or sack to local customers.
                It uses a computerized system to manage inventory, track sales, and handle transactions efficiently.</p>
                <hr>
                <p class="text-muted small">System Date: <?= date('F d, Y') ?></p>
            </div>

        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>