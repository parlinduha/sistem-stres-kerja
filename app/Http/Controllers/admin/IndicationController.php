<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Indication;
use Illuminate\Http\Request;

class IndicationController extends Controller
{
    public function index()
    {
        $indications = Indication::orderBy('id', 'asc')->get();
        return view('admin.pages.gejala.index', compact('indications'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'code_indication' => 'required|string|max:255',
            'name_indication' => 'required|string|max:255'
        ]);

        // Buat objek model menggunakan data yang diterima dari formulir
        $indication = new Indication();
        $indication->code_indication = $validatedData['code_indication'];
        $indication->name_indication = $validatedData['name_indication'];

        // Simpan objek model ke dalam database
        $indication->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan aplikasi Anda
        return redirect()->route('admin.indication.index')->with('success', 'Data penyakit berhasil disimpan.');
    }
    public function getIndicationById($id)
    {
        $indication = Indication::findOrFail($id);
        return response()->json($indication);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'code_indication' => 'required|string|max:255',
            'name_indication' => 'required|string|max:255'
        ]);

        // Temukan data penyakit yang ingin diupdate berdasarkan ID
        $indication = Indication::findOrFail($id);

        // Update data penyakit dengan data yang baru
        $indication->code_indication = $validatedData['code_indication'];
        $indication->name_indication = $validatedData['name_indication'];

        // Simpan perubahan ke dalam database
        $indication->save();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            // Temukan data penyakit yang akan dihapus berdasarkan ID
            $indication = Indication::findOrFail($id);

            // Hapus data penyakit
            $indication->delete();

            // Jika penghapusan berhasil, kembalikan respons yang sesuai
            return response()->json(['message' => 'Record successfully deleted.'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Error occurred while deleting record. Please try again.'], 500);
        }
    }
}
