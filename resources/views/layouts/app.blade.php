<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>UAS Web Profil & CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome (opsional, untuk ikon) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* ---------- GLOBAL ---------- */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* ---------- NAVBAR GLASSMORPHISM ---------- */
        .navbar-glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            padding: 0.75rem 0;
        }

        .navbar-glass .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #2d3748;
            letter-spacing: -0.5px;
        }

        .navbar-glass .navbar-brand i {
            color: #6c5ce7;
            margin-right: 8px;
        }

        .navbar-glass .nav-link {
            color: #2d3748 !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            transition: all 0.2s ease;
        }

        .navbar-glass .nav-link:hover {
            background: rgba(255, 255, 255, 0.4);
            color: #1a202c !important;
        }

        .navbar-glass .btn-outline-dark {
            border-color: rgba(45, 55, 72, 0.3);
            color: #2d3748;
            border-radius: 50px;
            font-weight: 500;
            padding: 0.4rem 1.2rem;
            transition: all 0.2s ease;
        }

        .navbar-glass .btn-outline-dark:hover {
            background: #2d3748;
            color: #fff;
            border-color: #2d3748;
        }

        .navbar-glass .btn-warning {
            background: #f6ad55;
            border: none;
            color: #2d3748;
            border-radius: 50px;
            font-weight: 600;
            padding: 0.4rem 1.2rem;
            transition: all 0.2s ease;
        }

        .navbar-glass .btn-warning:hover {
            background: #ed8936;
            transform: scale(1.03);
        }

        /* ---------- MAIN CONTENT ---------- */
        .main-content {
            padding: 2rem 0 3rem;
        }

        /* ---------- FOOTER MINIMALIS ---------- */
        .footer-modern {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1.5rem 0;
            margin-top: 3rem;
            color: #2d3748;
            text-align: center;
            font-weight: 300;
            letter-spacing: 0.3px;
        }

        .footer-modern small {
            opacity: 0.7;
        }

        .footer-modern i {
            color: #e53e3e;
        }

        /* ---------- RESPONSIVE ---------- */
        @media (max-width: 576px) {
            .navbar-glass .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar-glass .btn {
                font-size: 0.8rem;
                padding: 0.3rem 0.8rem;
            }
        }
    </style>
</head>

<body>

    {{-- ===== NAVBAR BARU ===== --}}
    <nav class="navbar navbar-expand-lg navbar-glass">
        <div class="container">
            <a class="navbar-brand" href="{{ route('profile') }}">
                <i class="fas fa-code"></i> Web UAS
            </a>

            <div class="d-flex gap-2">
                <a href="{{ route('profile') }}" class="btn btn-outline-dark">
                    <i class="fas fa-user me-1"></i> Profil
                </a>
                <a href="{{ route('projects.index') }}" class="btn btn-warning">
                    <i class="fas fa-tasks me-1"></i> CRUD Project
                </a>
            </div>
        </div>
    </nav>

    {{-- ===== KONTEN UTAMA ===== --}}
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{-- ===== FOOTER MODERN ===== --}}
    <footer class="footer-modern">
        <div class="container">
            <small>
                <i class="fas fa-heart"></i> © 2026 - Web Profil &amp; CRUD Laravel
            </small>
        </div>
    </footer>

    {{-- Bootstrap JS (opsional) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
