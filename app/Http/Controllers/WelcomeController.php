<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{

    public function welcome()
    {
        $educations = Education::orderby('id', 'DESC')->limit(4)->get();
        return view('welcome', compact('educations'));
    }
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        $educations = Education::orderby('id', 'DESC')->get();
        return view('blog', compact('educations'));
    }
    public function blog_detail($slug)
    {
        $education = Education::where('slug', $slug)->firstOrFail();
        return view('blog-detail', compact('education'));
    }
    public function assessment()
    {
        return view('assessment');
    }

    public function history()
    {
        $user = auth()->user()->id;
        $diagnoses = Diagnosis::where('user_id', $user)
        ->whereJsonLength('data_diagnosis', '>', 0)
        ->get();
        return view('dashboard', compact('diagnoses'));
    }
}
