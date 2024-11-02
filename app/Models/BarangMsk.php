<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMsk extends Model
{
    use HasFactory;
    protected $table = 'barang_msks';
    protected $fillable = [
        'supplier_id',
        'item_name',
        'invoice_code',
        'unit_id',
        'purchase_date',
        'unit_price',
        'quantity',
        'total_price',
    ];

    public function supplier()
    {
        return $this->belongsTo(SprBarang::class);
    }

    public function unit()
    {
        return $this->belongsTo(StaBarang::class);
    }

}
