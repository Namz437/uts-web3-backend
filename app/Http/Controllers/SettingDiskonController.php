<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;
use App\Models\Kategori_Kontrakan;
use Illuminate\Support\Facades\Validator;

class SettingDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menggunakan relasi dengan nama yang benar
        $diskon = Diskon::all();

        return view('diskon.index', compact('diskon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all categories of kontrakan (rentals)
        $kategori_kontrakan = Kategori_Kontrakan::all();
        return view('diskon.create', compact('kategori_kontrakan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_diskon' => 'required|string|max:255',
            'persentase_diskon' => 'required|integer',  
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('diskon.index')
                ->withErrors($validator)
                ->withInput();
        }
    
        // Simpan data
        Diskon::create([
            'nama_diskon' => $request->nama_diskon,
            'persentase_diskon' => $request->persentase_diskon,  
        ]);
    
        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil ditambahkan');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Memastikan memanggil relasi dengan benar
        $diskon = Diskon::find($id);
        return view('diskon.show', compact('diskon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $diskon = Diskon::find($id);
    
        // Cek validasi
        if (empty($diskon)) {
            return redirect()->route('diskon.index')->with('error', 'Diskon tidak ditemukan');
        }
    
        return view('diskon.edit', compact('diskon'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'nama_diskon' => 'required',
            'persentase_diskon' => 'required',
        ]);
    
        // If validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Find the Diskon to update
        $diskon = Diskon::find($id);
    
        if (!$diskon) {
            return redirect()->route('diskon.index')->with('error', 'Diskon tidak ditemukan');
        }
    
        // Update the rest of the fields
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->persentase_diskon = $request->persentase_diskon;
    
        // Save the changes
        $diskon->save();
    
        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil diperbarui');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diskon = Diskon::find($id);
        $diskon->delete();

        return redirect()->route('diskon.index')->with('success', 'Diskon berhasil dihapus');
    }
}
