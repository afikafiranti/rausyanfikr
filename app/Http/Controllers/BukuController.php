<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        $categories = Kategori::all();
        return view('admin.index', compact('bukus', 'categories'));
    }
    public function edit($id)
    {
        $buku = Buku::find($id); // Mengambil data buku dari database berdasarkan ID
        return view('admin.edit', compact('buku')); // Menampilkan view edit dengan menyertakan data buku
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'halaman' => 'required|integer',
            'sampul' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required', 
            'isbn' => 'required|unique:buku',
        ], [
            'judul.required' => 'Judul buku harus diisi.',
            'penulis.required' => 'Nama penulis harus diisi.',
            'halaman.required' => 'Jumlah halaman harus diisi.',
            'halaman.integer' => 'Jumlah halaman harus berupa angka.',
            'sampul.image' => 'File harus berupa gambar.',
            'sampul.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'sampul.max' => 'Ukuran gambar maksimal 2 MB.',
            'tahun_terbit.required' => 'Tahun terbit harus diisi.',
            'tahun_terbit.integer' => 'Tahun terbit harus berupa angka.',
            'kategori.required' => 'Kategori buku harus dipilih.',            
            'isbn.required' => 'Nomor ISBN harus diisi.',
            'isbn.unique' => 'Nomor ISBN sudah digunakan.',
        ]);

        $imageName = null;
        if ($request->hasFile('sampul')) {
            $image = $request->file('sampul');
            if ($image->isValid()) {
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);
            } else {
                return redirect()->back()->withErrors(['error' => 'Gagal mengunggah gambar.']);
            }
        }

        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'halaman' => $request->halaman,
            'sampul' => $imageName,
            'tahun_terbit' => $request->tahun_terbit,
            'kategori' => $request->kategori,
            'isbn' => $request->isbn,
        ]);

        return redirect()->back()->with('success', 'Buku berhasil ditambahkan.');
    }


    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'halaman' => 'required|integer',
            'sampul' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'tahun_terbit' => 'required|integer',
            'kategori' => 'required', 
            'isbn' => 'required|unique:buku,isbn,' . $buku->id,
        ]);

        if ($request->hasFile('sampul')) {
            $imageName = time() . '.' . $request->sampul->extension();
            $request->sampul->move(public_path('images'), $imageName);
            $buku->update(['sampul' => $imageName]);
        }

        $buku->update($request->all());

        return redirect()->back()->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->back()->with('success', 'Buku berhasil dihapus.');
    }
}
