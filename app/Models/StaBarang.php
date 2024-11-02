<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaBarang extends Model
{
   use HasFactory;
    protected $table = 'sta_barangs';
    protected $fillable = [
        'nama',
    ];
}
