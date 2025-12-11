<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Administrator - RSU System</title>
    <link rel="icon" href="<?php echo base_url();?>/assets/frontview/img/favicon.png" sizes="16x16" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-glow: 99, 102, 241; /* Indigo */
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --input-bg: rgba(15, 23, 42, 0.6);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            overflow: hidden;
            background-color: #0f172a;
            /* Animated Gradient Background */
            background: linear-gradient(-45deg, #0f172a, #1e1b4b, #312e81, #020617);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* --- MAIN WRAPPER --- */
        .main-login-wrapper {
            width: 100%;
            max-width: 1100px;
            display: flex;
            background: var(--glass-bg);
            backdrop-filter: blur(40px) saturate(120%);
            border: 1px solid var(--glass-border);
            border-radius: 30px;
            box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            animation: fadeInUp 1s cubic-bezier(0.2, 0.8, 0.2, 1) both;
            max-height: 620px;  
        }


        /* --- LEFT SIDE --- */
        .left-panel {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .left-panel-content { animation: slideInLeft 0.8s ease-out 0.3s both; }

        .hero-title {
            font-weight: 800;
            font-size: 3rem;
            line-height: 1.2;
            margin-bottom: 20px;
            background: linear-gradient(to right, #fff, #c7d2fe);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature-badges {
            display: flex; gap: 15px; margin-top: 30px;
        }

        .f-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            padding: 8px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.8);
            display: flex; align-items: center; gap: 8px;
        }

        /* --- RIGHT SIDE --- */
        .right-panel {
            flex: 1;
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            animation: fadeIn 1s ease-out 0.5s both; 
        }

        /* Logo Animation */
        .big-logo-container {
            text-align: center;
            margin-bottom: 40px;
            animation: floatLogo 6s ease-in-out infinite;
        }
        .big-logo-wrapper {
            display: inline-block;
            width: 290px; height: 130px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(7px);
            border-radius: 35px;
            border: 3px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 0 50px -10px rgba(var(--primary-glow), 0.3);
        }
        .big-logo-wrapper img {
            width: 100%; height: 100%; object-fit: contain;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.2));
        }

        /* --- NEW FORM STYLE (Label Outside) --- */
        .custom-label {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Wrapper untuk Input + Icon */
        .input-glass-wrapper {
            display: flex;
            align-items: center;
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 5px 15px;
            transition: all 0.3s ease;
        }

        /* Efek Focus pada Wrapper */
        .input-glass-wrapper:focus-within {
            border-color: rgb(var(--primary-glow));
            box-shadow: 0 0 0 4px rgba(var(--primary-glow), 0.15);
            background: rgba(15, 23, 42, 0.8);
        }

        /* Icon di kiri */
        .input-icon-left {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.5);
            margin-right: 12px;
        }
        .input-glass-wrapper:focus-within .input-icon-left {
            color: rgb(var(--primary-glow));
        }

        /* Input Field Asli */
        .custom-input {
            width: 100%;
            background: transparent;
            border: none;
            color: white;
            padding: 10px 0;
            outline: none;
            font-weight: 500;
        }
        .custom-input::placeholder { color: rgba(255, 255, 255, 0.3); }

        /* Tombol Eye di kanan */
        .toggle-pass-btn {
            background: none; border: none; padding: 5px;
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer; display: flex; align-items: center;
        }
        .toggle-pass-btn:hover { color: white; }

        /* Button Login */
        .btn-glow-primary {
            background: linear-gradient(135deg, rgb(var(--primary-glow)), #4f46e5);
            border: none; padding: 14px; border-radius: 12px;
            font-weight: 700; letter-spacing: 0.5px; 
            margin-top: 10px;
            transition: all 0.3s;
        }
        .btn-glow-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px -10px rgba(var(--primary-glow), 0.5);
        }

        /* Keyframes */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-30px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes floatLogo { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-10px); } }

        /* Mobile */
        @media (max-width: 991px) {
            .main-login-wrapper { flex-direction: column; max-width: 500px; }
            .left-panel { display: none; }
            .right-panel { padding: 40px 30px; }
            body { align-items: flex-start; padding-top: 40px; }
        }
    </style>
</head>

<body>

    <main class="main-login-wrapper">
        <div class="left-panel d-none d-lg-flex">
            <div class="left-panel-content">
                <h1 class="hero-title">Sistem Informasi Manajemen RS</h1>
                <p class="text-white-50 fs-5 mb-4">
                    Portal Administrasi Internal Rumah Sakit untuk pengelolaan data dan sistem operasional.
                </p>
                <div class="feature-badges">
                    <div class="f-badge"><i class="bi bi-shield-lock-fill text-info"></i> Secure Access</div>
                    <div class="f-badge"><i class="bi bi-activity text-success"></i> Real-time Monitoring</div>
                    <div class="f-badge"><i class="bi bi-journal-check text-danger"></i> content management</div>
                </div>
            </div>
            <div style="position: absolute; bottom: -50px; left: -50px; width: 200px; height: 200px; background: radial-gradient(circle, rgba(99,102,241,0.3) 0%, transparent 70%); filter: blur(40px);"></div>
        </div>

        <div class="right-panel">
            
            <div class="big-logo-container">
                <div class="big-logo-wrapper">
                    <img src="<?php echo base_url();?>assets/frontview/img/logorsu.svg" alt="RSU Logo">
                </div>
            </div>

            <div class="text-center mb-4">
                <h4 class="fw-bold text-white mb-1">Selamat Datang</h4>
                <p class="text-white-50 small">Masuk ke Portal Administrator</p>
            </div>

            <form method="POST" action="<?php echo base_url();?>login/login" autocomplete="off">
                
                <div class="mb-4">
                    <label for="username" class="custom-label">USERNAME</label>
                    <div class="input-glass-wrapper">
                        <i class="bi bi-person-fill input-icon-left"></i>
                        <input type="text" class="custom-input" name="username" id="username" placeholder="Masukkan username anda" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="custom-label">PASSWORD</label>
                    <div class="input-glass-wrapper">
                        <i class="bi bi-lock-fill input-icon-left"></i>
                        <input type="password" class="custom-input" name="password" id="password" placeholder="Masukkan password anda" required>
                        <button type="button" class="toggle-pass-btn" id="btnToggle">
                            <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-glow-primary w-100 btn-lg"><i class="bi bi-arrow-left-short ms-1"></i>
                    Masuk Sistem <i class="bi bi-arrow-right-short ms-1"></i>
                </button>

            </form>
        </div>
    </main>

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
        <div id="errorToast" class="toast align-items-center text-bg-danger border-0 shadow-lg rounded-4" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-3 py-3 px-4">
                    <i class="bi bi-x-octagon-fill fs-4"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Gagal Masuk</h6>
                        <span id="toastMessage" class="small opacity-75"></span>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white me-3 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // 1. Logic Toggle Password
        const passwordInput = document.getElementById('password');
        const toggleBtn = document.getElementById('btnToggle');
        const eyeIcon = document.getElementById('eyeIcon');

        toggleBtn.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            eyeIcon.className = type === 'text' ? 'bi bi-eye-fill' : 'bi bi-eye-slash-fill';
        });

        // 2. Logic Toast (Pesan Error)
        document.addEventListener('DOMContentLoaded', function() {
            // Kita ambil nilai flashdata langsung dari PHP dan masukkan ke variabel JS
            // Ini metode paling aman agar pesan tidak hilang saat render
            const flashMessage = "<?php echo $this->session->flashdata('message'); ?>";
            
            // Debugging: Cek di console browser apakah pesan masuk
            console.log("Status Pesan Error:", flashMessage);

            if (flashMessage && flashMessage.trim() !== "") {
                const toastEl = document.getElementById('errorToast');
                const msgContainer = document.getElementById('toastMessage');
                
                // Masukkan pesan ke dalam toast
                msgContainer.innerHTML = flashMessage;
                
                // Tampilkan Toast
                const toast = new bootstrap.Toast(toastEl, { delay: 6000 });
                toast.show();
            }
        });
    </script>

</body>
</html>