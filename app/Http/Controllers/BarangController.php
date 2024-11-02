<?php

namespace App\Http\Controllers;

use App\Models\KtgrBarang;
use App\Models\StaBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $title = 'Rs Apps';


        return view('barang.index', compact('title'));
    }

    public function ktgbarang()
    {
        $title = 'Kategori Barang';
        $kategori = KtgrBarang::all();
        return view('barang.kategori',compact('title','kategori'));
    }

    public function addktgbarang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);
        try {
            KtgrBarang::create([
                'nama' => $request->nama
            ]);

            return redirect()->route('kategori.barang')->with('success', 'Kategori berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->route('kategori.barang')->with('error', 'Gagal menambahkan kategori. Silakan coba lagi.');

        }
    }

    public function stabarang()
    {
        $title = 'Satuan Barang';
        $satuan = StaBarang::all();
        return view('barang.satuan',compact('title','satuan'));
    }

    public function addstabarang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);
        try {
            StaBarang::create([
                'nama' => $request->nama
            ]);

            return redirect()->route('stabarang.barang')->with('success', 'Satuan berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->route('stabarang.barang')->with('error', 'Gagal menambahkan Satuan. Silakan coba lagi.');

        }
    }


    public function pblbarang()
    {
        $title = 'Data Pembelian Barang';
        return view('barang.pebelianbarang',compact('title'));
    }

    public function addpblbarang(Request $request)
    {
        $request->validate([
            'instansi' => 'required|string|max:255',
            'faktur' => 'required|string|max:255',
            'namabrg' => 'required|string|max:255',
            'hrgst' => 'required|numeric',
            'jmlbrg' => 'required|integer',
            'total' => 'required|numeric'
        ]);
        try {
            StaBarang::create([
                'instansi' => $request->instansi,
                'faktur' => $request->faktur,
                'nama_barang' => $request->namabrg,
                'harga_satuan' => $request->hrgst,
                'jumlah_barang' => $request->jmlbrg,
                'total_harga' => $request->total,

            ]);

            return redirect()->route('stabarang.barang')->with('success', 'Satuan berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->route('stabarang.barang')->with('error', 'Gagal menambahkan Satuan. Silakan coba lagi.');

        }
    }
}
