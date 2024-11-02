<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KtgrBarang extends Model
{
    use HasFactory;
    protected $table = 'ktgr_barangs';
    protected $fillable = [
        'nama',
    ];
}
