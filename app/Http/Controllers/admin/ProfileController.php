<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Mendapatkan pengguna yang sedang login
        // dd($user);
        return view('admin.pages.user.profiles.index', compact('user'));
    }


    public function update(Request $request)
    {
        $user = auth()->user();

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update nama dan email
        $user->name = $request->name;
        $user->email = $request->email;


        $user->save();
        // dd($user);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function updateImage(Request $request)
    {
        $user = auth()->user();

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Jika ada file gambar yang diunggah, simpan gambar baru dan hapus yang lama
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('profiles', 'public');
            $user->image = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Gambar profil berhasil diperbarui');
    }


    public function updatePassword(Request $request)
    {
        $user = auth()->user();

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Periksa apakah password saat ini sesuai
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password saat ini tidak cocok');
        }

        // Update password
        $user->password = bcrypt($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui');
    }

}
