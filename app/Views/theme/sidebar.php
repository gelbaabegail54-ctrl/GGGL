<!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="col-md-3 col-lg-2 d-md-block sidebar vh-100 p-0 shadow-lg position-fixed">
    <!-- Brand / Logo Area -->
    <div class="p-4 text-white text-center border-bottom border-white border-opacity-10">
        <div class="brand-logo mb-2">
            <i class="fas fa-seedling text-success fs-3"></i>
        </div>
        <h5 class="mb-0 fw-bold text-uppercase tracking-wider">
            EJ RICE
        </h5>
        <small class="text-white-50 small fw-light">RETAILING SYSTEM</small>
    </div>
    
    <!-- Navigation Links -->
    <div class="mt-4 px-3">
        <ul class="nav flex-column gap-2">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('dashboard*') ? 'active' : '') ?>" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-grid-2"></i> 
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Rice Inventory -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('inventory*') ? 'active' : '') ?>" href="<?= base_url('inventory') ?>">
                    <i class="fas fa-boxes-stacked"></i> 
                    <span>Inventory</span>
                </a>
            </li>

            <!-- User Management -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('users*') ? 'active' : '') ?>" href="<?= base_url('users') ?>">
                    <i class="fas fa-user-gear"></i> 
                    <span>Management</span>
                </a>
            </li>

            <!-- Sales History -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('sales/history*') ? 'active' : '') ?>" href="<?= base_url('sales/history') ?>">
                    <i class="fas fa-receipt"></i> 
                    <span>Sales History</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- User Profile & Logout at Bottom -->
    <div class="position-absolute bottom-0 w-100 p-3 border-top border-white border-opacity-10 bg-black bg-opacity-20">
        <div class="d-flex align-items-center gap-2 mb-3 px-2">
            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 32px; height: 32px;">
                <i class="fas fa-user-shield small"></i>
            </div>
            <div class="overflow-hidden">
                <p class="text-white small fw-bold mb-0 text-truncate"><?= session()->get('username') ?></p>
                <p class="text-white-50 x-small mb-0">Administrator</p>
            </div>
        </div>
        <a class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 py-2" href="<?= base_url('logout') ?>">
            <i class="fas fa-power-off small"></i> 
            <span class="small fw-bold">Logout</span>
        </a>
    </div>
</div>

<style>
    .sidebar {
        background: #1e293b !important;
        z-index: 1000;
    }

    .nav-link {
        color: #94a3b8 !important;
        padding: 0.8rem 1rem !important;
        border-radius: 12px !important;
        font-size: 0.9rem;
        font-weight: 500;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent !important;
    }

    .nav-link i {
        font-size: 1.1rem;
        width: 20px;
        text-align: center;
    }

    .nav-link:hover {
        color: #f8fafc !important;
        background: rgba(255, 255, 255, 0.05) !important;
        transform: translateX(4px);
    }

    .nav-link.active {
        color: #ffffff !important;
        background: #3b82f6 !important;
        box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.5);
    }

    .tracking-wider {
        letter-spacing: 0.1em;
    }

    .x-small {
        font-size: 0.7rem;
    }

    .avatar-sm {
        flex-shrink: 0;
    }
</style>