<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'EJ Rice Retailing' ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #0d6efd 0%, #0043a8 100%);
            --success-gradient: linear-gradient(135deg, #198754 0%, #0f5132 100%);
            --info-gradient: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);
            --dark-gradient: linear-gradient(135deg, #212529 0%, #000000 100%);
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.4);
        }

        body { 
            background: #f0f2f5;
            font-family: 'Inter', sans-serif;
            color: #334155;
            overflow-x: hidden;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        .card-stat { 
            border-radius: 16px; 
            border: none; 
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .card-stat::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            pointer-events: none;
        }
        .card-stat:hover { 
            transform: translateY(-8px); 
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        }

        /* Transparency & Glass Effect for Analytics Cards */
        .analytics-card {
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            background: var(--glass-bg) !important;
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
        }
        .analytics-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Glass Card Effect for Tables */
        .glass-card {
            background: var(--glass-bg) !important;
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Gradient versions of stat cards */
        .bg-success-gradient { background: var(--success-gradient) !important; }
        .bg-primary-gradient { background: var(--primary-gradient) !important; }
        .bg-dark-gradient { background: var(--dark-gradient) !important; }

        .sidebar-offset {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .btn {
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .badge {
            font-weight: 600;
            letter-spacing: 0.3px;
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
