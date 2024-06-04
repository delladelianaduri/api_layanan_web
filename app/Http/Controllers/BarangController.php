<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $barangs = Barang::all();
        return response()->json($barangs);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
        ]);

        $barang = Barang::create($request->all());
        return response()->json($barang, 201);
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return response()->json($barang);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'price' => 'sometimes|integer',
            'quantity' => 'sometimes|integer',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return response()->json(null, 204);
    }
}
