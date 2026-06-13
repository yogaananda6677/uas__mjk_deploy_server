<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|string|max:255',
            'status' => 'required|in:Selesai,Proses',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Data project berhasil ditambahkan.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'link' => 'nullable|string|max:255',
            'status' => 'required|in:Selesai,Proses',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')
            ->with('success', 'Data project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Data project berhasil dihapus.');
    }
}
