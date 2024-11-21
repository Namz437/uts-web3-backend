<?php

namespace App\Http\Controllers;

use App\Models\Kategori_Kontrakan;
use App\Models\Kontrakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingKontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan relasi dengan nama yang benar
        $kontrakan = Kontrakan::with('Kategori_Kontrakan')->get();
        $kategori_kontrakan = Kategori_Kontrakan::all();

        return view('kontrakan.index', compact('kontrakan', 'kategori_kontrakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori_kontrakan = Kategori_Kontrakan::all();
        return view('kontrakan.create', compact('kategori_kontrakan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_kontrakan_id' => 'required|exists:kategori_kontrakans,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'harga' => 'required|numeric',
        ]);

        // Jika validasi gagal, kembalikan error
        if ($validator->fails()) {
            return redirect()->route('kontrakan.index')
                ->withErrors($validator)
                ->withInput();
        }

        // Upload gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
            $image->storeAs('public/posts', $imageName);
        }

        // Simpan data ke database
        Kontrakan::create([
            'kategori_kontrakan_id' => $request->kategori_kontrakan_id,
            'image' => $imageName,
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'harga' => $request->harga,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kontrakan.index')->with('success', 'Kontrakan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Memastikan memanggil relasi dengan benar
        $kontrakan = Kontrakan::with('Kategori_Kontrakan')->find($id);
        $kategori_kontrakan = Kategori_Kontrakan::all();

        return view('kontrakan.show', compact('kontrakan', 'kategori_kontrakan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kontrakan = Kontrakan::with('Kategori_Kontrakan')->find($id);

        // Cek validasi
        if (empty($kontrakan)) {
            return redirect()->route('kontrakan.index')->with('error', 'Kontrakan tidak ditemukan');
        }

        $kategori_kontrakan = Kategori_Kontrakan::all();
        return view('kontrakan.edit', compact('kontrakan', 'kategori_kontrakan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'kategori_kontrakan_id' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Make image nullable
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
        ]);

        // If validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Find the Kontrakan to update
        $kontrakan = Kontrakan::find($id);

        if (!$kontrakan) {
            return redirect()->route('kontrakan.index')->with('error', 'Kontrakan tidak ditemukan');
        }

        // Upload image if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();  // Generate a unique name
            $image->storeAs('public/posts', $imageName);  // Store image in public/posts folder

            // Update the image field in the database
            $kontrakan->image = $imageName;
        }

        // Update the rest of the fields
        $kontrakan->kategori_kontrakan_id = $request->kategori_kontrakan_id;
        $kontrakan->nama = $request->nama;
        $kontrakan->deskripsi = $request->deskripsi;
        $kontrakan->alamat = $request->alamat;
        $kontrakan->harga = $request->harga;

        // Save the changes
        $kontrakan->save();

        return redirect()->route('kontrakan.index')->with('success', 'Kontrakan berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kontrakan = Kontrakan::with('Kategori_Kontrakan')->find($id);
        $kontrakan->delete();

        return redirect()->route('kontrakan.index')->with('success', 'Kontrakan berhasil dihapus');
    }
}
