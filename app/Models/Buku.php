<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $table = 'table_buku';

    protected $fillable = [
        'nama',
        'dibuat_oleh',
    ];
}
