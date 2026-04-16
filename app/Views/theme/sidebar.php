<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar vh-100 p-0 shadow-lg position-fixed">
    <!-- Brand / Logo Area -->
    <div class="p-4 text-white text-center border-bottom border-secondary bg-gradient">
        <h5 class="mb-0 fw-bold text-uppercase tracking-wider">
            <i class="fas fa-seedling text-success me-2"></i>EJ RICE
        </h5>
        <small class="text-muted">Retailing System</small>
    </div>
    
    <!-- Navigation Links -->
    <div class="mt-3">
        <ul class="nav flex-column px-2">
            <!-- Dashboard -->
            <li class="nav-item mb-1">
                <a class="nav-link text-white rounded p-3 btn-outline-primary text-start d-flex align-items-center" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-chart-line me-3" style="width: 20px;"></i> 
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Rice Inventory (The New Update) -->
            <li class="nav-item mb-1">
                <a class="nav-link text-white rounded p-3 btn-outline-primary text-start d-flex align-items-center" href="<?= base_url('inventory') ?>">
                    <i class="fas fa-warehouse me-3" style="width: 20px;"></i> 
                    <span>Rice Inventory</span>
                </a>
            </li>

            <!-- User Management -->
            <li class="nav-item mb-1">
                <a class="nav-link text-white rounded p-3 btn-outline-primary text-start d-flex align-items-center" href="<?= base_url('users') ?>">
                    <i class="fas fa-users-cog me-3" style="width: 20px;"></i> 
                    <span>Manage Users</span>
                </a>
            </li>

            <hr class="text-secondary mx-3">

            <!-- Logout -->
            <li class="nav-item mt-4">
                <a class="nav-link text-danger rounded p-3 btn-outline-danger text-start d-flex align-items-center border border-danger border-opacity-25 mx-2" href="<?= base_url('logout') ?>">
                    <i class="fas fa-sign-out-alt me-3" style="width: 20px;"></i> 
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    /* ADDED BACKGROUND CSS */
    body {
        /* Soft professional background for the whole page */
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
        background-attachment: fixed;
    }

    .sidebar {
        /* Stronger dark background for the sidebar */
        background: linear-gradient(180deg, #1a1d20 0%, #212529 100%) !important;
        border-right: 1px solid rgba(255,255,255,0.05);
    }

    /* Keep existing Hover Effects */
    .nav-link {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }
    .nav-link:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        color: #0d6efd !important;
        border: 1px solid rgba(13, 110, 253, 0.5);
    }
</style>