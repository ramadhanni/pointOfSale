<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MOdels\Produk;
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('test', compact('produk'));
    }

    public function create()
    {
        return view('test.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama_produk' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);

        $fileName = null;

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/img', $fileName);
        }

        Produk::create([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'foto_produk' => $fileName,
            'harga' => $request->harga,
        ]);

        return redirect()->route('test')->with(['success' => 'Data Berhasil ditambah']);
    }

    public function show($id)
    {
        // Implementasi jika diperlukan
    }

    public function showByCategory($kategori)
    {
        $produk = Produk::where('kategori', $kategori)->get();
        return view('test', compact('produk'));
    }

    public function edit($id)
    {
        $produks = Produk::find($id);
        return view('test.edit', compact('produk'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kategori' => 'required',
            'nama_produk' => 'required',
            'foto_produk' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'harga' => 'required',
        ]);

        $produks = Produk::find($id);
        $fileName = $produks->foto;

        if ($request->hasFile('foto_produk')) {
            $file = $request->file('foto_produk');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $file->storeAs('public/img', $fileName);
        }

        $produks->update([
            'kategori' => $request->kategori,
            'nama_produk' => $request->nama_produk,
            'foto_produk' => $fileName,
            'harga' => $request->harga,
        ]);

        return redirect()->route('test')->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id): RedirectResponse
    {
        $produks = Produk::find($id);
        $produks->delete();

        return redirect()->route('test')->with('success', 'Data berhasil dihapus.');
    }
}
