<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kontrakan;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class KontrakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $kontrakan = Kontrakan::all();
            $response = [
                'success' => true,
                'data' => $kontrakan,
                'message' => 'Data kontrakan tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Data Kontrakan tidak tersedia',
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
                'kategori_kontrakan_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'nama' => 'required|string|max:255',
                'deskripsi' => 'required',
                'alamat' => 'required|string',
                'harga' => 'required',
            ]);

            // Cek respon jika validasi gagal
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // upload image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            // create Ko$kontrakan
            $kontrakan = Kontrakan::create([
                'kategori_kontrakan_id' => $request->kategori_kontrakan_id,
                'image' => $image->hashName(),
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'harga' => $request->harga
            ]);

            // return response
            return response()->json(['message' => 'Kontrakan Berhasil Ditambahkan', 'data' => $kontrakan], 201);
        } catch (Exception $th) {
            $response = [
                'success' => false,
                'message' => 'Data Kontrakan tidak berhasil ditambahkan',
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $data = Kontrakan::where('id', $id)->first();
            $response = [
                'success' => true,
                'data' => $data,
                'message' => 'Data kontrakan tersedia',
            ];
            return response()->json($response, 200);
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Data kontrakan tidak tersedia',
            ];
            return response()->json($response, 500);
        }
    }

    public function update(Request $request, $id)
    {
        // devine validation rules
        $Validator = Validator::make($request->all(), [
            'kategori_kontrakan_id' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            'harga' => 'required',
        ]);

        // check if validations fails
        if ($Validator->fails()) {
            return response()->json($Validator->errors(), 422);
        }
        // find Ko$kontrakan by ID
        $kontrakan = Kontrakan::find($id);

        if ($request->hasFile('image')) {

            // upload image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            // delete old image
            Storage::delete('public/posts' . basename($kontrakan->image));

            // update Ko$kontrakan with new image
            $kontrakan->update([
                'kategori_kontrakan_id' => $request->kategori_kontrakan_id,
                'image' => $image->hashName(),
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'harga' => $request->harga
            ]);
        } else {

            // Update Ko$kontrakan without image
            $kontrakan->update([
                'kategori_kontrakan_id' => $request->kategori_kontrakan_id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'harga' => $request->harga
            ]);
        }

        // return response
        return response()->json(['message' => 'Gedung Berhasil Diupdate', 'data' => $kontrakan], 201);
    }

    public function destroy($id)
    {
        //find Ko$kontrakan by id
        $kontrakan = Kontrakan::find($id);

        // delete old image
        Storage::delete('public/posts' . basename($kontrakan->image));

        // delete Ko$kontrakan
        $kontrakan->delete();

        // return response
        $response = [
            'success' => true,
            'message' => 'Gedung Berhasil Dihapus',
        ];
        return response()->json($response, 200);
    }
}
