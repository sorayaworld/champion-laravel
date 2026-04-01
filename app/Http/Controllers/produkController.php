<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class produkController extends Controller
{
    public function index(Request $request) {
        $query = Produk::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }
        if ($request->harga_min) {
            $query->where('harga_min', '>=', $request->harga_min);
        }
        if ($request->harga_max) {
            $query->where('harga_max', '<=', $request->harga_max);
        }

        return response()->json($query::paginate());
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
