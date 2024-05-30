<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Diagnosis;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosis::orderBy('id', 'asc')->get();
        return view('admin.pages.riwayat.index', compact('diagnosis'));
    }

    public function getUserById($id)
    {
        $diagnosis = Diagnosis::findOrFail($id);
        return response()->json($diagnosis);
    }
}
