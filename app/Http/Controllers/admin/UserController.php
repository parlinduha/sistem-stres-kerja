<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        return view('admin.pages.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat objek model menggunakan data yang diterima dari formulir
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        // Simpan objek model ke dalam database
        $user->save();

        // Redirect ke halaman yang sesuai dengan kebutuhan aplikasi Anda
        return redirect()->route('admin.user.index')->with('success', 'Data user berhasil disimpan.');
    }
    public function getUserById($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Temukan data penyakit yang ingin diupdate berdasarkan ID
        $user = User::findOrFail($id);

        // Update data penyakit dengan data yang baru
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        // Simpan perubahan ke dalam database
        $user->save();

        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->back();
    }

    public function delete($id)
    {
        try {
            // Temukan data penyakit yang akan dihapus berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus data penyakit
            $user->delete();

            // Jika penghapusan berhasil, kembalikan respons yang sesuai
            return response()->json(['message' => 'Record successfully deleted.'], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan jika terjadi
            return response()->json(['message' => 'Error occurred while deleting record. Please try again.'], 500);
        }
    }
}
