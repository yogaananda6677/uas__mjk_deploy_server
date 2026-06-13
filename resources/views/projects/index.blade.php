@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Data Project</h2>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">+ Tambah Project</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Project</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th width="230">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->nama_project }}</td>
                        <td>{{ $project->kategori }}</td>
                        <td>
                            @if($project->status == 'Selesai')
                                <span class="badge bg-success">Selesai</span>
                            @else
                                <span class="badge bg-warning text-dark">Proses</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data project.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
