<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;

class PembelianController extends Controller
{
    public function simpanPesanan(Request $request)
    {
        // Validasi request sesuai kebutuhan Anda
        $request->validate([
            'pesanan' => 'required|array', // Memastikan pesanan adalah array
            'pesanan.*.id' => 'required|exists:produk,id', // Memastikan setiap ID produk yang dikirim valid
            'pesanan.*.jumlah' => 'required|integer|min:1', // Memastikan setiap jumlah pesanan adalah angka positif
        ]);

        // Memproses setiap item pesanan
        foreach ($request->pesanan as $item) {
            // Simpan detail pembelian ke dalam database
            Pembelian::create([
                'product_id' => $item['id'],
                'quantity' => $item['jumlah'],
                'jumlah' => $item['jumlah'] * $item['harga'], // Menghitung total harga berdasarkan jumlah dan harga produk
            ]);
        }

        // Jika Anda memerlukan respons khusus setelah penyimpanan berhasil, Anda dapat mengirimkan respons JSON
        return response()->json(['message' => 'Pesanan berhasil disimpan'], 200);
    }
}
