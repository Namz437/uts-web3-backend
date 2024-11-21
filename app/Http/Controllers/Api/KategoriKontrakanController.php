<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\Kategori_Kontrakan;
use Illuminate\Support\Facades\Validator;


class KategoriKontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kategori_kontrakan = Kategori_Kontrakan::all();
            $response = [
                'success' => true,
                'message' => 'Kategori Kontrakan Berhasil ditampilkan',
                'data' => $kategori_kontrakan
            ];
            return response()->json($kategori_kontrakan);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'Kategori Kontrakan Gagal ditampilkan',
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'kategori' => 'required|string|max:255',
            ]);

            // Cek validasi jika gagal
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }


            $kategori_kontrakan = Kategori_Kontrakan::create([
                'kategori' => $request->kategori,
            ]);

            $response = [
                'success' => true,
                'message' => 'Kategori Kontrakan Berhasil ditambahkan',
                'data' => $kategori_kontrakan
            ];
            return response()->json($kategori_kontrakan);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'Kategori Kontrakan Gagal ditambahkan',
            ];
            return response()->json($response, 500);
        }
    }

    public function show(string $id)
    {
        try {
            $data = Kategori_Kontrakan::find($id);
            $response = [
                'success' => true,
                'message' => 'Kategori Kontrakan Berhasil ditampilkan',
                'data' => $data
            ];
            return response()->json($data);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'Kategori Kontrakan Gagal ditampilkan',
            ];
            return response()->json($response, 500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
