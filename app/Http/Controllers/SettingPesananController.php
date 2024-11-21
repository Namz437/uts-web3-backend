<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;
use App\Models\Kontrakan;
use App\Models\Pesanan;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SettingPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('Kontrakan', 'Diskon', 'User')->get();
        $diskon = Diskon::all();
        $kontrakan = Kontrakan::all();
        $user = User::all();
        
        return view('pesanan.index', compact('pesanan', 'diskon', 'kontrakan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pesanan = Pesanan::with('Kontrakan', 'Diskon', 'User')->find($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus');
    }
}
