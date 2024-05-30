<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('id', 'asc')->get();
        return view('admin.pages.edukasi.index', compact('educations'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'slug' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('education', 'public');
        // Buat objek model menggunakan data yang diterima dari formulir
        $education = new Education();
        $education->title = $validatedData['title'];
        $education->description = $validatedData['description'];
        $education->image = $imagePath;
        $education->slug = $validatedData['slug'];
        $education->author = $validatedData['author'];

        // Simpan objek model ke dalam database
        $education->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan aplikasi Anda
        return redirect()->route('admin.education.index')->with('success', 'Data edukasi berhasil disimpan.');
    }

    public function getEducationById($id)
    {
        $education = Education::findOrFail($id);
        return response()->json($education);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'slug' => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        // Temukan data edukasi yang ingin diupdate berdasarkan ID
        $education = Education::findOrFail($id);

        // Update data edukasi dengan data yang baru
        $education->title = $validatedData['title'];
        $education->description = $validatedData['description'];
        $education->slug = $validatedData['slug'];
        $education->author = $validatedData['author'];

        // Jika ada gambar baru diupload, simpan gambar baru dan hapus gambar lama
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($education->image);
            $imagePath = $request->file('image')->store('education', 'public');
            $education->image = $imagePath;
        }

        // Simpan perubahan ke dalam database
        $education->save();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->back()->with('success', 'Data edukasi berhasil diperbarui.');
    }

    public function delete($id)
    {
        try {
            // Temukan data edukasi yang akan dihapus berdasarkan ID
            $education = Education::findOrFail($id);

            // Hapus data edukasi
            $education->delete();

            // Jika penghapusan berhasil, kembalikan respons yang sesuai
            return response()->json(['message' => 'Data berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.'], 500);
        }
    }
}
