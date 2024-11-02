<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprBarang extends Model
{
    use HasFactory;
    protected $table = 'spr_barangs';
    protected $fillable = [
        'nama',
        'alamat', 
        'telepon',
    ];

    public function purchases()
    {
        return $this->hasMany(BarangMsk::class);
    }
}
