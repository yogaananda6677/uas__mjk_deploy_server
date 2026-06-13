@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3">Detail Project</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <h4 class="fw-bold">{{ $project->nama_project }}</h4>

        <p><strong>Kategori:</strong> {{ $project->kategori }}</p>

        <p>
            <strong>Status:</strong>
            @if($project->status == 'Selesai')
                <span class="badge bg-success">Selesai</span>
            @else
                <span class="badge bg-warning text-dark">Proses</span>
            @endif
        </p>

        <p><strong>Deskripsi:</strong></p>
        <p>{{ $project->deskripsi }}</p>

        @if($project->link)
            <p>
                <strong>Link:</strong>
                <a href="{{ $project->link }}" target="_blank">{{ $project->link }}</a>
            </p>
        @endif

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
    </div>
</div>
@endsection
