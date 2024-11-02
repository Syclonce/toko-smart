<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_msks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('spr_barangs')->onDelete('cascade'); // Relasi dengan tabel suppliers
            $table->string('item_name'); // Nama barang
            $table->string('invoice_code'); // Kode faktur
            $table->foreignId('unit_id')->constrained('sta_barangs')->onDelete('cascade'); // Relasi dengan tabel units
            $table->date('purchase_date'); // Tanggal pembelian
            $table->decimal('unit_price', 15, 2); // Harga per satuan
            $table->integer('quantity'); // Jumlah barang
            $table->decimal('total_price', 15, 2); // Total harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_msks');
    }
};
