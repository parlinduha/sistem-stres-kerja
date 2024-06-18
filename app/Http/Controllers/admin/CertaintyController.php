<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Indication;
use App\Models\Sickness;
use App\Models\ValueCf;
use Illuminate\Http\Request;

class CertaintyController extends Controller
{
     public function index()
    {
        $sickness = Sickness::all();
        $indication = Indication::all();
        $nilaiCf = ValueCf::orderBy('id', 'asc')->get();
        return view('admin.pages.nilaiCF.index', compact('nilaiCf', 'indication', 'sickness'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code_sickness' => 'required|string|max:255',
            'code_indication' => 'required|string|max:255',
            'mb' => 'required|numeric',
            'md' => 'required|numeric',
        ]);

        $nilaiCf = ValueCf::create($validatedData);

        return response()->json(['message' => 'Data penyakit berhasil disimpan.', 'data' => $nilaiCf], 201);
    }

    public function getCertaintyById($id)
    {
        $nilaiCf = ValueCf::findOrFail($id);

        return response()->json($nilaiCf);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'code_sickness' => 'required|string|max:255',
            'code_indication' => 'required|string|max:255',
            'mb' => 'required|numeric',
            'md' => 'required|numeric',
        ]);

        $nilaiCf = ValueCf::findOrFail($id);
        $nilaiCf->update($validatedData);

        return response()->json(['message' => 'Data penyakit berhasil diperbarui.', 'data' => $nilaiCf]);
    }

    public function delete($id)
    {
        try {
            $sickness = ValueCf::findOrFail($id);
            $sickness->delete();

            return response()->json(['message' => 'Data penyakit berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data penyakit. Silakan coba lagi.'], 500);
        }
    }

}
