<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EJ Rice Retailing' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-color: #0f111a;
            --card-bg: #161925;
            --sidebar-bg: #121420;
            --primary-neon: #00d2ff;
            --accent-neon: #9d50bb;
            --success-neon: #00f2fe;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --glass-border: rgba(255, 255, 255, 0.05);
            --sidebar-text: #94a3b8;
            --nav-hover-bg: rgba(255, 255, 255, 0.03);
        }

        /* Ensure Font Awesome renders correctly */
        .fas, .fa-solid, .fa {
            font-family: "Font Awesome 6 Free", "Font Awesome 5 Free", sans-serif !important;
            font-weight: 900 !important;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
        }

        [data-theme="light"] {
            --bg-color: #f8fafc;
            --card-bg: #ffffff;
            --sidebar-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --glass-border: rgba(0, 0, 0, 0.05);
            --sidebar-text: #64748b;
            --nav-hover-bg: rgba(0, 0, 0, 0.03);
        }

        body { 
            background: var(--bg-color);
            font-family: 'Inter', sans-serif;
            color: var(--text-main);
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg-color);
        }
        ::-webkit-scrollbar-thumb {
            background: #2a2e3f;
            border-radius: 10px;
        }
        [data-theme="light"] ::-webkit-scrollbar-thumb {
            background: #e2e8f0;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-neon);
        }

        .card-stat { 
            border-radius: 20px; 
            border: 1px solid var(--glass-border); 
            background: var(--card-bg);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        
        .card-stat:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .analytics-card {
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            background: var(--card-bg) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .glass-card {
            background: var(--card-bg) !important;
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
        }

        .sidebar-offset {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .text-neon-primary { color: var(--primary-neon); }
        .text-neon-accent { color: var(--accent-neon); }
        
        h1, h2, h3, h4, h5 { color: inherit; }
        .text-muted { color: var(--text-muted) !important; }

        /* Table Text Visibility Fix */
        .table {
            color: var(--text-main) !important;
        }
        .table td, .table th {
            color: inherit !important;
        }
        .table-hover tbody tr:hover {
            color: var(--text-main) !important;
            background-color: var(--nav-hover-bg);
        }
        .table thead th {
            color: #ffffff; /* Keep headers white in dark mode table-dark */
        }
        [data-theme="light"] .table thead th {
            color: #ffffff; /* table-dark keeps it white even in light mode */
        }

        .text-themed-50 {
            color: rgba(255, 255, 255, 0.5) !important;
        }
        [data-theme="light"] .text-themed-50 {
            color: rgba(0, 0, 0, 0.5) !important;
        }

        .sidebar-subtext {
            color: rgba(255, 255, 255, 0.5);
        }
        [data-theme="light"] .sidebar-subtext {
            color: rgba(0, 0, 0, 0.5);
        }

        .bg-themed-pill {
            background: rgba(255, 255, 255, 0.05);
        }
        [data-theme="light"] .bg-themed-pill {
            background: rgba(0, 0, 0, 0.05);
        }

        /* Theme Toggle Switch */
        .theme-toggle {
            cursor: pointer;
            padding: 8px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--nav-hover-bg);
            border: 1px solid var(--glass-border);
            color: var(--text-main);
            transition: all 0.3s ease;
        }
        .theme-toggle:hover {
            background: var(--primary-neon);
            color: white;
        }
    </style>
    <?= $this->renderSection('styles') ?>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?= view('theme/sidebar') ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 sidebar-offset">
            <?= $this->renderSection('content') ?>
        </main>
    </div>
</div>

<!-- Bootstrap 5 Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<?= $this->renderSection('scripts') ?>
</body>
</html>
