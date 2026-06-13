<?php

use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $projects = Project::latest()->take(3)->get();

    return view('projects.profile', compact('projects'));
})->name('profile');

Route::resource('projects', ProjectController::class);
