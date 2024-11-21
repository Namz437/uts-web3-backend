<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Diskon;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;


class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pesanan = Pesanan::all();
            $response = [
                'success' => true,
                'data' => $pesanan,
                'message' => 'Data pesanan tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Data pesanan tidak tersedia',
            ];
            return response()->json($response, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'kontrakan_id' => 'required|integer',
            'diskon_id' => 'nullable|exists:diskons,id', 
            'user_id' => 'required|integer',
            'harga_asli' => 'required|numeric|min:0', 
            'harga_akhir' => 'nullable|numeric|min:0', 
            'status' => 'required|in:pending,approved,rejected', 
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Initialize hargaAkhir with harga_asli
        $hargaAkhir = $request->harga_asli;

        // If diskon_id is provided, apply discount
        if ($request->diskon_id) {
            $diskon = Diskon::find($request->diskon_id);

            // Check if diskon is found
            if ($diskon) {
                // Calculate the discounted price
                $hargaAkhir = $request->harga_asli - ($request->harga_asli * $diskon->persentase_diskon / 100);
            } else {
                // Return error if diskon_id is invalid
                return response()->json(['message' => 'Diskon tidak valid'], 422);
            }
        }

        // Create a new Pesanan entry
        $pesanan = Pesanan::create([
            'kontrakan_id' => $request->kontrakan_id,
            'diskon_id' => $request->diskon_id, // It can be null if no discount is provided
            'user_id' => $request->user_id,
            'harga_asli' => $request->harga_asli,
            'harga_akhir' => $hargaAkhir, // Store the final price after applying discount
            'status' => $request->status,
        ]);

        // Return success response with the created pesanan
        return response()->json([
            'message' => 'Pesanan Berhasil Ditambahkan',
            'data' => $pesanan
        ], 201);
    } catch (Exception $e) {
        // Catch any exceptions and return error response
        return response()->json([
            'success' => false,
            'message' => 'Data Pesanan tidak berhasil ditambahkan: ' . $e->getMessage()
        ], 500);
    }
}

public function update(Request $request, $id)
{
    try {
        // Validate incoming request
        $validator = Validator::make($request->all(), [
            'kontrakan_id' => 'required|integer',
            'diskon_id' => 'nullable|exists:diskons,id', 
            'user_id' => 'required|integer',
            'harga_asli' => 'required|numeric|min:0',
            'harga_akhir' => 'nullable|numeric|min:0',
            'status' => 'required|in:pending,approved,rejected', 
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Find the pesanan by ID
        $pesanan = Pesanan::find($id);
        if (!$pesanan) {
            return response()->json(['message' => 'Pesanan tidak ditemukan'], 404);
        }

        // Update the harga_akhir if diskon is applied
        $hargaAkhir = $request->harga_asli;
        if ($request->diskon_id) {
            $diskon = Diskon::find($request->diskon_id);
            if ($diskon) {
                $hargaAkhir = $request->harga_asli - ($request->harga_asli * $diskon->persentase_diskon / 100);
            } else {
                return response()->json(['message' => 'Diskon tidak valid'], 422);
            }
        }

        // Update pesanan fields
        $pesanan->kontrakan_id = $request->kontrakan_id;
        $pesanan->diskon_id = $request->diskon_id;
        $pesanan->user_id = $request->user_id;
        $pesanan->harga_asli = $request->harga_asli;
        $pesanan->harga_akhir = $hargaAkhir;
        $pesanan->status = $request->status;
        $pesanan->save();

        return response()->json([
            'message' => 'Pesanan berhasil diperbarui',
            'data' => $pesanan
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Data Pesanan tidak berhasil diperbarui: ' . $e->getMessage()
        ], 500);
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
