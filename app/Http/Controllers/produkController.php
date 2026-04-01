<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index() {
        return response()->json(Produk::all());
    }

    public function store(Request $request) {
        $produk = Produk::create($request->all());

        return response()->json($produk);
    }

    public function show($id) {
        return response()->json(Produk::findOrFail($id));
    }

    public function update(Request $request, $id) {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return response()->json($produk);
    }

    public function destroy($id) {
        return response()->json([
            'message' => 'delete'
        ]);
    }
}
