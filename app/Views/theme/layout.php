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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body { 
            background-color: #f4f7f6; 
            font-family: 'Inter', sans-serif;
        }
        .card-stat { 
            border-radius: 12px; 
            border: none; 
            transition: all 0.3s ease; 
        }
        .card-stat:hover { 
            transform: translateY(-5px); 
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }

        /* Transparency & Glass Effect for Analytics Cards */
        .analytics-card {
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.4) !important; /* Transparent White */
            backdrop-filter: blur(10px); /* Frosted Glass Effect */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Glass Card Effect for Tables */
        .glass-card {
            background: rgba(255, 255, 255, 0.7) !important;
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
        }

        /* Transparent versions of stat cards */
        .bg-success-trans { background: rgba(25, 135, 84, 0.8) !important; }
        .bg-primary-trans { background: rgba(13, 110, 253, 0.8) !important; }
        .bg-dark-trans { background: rgba(33, 37, 41, 0.8) !important; }

        .sidebar-offset {
            padding-top: 20px;
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
