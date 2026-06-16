@extends('layouts.app')

@section('content')
    {{-- CSS tambahan untuk desain baru --}}
    <style>
        /* Background gradien yang memenuhi layar */
        .profile-page {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        /* Efek glassmorphism pada card utama */
        .glass-card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            padding: 2rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.3);
        }

        /* Avatar lingkaran dengan border gradien */
        .avatar-wrapper {
            width: 160px;
            height: 160px;
            padding: 6px;
            background: linear-gradient(45deg, #f093fb 0%, #f5576c 100%);
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            box-shadow: 0 15px 35px -8px rgba(0, 0, 0, 0.3);
        }

        .avatar-inner {
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
            font-weight: 800;
            color: #5a3d8b;
            backdrop-filter: blur(4px);
        }

        /* Judul dan teks */
        .profile-title {
            color: #fff;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .profile-subtitle {
            color: rgba(255, 255, 255, 0.85);
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        /* Info profil dalam grid */
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem 2rem;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 1.5rem;
            padding: 1.5rem 2rem;
            backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .info-item {
            display: flex;
            align-items: baseline;
            gap: 0.5rem;
            color: #fff;
            font-size: 1rem;
        }

        .info-item .label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.7);
            min-width: 90px;
        }

        .info-item .value {
            font-weight: 400;
            color: #fff;
        }

        /* Badge skill dengan warna gradien unik */
        .skill-badge {
            display: inline-block;
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            color: #fff;
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            margin: 0.25rem 0.5rem 0.25rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .skill-badge:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* Variasi warna untuk skill badge */
        .skill-badge:nth-child(1) {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .skill-badge:nth-child(2) {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .skill-badge:nth-child(3) {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        .skill-badge:nth-child(4) {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .skill-badge:nth-child(5) {
            background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
        }

        .skill-badge:nth-child(6) {
            background: linear-gradient(135deg, #fccb90 0%, #d57eeb 100%);
        }

        /* Card tambahan (MVC, Database, CRUD) */
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 1.5rem;
            padding: 1.5rem;
            text-align: center;
            color: #fff;
            transition: all 0.3s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.3);
        }

        .feature-card .icon {
            font-size: 2.5rem;
            margin-bottom: 0.75rem;
            display: block;
        }

        .feature-card h5 {
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .feature-card p {
            opacity: 0.8;
            margin-bottom: 0;
            font-weight: 300;
        }

        /* Project cards dalam gaya baru */
        .project-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 1.5rem;
            padding: 1.5rem;
            color: #fff;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .project-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.18);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.3);
        }

        .project-card .status-badge {
            padding: 0.25rem 1rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .project-card .status-selesai {
            background: #34d399;
            color: #064e3b;
        }

        .project-card .status-proses {
            background: #fbbf24;
            color: #78350f;
        }

        .project-card .project-title {
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .project-card .project-category {
            font-size: 0.85rem;
            opacity: 0.7;
            margin-bottom: 0.75rem;
        }

        .project-card .project-desc {
            font-weight: 300;
            line-height: 1.5;
            flex-grow: 1;
        }

        .project-card .btn-outline-light {
            border-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            transition: all 0.2s ease;
        }

        .project-card .btn-outline-light:hover {
            background: #fff;
            color: #4a2c6b;
            border-color: #fff;
        }

        .project-card .btn-primary {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: #fff;
            transition: all 0.2s ease;
        }

        .project-card .btn-primary:hover {
            background: #fff;
            color: #4a2c6b;
            border-color: #fff;
        }

        /* Tombol utama */
        .btn-outline-light-custom {
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            background: rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
            border-radius: 50px;
            padding: 0.6rem 2rem;
            font-weight: 500;
            backdrop-filter: blur(4px);
        }

        .btn-outline-light-custom:hover {
            background: #fff;
            color: #4a2c6b;
            border-color: #fff;
            transform: scale(1.03);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
                padding: 1rem;
            }

            .info-item .label {
                min-width: 70px;
            }

            .avatar-wrapper {
                width: 120px;
                height: 120px;
            }

            .avatar-inner {
                font-size: 48px;
            }
        }
    </style>

    <div class="profile-page">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    {{-- Card Profil Utama (Glassmorphism) --}}
                    <div class="glass-card">
                        <div class="row align-items-center">
                            {{-- Bagian Avatar --}}
                            <div class="col-md-4 text-center mb-4 mb-md-0">
                                <div class="avatar-wrapper">
                                    <div class="avatar-inner">GO</div>
                                </div>
                                <h2 class="profile-title fw-bold">Naufal</h2>
                                <p class="profile-subtitle mb-1">Mahasiswa TI</p>
                                <small class="text-light" style="opacity:0.7;">Software Developer Enthusiast</small>
                            </div>

                            {{-- Bagian Detail Profil --}}
                            <div class="col-md-8">
                                <p class="text-light mb-4" style="font-weight:300; opacity:0.9;">
                                    Website ini dibuat sebagai project UAS sederhana berbasis Laravel dan MySQL
                                    dengan menerapkan konsep MVC serta fitur CRUD.
                                </p>

                                <div class="info-grid">
                                    <div class="info-item">
                                        <span class="label">Nama</span>
                                        <span class="value">Naufal</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Program Studi</span>
                                        <span class="value">D3 Manajemen Informatika</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Kampus</span>
                                        <span class="value">Politeknik Negeri Malang PSDKU Kediri</span>
                                    </div>
                                    <div class="info-item">
                                        <span class="label">Minat</span>
                                        <span class="value">Web Development, Data Science, Software Development</span>
                                    </div>
                                </div>

                                {{-- Keahlian --}}
                                <div class="mt-3">
                                    <span class="skill-badge">Laravel</span>
                                    <span class="skill-badge">PHP</span>
                                    <span class="skill-badge">MySQL</span>
                                    <span class="skill-badge">HTML</span>
                                    <span class="skill-badge">CSS</span>
                                    <span class="skill-badge">JavaScript</span>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ route('projects.index') }}" class="btn btn-outline-light-custom">
                                        Lihat Project
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Card Tambahan (MVC, Database, CRUD) --}}
                    <div class="row mt-4 g-3">
                        <div class="col-md-4">
                            <div class="feature-card">
                                <span class="icon">⚙️</span>
                                <h5>MVC</h5>
                                <p>Menggunakan Model, View, dan Controller pada Laravel.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <span class="icon">🗄️</span>
                                <h5>Database</h5>
                                <p>Data disimpan menggunakan MySQL dan migration Laravel.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="feature-card">
                                <span class="icon">✏️</span>
                                <h5>CRUD</h5>
                                <p>Fitur tambah, lihat, edit, dan hapus data project.</p>
                            </div>
                        </div>
                    </div>

                    {{-- Project dari Database --}}
                    <div class="mt-5">
                        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                            <div>
                                <h3 class="fw-bold text-white" style="text-shadow: 0 2px 10px rgba(0,0,0,0.2);">Project Saya
                                </h3>
                                <p class="text-light" style="opacity:0.7;">
                                    Data project berikut diambil langsung dari database MySQL.
                                </p>
                            </div>
                            <a href="{{ route('projects.index') }}" class="btn btn-outline-light-custom">
                                Kelola Project
                            </a>
                        </div>

                        <div class="row g-3">
                            @forelse($projects as $project)
                                <div class="col-md-4">
                                    <div class="project-card">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <h5 class="project-title">{{ $project->nama_project }}</h5>
                                            @if ($project->status == 'Selesai')
                                                <span class="status-badge status-selesai">Selesai</span>
                                            @else
                                                <span class="status-badge status-proses">Proses</span>
                                            @endif
                                        </div>
                                        <div class="project-category">{{ $project->kategori }}</div>
                                        <p class="project-desc">
                                            {{ \Illuminate\Support\Str::limit($project->deskripsi, 90) }}
                                        </p>
                                        <div class="mt-3 d-flex gap-2">
                                            <a href="{{ route('projects.show', $project->id) }}"
                                                class="btn btn-primary btn-sm">
                                                Detail
                                            </a>
                                            @if ($project->link)
                                                <a href="{{ $project->link }}" target="_blank"
                                                    class="btn btn-outline-light btn-sm">
                                                    Link
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="project-card text-center py-5">
                                        <h5 class="fw-bold">Belum Ada Project</h5>
                                        <p class="text-light" style="opacity:0.7;">
                                            Silakan tambahkan data project melalui halaman CRUD Project.
                                        </p>
                                        <a href="{{ route('projects.create') }}" class="btn btn-outline-light-custom">
                                            Tambah Project
                                        </a>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
