<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Premium Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #000; 
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        /* --- PREMIUM BACKGROUND (NO BLUR) --- */
        .premium-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('<?= base_url('picture/pic1.jpg') ?>'); 
            background-size: cover;
            background-position: center;
            z-index: -2;
            /* Keep it sharp: No blur filter here */
            animation: kenBurnsZoom 25s ease-in-out infinite alternate;
        }

        /* Dark overlay to ensure text visibility over the sharp image */
        .bg-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(0,0,0,0.7));
            z-index: -1;
        }

        @keyframes kenBurnsZoom {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        /* --- FULLY TRANSPARENT CARD --- */
        .card {
            border: 1px solid rgba(255, 255, 255, 0.2); 
            border-radius: 28px;
            /* Using rgba for transparency (0.15 = 15% opacity) */
            background: rgba(255, 255, 255, 0.15); 
            /* Blur removed as per your request */
            backdrop-filter: none; 
            -webkit-backdrop-filter: none;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5); 
            padding: 45px 35px;
            opacity: 0;
            transform: translateY(20px);
            animation: cardFadeIn 0.8s ease-out forwards;
        }

        @keyframes cardFadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 35px;
        }

        .grain-icon {
            font-size: 2.2rem;
            animation: sway 3s ease-in-out infinite;
        }

        @keyframes sway {
            0%, 100% { transform: rotate(-10deg); }
            50% { transform: rotate(10deg); }
        }

        h2 {
            font-weight: 800;
            color: #ffffff; /* Changed to white for better contrast on transparency */
            letter-spacing: 1px;
            text-transform: uppercase;
            font-size: 1.6rem;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .form-label {
            font-weight: 600;
            color: #ffffff; 
            font-size: 0.85rem;
            margin-bottom: 8px;
            text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.9); /* Input remains solid for usability */
            transition: all 0.3s ease;
        }

        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(255, 255, 255, 0.2);
            border-color: #ffffff;
            outline: none;
        }

        .btn-primary {
            background: #4a90e2;
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #cddb0c;
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(143, 206, 8, 0.4);
        }

        .btn-outline-secondary {
            border-radius: 12px;
            padding: 14px;
            font-weight: 600;
            border: 2px solid #7dbb77;
            color: #7dbb77;
            background: rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .btn-outline-secondary:hover {
            background-color: #7dbb77;
            color: #ffffff;
            border-color: #7dbb77;
        }

        .alert {
            border-radius: 12px;
            background: rgba(220, 53, 69, 0.9);
            color: white;
            border: none;
        }
    </style>
</head>
<body>

    <div class="premium-bg"></div>
    <div class="bg-overlay"></div>

    <div class="login-container">
        <div class="card">
            
            <div class="header-group">
                <span class="grain-icon">🌾</span>
                <h2>EJ RICE RETAILING</h2>
            </div>
            
            <?php if(session()->getFlashdata('msg')):?>
                <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
            <?php endif;?>

            <form action="<?= base_url('loginAuth') ?>" method="post">
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" placeholder="name@company.com" class="form-control" required>
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" placeholder="••••••••" class="form-control" required>
                </div>
                
                <div class="d-grid gap-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="<?= base_url('register') ?>" class="btn btn-outline-secondary">Create Account</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>