<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\User;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
   public function index() {
        return response()->json(User::all());
   }

   public function store(Request $request) {
        $umkm = Umkm::create([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'status' => $request->status,
        ]);
        return response()->json($umkm);
   }

   public function show($id) {
        return response()->json(Umkm::findOrFail($id));
   }

   public function update(Request $request, $id) {
        $umkm = Umkm::findOrFail($id);
        $umkm->update([
            'nama_umkm' => $request->nama_umkm,
            'pemilik' => $request->pemilik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'status' => 'aktif | nonaktif'
        ]);
        return response()->json($umkm);
   }

   public function destroy($id) {
        return response()->json([
            'message' => 'delete'
        ]);
   }
}
