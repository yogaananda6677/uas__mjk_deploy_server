@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3">Edit Project</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Project</label>
                <input type="text" name="nama_project" class="form-control"
                       value="{{ old('nama_project', $project->nama_project) }}">
                @error('nama_project') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control"
                       value="{{ old('kategori', $project->kategori) }}">
                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi', $project->deskripsi) }}</textarea>
                @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Link Project</label>
                <input type="text" name="link" class="form-control"
                       value="{{ old('link', $project->link) }}">
                @error('link') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="Proses" {{ $project->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                    <option value="Selesai" {{ $project->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
