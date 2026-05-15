<div class="col-md-3 col-lg-2 d-md-block sidebar vh-100 p-0 shadow-lg position-fixed d-flex flex-column">
    <!-- Brand / Logo Area -->
    <div class="p-4 text-center border-bottom border-white border-opacity-10 d-flex flex-column align-items-center flex-shrink-0">
        <div class="brand-logo mb-2 shadow-sm">
            <i class="fas fa-seedling text-white fs-3"></i>
        </div>
        <h5 class="mb-0 fw-bold text-uppercase tracking-wider sidebar-brand-text">
            EJ RICE
        </h5>
        <small class="sidebar-subtext small fw-light mb-3">RETAILING SYSTEM</small>
        
        <!-- Theme Toggle -->
        <button id="themeToggle" class="theme-toggle mt-2" title="Toggle Light/Dark Mode">
            <i class="fas fa-moon" id="themeIcon"></i>
        </button>
    </div>
    
    <!-- Navigation Links -->
    <div class="mt-4 px-3 flex-grow-1 overflow-auto">
        <ul class="nav flex-column gap-2">
            <!-- Dashboard -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('dashboard*') ? 'active' : '') ?>" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-th-large"></i> 
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Rice Inventory -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('inventory*') ? 'active' : '') ?>" href="<?= base_url('inventory') ?>">
                    <i class="fas fa-database"></i> 
                    <span>Inventory</span>
                </a>
            </li>

            <!-- User Management -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('users*') ? 'active' : '') ?>" href="<?= base_url('users') ?>">
                    <i class="fas fa-user-shield"></i> 
                    <span>Management</span>
                </a>
            </li>

            <!-- Sales History -->
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-3 <?= (url_is('sales/history*') ? 'active' : '') ?>" href="<?= base_url('sales/history') ?>">
                    <i class="fas fa-history"></i> 
                    <span>Sales History</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- User Profile & Logout at Bottom -->
    <div class="p-4 border-top border-white border-opacity-10 user-profile-bottom flex-shrink-0 mt-auto">
        <div class="d-flex align-items-center gap-2 mb-3 px-2">
            <div class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center text-white shadow-sm" style="width: 32px; height: 32px;">
                <i class="fas fa-user small"></i>
            </div>
            <div class="overflow-hidden">
                <p class="text-white small fw-bold mb-0 text-truncate"><?= session()->get('username') ?></p>
                <p class="text-white-50 x-small mb-0">Administrator</p>
            </div>
        </div>
        <a class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2 py-2 shadow-sm" href="<?= base_url('logout') ?>">
            <i class="fas fa-sign-out-alt small"></i> 
            <span class="small fw-bold">Logout</span>
        </a>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;
        
        // Check for saved theme
        const savedTheme = localStorage.getItem('theme') || 'dark';
        html.setAttribute('data-theme', savedTheme);
        updateIcon(savedTheme);

        themeToggle.addEventListener('click', () => {
            const currentTheme = html.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            html.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);

            // Update Charts if they exist
            if (typeof updateChartsTheme === 'function') {
                updateChartsTheme(newTheme);
            }
        });

        function updateIcon(theme) {
            if (theme === 'light') {
                themeIcon.classList.remove('fa-moon');
                themeIcon.classList.add('fa-sun');
            } else {
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            }
        }
    });
</script>

<style>
    .sidebar {
        background: var(--sidebar-bg) !important;
        border-right: 1px solid var(--glass-border);
        z-index: 1000;
        transition: background-color 0.3s ease;
    }

    .nav-link {
        color: var(--sidebar-text) !important;
        padding: 0.9rem 1.2rem !important;
        border-radius: 14px !important;
        font-size: 0.95rem;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-bottom: 0.3rem;
    }

    .nav-link i {
        font-size: 1.1rem;
        width: 24px;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: var(--text-main) !important;
        background: var(--nav-hover-bg) !important;
        transform: translateX(5px);
    }

    .nav-link.active {
        color: #ffffff !important;
        background: linear-gradient(135deg, var(--accent-neon) 0%, #764ba2 100%) !important;
        box-shadow: 0 8px 20px rgba(157, 80, 187, 0.3);
    }

    .nav-link.active i {
        transform: scale(1.1);
    }

    .brand-logo {
        width: 48px;
        height: 48px;
        background: linear-gradient(135deg, var(--primary-neon), var(--accent-neon));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: 0 8px 16px rgba(0, 210, 255, 0.2);
    }

    .brand-logo i {
        color: white;
    }

    .user-profile-bottom {
        background: rgba(0, 0, 0, 0.2);
        backdrop-filter: blur(10px);
    }

    [data-theme="light"] .sidebar {
        background: #ffffff !important;
    }
    
    [data-theme="light"] .user-profile-bottom {
        background: #f1f5f9;
        color: #1e293b;
    }
    [data-theme="light"] .user-profile-bottom p {
        color: #1e293b !important;
    }

    .sidebar-brand-text {
        color: #ffffff;
    }
    [data-theme="light"] .sidebar-brand-text {
        color: #1e293b;
    }
</style>