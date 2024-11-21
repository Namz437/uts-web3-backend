<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Kontrakan;
use Illuminate\Http\Request;


class SettingKategoriKontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Kategori_Kontrakan = Kategori_Kontrakan::all();
        return view('kategorikontrakan.index', compact('Kategori_Kontrakan'));
    }

    public function create()
    {
        $Kategori_Kontrakan = Kategori_Kontrakan::all();
        return view('kategorikontrakan.create', compact('Kategori_Kontrakan'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);
        Kategori_Kontrakan::create($validator);
        return redirect()->route('kategorikontrakan.index')->with('success', 'Data Kategori Kontrakan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $Kategori_Kontrakan = Kategori_Kontrakan::find($id);
        return view('kategorikontrakan.edit', compact('Kategori_Kontrakan'));
    }

    public function update(Request $request, string $id)
    {

        $validator = $request->validate([
            'kategori' => 'required|string|max:255',
        ]);
        $Kategori_Kontrakan = Kategori_Kontrakan::find($id);
        $Kategori_Kontrakan->update($validator);
        return redirect()->route('kategorikontrakan.index')->with('success', 'Data Berhasil Diubah');
    }


    public function destroy(string $id)
    {
        $Kategori_Kontrakan = Kategori_Kontrakan::find($id);
        $Kategori_Kontrakan->delete();
        return redirect()->route('kategorikontrakan.index')->with('success', 'Data Berhasil Dihapus');
    }
}
