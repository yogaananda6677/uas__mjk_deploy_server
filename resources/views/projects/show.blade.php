@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">

        {{-- Card Utama dengan efek glassmorphism --}}
        <div class="card border-0 shadow-lg overflow-hidden" style="background: rgba(255,255,255,0.6); backdrop-filter: blur(12px); border-radius: 2rem;">
            <div class="card-body p-0">

                {{-- Header dengan gradien dan ikon --}}
                <div class="p-4 text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 2rem 2rem 0 0;">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px; font-size: 28px;">
                            <i class="fas fa-project-diagram text-white"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">{{ $project->nama_project }}</h2>
                            <p class="mb-0 opacity-75">{{ $project->kategori }}</p>
                        </div>
                    </div>
                </div>

                {{-- Body detail --}}
                <div class="p-4">

                    {{-- Status dengan badge besar --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="fw-semibold text-secondary">Status</span>
                        @if($project->status == 'Selesai')
                            <span class="badge bg-success rounded-pill px-4 py-2 fw-semibold" style="font-size: 0.95rem;">
                                <i class="fas fa-check-circle me-1"></i> Selesai
                            </span>
                        @else
                            <span class="badge bg-warning text-dark rounded-pill px-4 py-2 fw-semibold" style="font-size: 0.95rem;">
                                <i class="fas fa-spinner me-1"></i> Proses
                            </span>
                        @endif
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <h6 class="fw-bold text-secondary"><i class="fas fa-align-left me-2"></i>Deskripsi</h6>
                        <p class="text-dark" style="line-height: 1.7;">{{ $project->deskripsi }}</p>
                    </div>

                    {{-- Link (jika ada) --}}
                    @if($project->link)
                        <div class="mb-4">
                            <h6 class="fw-bold text-secondary"><i class="fas fa-link me-2"></i>Link Project</h6>
                            <a href="{{ $project->link }}" target="_blank" class="text-decoration-none" style="color: #6c5ce7; font-weight: 500;">
                                {{ $project->link }}
                                <i class="fas fa-external-link-alt ms-1" style="font-size: 0.8rem;"></i>
                            </a>
                        </div>
                    @endif

                    {{-- Tombol aksi --}}
                    <div class="d-flex flex-wrap gap-2 mt-4 pt-3 border-top border-light">
                        <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            <i class="fas fa-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning rounded-pill px-4">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        {{-- Tombol hapus (opsional) --}}
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4" onclick="return confirm('Yakin hapus project ini?')">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- Card tambahan (info lain, misal dibuat/diupdate) --}}
        <div class="mt-3 text-muted small text-center">
            <i class="fas fa-calendar-alt me-1"></i> Dibuat: {{ $project->created_at->format('d M Y, H:i') }}
            @if($project->created_at != $project->updated_at)
                &nbsp;|&nbsp; <i class="fas fa-edit me-1"></i> Diperbarui: {{ $project->updated_at->format('d M Y, H:i') }}
            @endif
        </div>

    </div>
</div>
@endsection
