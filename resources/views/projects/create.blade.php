@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3">Tambah Project</h2>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama Project</label>
                <input type="text" name="nama_project" class="form-control" value="{{ old('nama_project') }}">
                @error('nama_project') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ old('kategori') }}"
                       placeholder="Contoh: Website, Mobile, Data Science">
                @error('kategori') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Link Project</label>
                <input type="text" name="link" class="form-control" value="{{ old('link') }}"
                       placeholder="Opsional">
                @error('link') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="Proses">Proses</option>
                    <option value="Selesai">Selesai</option>
                </select>
                @error('status') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
