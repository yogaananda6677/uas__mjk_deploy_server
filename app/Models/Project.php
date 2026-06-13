<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'nama_project',
        'kategori',
        'deskripsi',
        'link',
        'status',
    ];
}
