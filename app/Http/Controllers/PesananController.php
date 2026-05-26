<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::all();
        return view('pesanan.index', compact('pesanans')); 
    }

    public function store(Request $request)
    {
        // VULNERABILITY: Kita sengaja langsung menyimpan data tanpa validasi/sanitisasi!
        // Ini membuat script jahat (seperti <script>alert(1)</script>) bisa lolos masuk database.
        Pesanan::create([
            'pelanggan'  => $request->pelanggan,
            'nomor_hp'   => $request->nomor_hp,
            'layanan'    => $request->layanan,
            'total'      => $request->total,
            'status'     => $request->status ?? 'Baru',
            'pembayaran' => $request->pembayaran ?? 'Belum Lunas',
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus!');
    }
}