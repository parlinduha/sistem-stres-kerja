<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sickness;
use Illuminate\Http\Request;

class SicknessController extends Controller
{
    public function index()
    {
        $sickness = Sickness::orderBy('id', 'asc')->get();
        return view('admin.pages.penyakit.index', compact('sickness'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'code_sickness' => 'required|string|max:255',
            'name_sickness' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Buat objek model menggunakan data yang diterima dari formulir
        $sickness = new Sickness();
        $sickness->code_sickness = $validatedData['code_sickness'];
        $sickness->name_sickness = $validatedData['name_sickness'];
        $sickness->description = $validatedData['description'];

        // Simpan objek model ke dalam database
        $sickness->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan aplikasi Anda
        return redirect()->route('admin.sickness.index')->with('success', 'Data penyakit berhasil disimpan.');
    }
    public function getSicknessById($id)
    {
        $sickness = Sickness::findOrFail($id);
        return response()->json($sickness);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'code_sickness' => 'required|string|max:255',
            'name_sickness' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Temukan data penyakit yang ingin diupdate berdasarkan ID
        $sickness = Sickness::findOrFail($id);

        // Update data penyakit dengan data yang baru
        $sickness->code_sickness = $validatedData['code_sickness'];
        $sickness->name_sickness = $validatedData['name_sickness'];
        $sickness->description = $validatedData['description'];

        // Simpan perubahan ke dalam database
        $sickness->save();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            // Temukan data penyakit yang akan dihapus berdasarkan ID
            $sickness = Sickness::findOrFail($id);

            // Hapus data penyakit
            $sickness->delete();

            // Jika penghapusan berhasil, kembalikan respons yang sesuai
            return response()->json(['message' => 'Record successfully deleted.'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Error occurred while deleting record. Please try again.'], 500);
        }
    }
}
