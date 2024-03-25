<?php

namespace App\Http\Controllers;
use App\Models\Kontak;
use App\Models\Buku;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller

{
    public function index()
    {
        // $kontaks = Kontak::all();
        $kontaks = Kontak::findOrFail(1);
        
        return view('admin.Kontak.kontak',compact('kontaks'));
    }
    // Menyimpan data kontak baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'email' => 'required|email|unique:kontak,email',
            'kontak_hp' => 'required',
        ]);

        Kontak::create($request->all());

        return redirect()->back()->with('success', 'kontak berhasil ditambahkan.');}

    // Mengupdate data kontak
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:kontak,email,' . $kontak->id,
            'kontak_hp' => 'required',
        ]);

        $kontak->update($request->all());

        return redirect()->route('kontak.index')->with('success', 'Kontak berhasil diperbarui.');
    }
}
