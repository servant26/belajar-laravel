<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    // Nama tabel (opsional, karena Laravel otomatis pakai plural)
    protected $table = 'people';
    
    // Field yang boleh diisi (mass assignment)
    protected $fillable = ['nama', 'umur'];
}