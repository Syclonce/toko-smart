<?php

namespace App\Http\Controllers;

use App\Models\BarangMsk;
use App\Models\KtgrBarang;
use App\Models\SprBarang;
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

    public function sprbarang()
    {
        $title = 'Suplayer Barang';
        $suplayer = SprBarang::all();
        return view('barang.suplayer',compact('title','suplayer'));
    }


    public function addsprbarang(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'telepon' => 'required|string',

        ]);
        try {
            SprBarang::create([
                'nama' => $request->nama,
                'alamat' => $request->Alamat,
                'telepon' => $request->telepon,
            ]);

            return redirect()->route('master.sprbarang.barang')->with('success', 'Kategori berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->route('master.sprbarang.barang')->with('error', 'Gagal menambahkan kategori. Silakan coba lagi.');

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
        $suplayer = SprBarang::all();
        $satuan = StaBarang::all();
        $pembelian = BarangMsk::with(['supplier', 'unit'])->get();
        return view('barang.pebelianbarang',compact('title','suplayer','satuan','pembelian'));
    }

    public function addpblbarang(Request $request)
    {
        $request->validate([
            'instansi' => 'required|exists:spr_barangs,id',
            'namabrg' => 'required|string|max:255',
            'faktur' => 'required|string|max:255',
            'strbrg' => 'required|exists:sta_barangs,id',
            'tanggal' => 'required|date',
            'hrgst' => 'required|numeric',
            'jmlbrg' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);
        try {
            BarangMsk::create([
                'supplier_id' => $request->instansi,
                'item_name' => $request->namabrg,
                'invoice_code' => $request->faktur,
                'unit_id' => $request->strbrg,
                'purchase_date' => $request->tanggal,
                'unit_price' => $request->hrgst,
                'quantity' => $request->jmlbrg,
                'total_price' => $request->total,

            ]);

            return redirect()->route('pblbarang.barang')->with('success', 'Satuan berhasil ditambahkan!');

        } catch (\Exception $e) {

            return redirect()->route('pblbarang.barang')->with('error', 'Gagal menambahkan Satuan. Silakan coba lagi.');

        }
    }
}
