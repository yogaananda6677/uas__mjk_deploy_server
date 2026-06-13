@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        {{-- Card Profil Utama --}}
        <div class="card border-0 shadow-lg overflow-hidden">
            <div class="card-body p-0">

                <div class="row g-0">
                    {{-- Bagian Foto / Avatar --}}
                    <div class="col-md-4 bg-dark text-white text-center p-5 d-flex flex-column justify-content-center align-items-center">
                        <div class="rounded-circle bg-warning text-dark d-flex align-items-center justify-content-center fw-bold mb-3"
                            style="width: 150px; height: 150px; font-size: 48px;">
                            YA
                        </div>

                        <h4 class="fw-bold mb-1">Yoga Ananda</h4>
                        <p class="mb-0">Mahasiswa TI</p>
                        <small class="text-light">Software Developer Enthusiast</small>
                    </div>

                    {{-- Bagian Detail Profil --}}
                    <div class="col-md-8 p-5">
                        <h2 class="fw-bold mb-2">Profil Saya</h2>
                        <p class="text-muted mb-4">
                            Website ini dibuat sebagai project UAS sederhana berbasis Laravel dan MySQL
                            dengan menerapkan konsep MVC serta fitur CRUD.
                        </p>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Nama</div>
                            <div class="col-sm-8">Yoga Ananda Sabila Rizqi</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Program Studi</div>
                            <div class="col-sm-8">D3 Manajemen Informatika</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Kampus</div>
                            <div class="col-sm-8">Politeknik Negeri Malang PSDKU Kediri</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-4 fw-bold">Minat</div>
                            <div class="col-sm-8">Web Development, Data Science, Software Development</div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-4 fw-bold">Keahlian</div>
                            <div class="col-sm-8">
                                <span class="badge bg-primary me-1 mb-1">Laravel</span>
                                <span class="badge bg-success me-1 mb-1">PHP</span>
                                <span class="badge bg-warning text-dark me-1 mb-1">MySQL</span>
                                <span class="badge bg-info text-dark me-1 mb-1">HTML</span>
                                <span class="badge bg-secondary me-1 mb-1">CSS</span>
                                <span class="badge bg-dark me-1 mb-1">JavaScript</span>
                            </div>
                        </div>

                        <a href="{{ route('projects.index') }}" class="btn btn-primary px-4">
                            Lihat Project
                        </a>
                    </div>
                </div>

            </div>
        </div>

        {{-- Card Tambahan --}}
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">MVC</h5>
                        <p class="text-muted mb-0">
                            Menggunakan Model, View, dan Controller pada Laravel.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Database</h5>
                        <p class="text-muted mb-0">
                            Data disimpan menggunakan MySQL dan migration Laravel.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">CRUD</h5>
                        <p class="text-muted mb-0">
                            Fitur tambah, lihat, edit, dan hapus data project.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Project dari Database --}}
        <div class="mt-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h3 class="fw-bold mb-1">Project Saya</h3>
                    <p class="text-muted mb-0">
                        Data project berikut diambil langsung dari database MySQL.
                    </p>
                </div>

                <a href="{{ route('projects.index') }}" class="btn btn-outline-primary">
                    Kelola Project
                </a>
            </div>

            <div class="row">
                @forelse($projects as $project)
                    <div class="col-md-4 mb-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body d-flex flex-column">

                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="fw-bold mb-0">
                                        {{ $project->nama_project }}
                                    </h5>

                                    @if ($project->status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Proses</span>
                                    @endif
                                </div>

                                <p class="text-muted mb-2">
                                    {{ $project->kategori }}
                                </p>

                                <p class="mb-3">
                                    {{ \Illuminate\Support\Str::limit($project->deskripsi, 90) }}
                                </p>

                                <div class="mt-auto">
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-primary">
                                        Detail
                                    </a>

                                    @if ($project->link)
                                        <a href="{{ $project->link }}" target="_blank" class="btn btn-sm btn-outline-dark">
                                            Link
                                        </a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center py-5">
                                <h5 class="fw-bold">Belum Ada Project</h5>
                                <p class="text-muted">
                                    Silakan tambahkan data project melalui halaman CRUD Project.
                                </p>
                                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                                    Tambah Project
                                </a>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
