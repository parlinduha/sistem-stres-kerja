<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Indication;
use App\Models\Sickness;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countDataSickness = Sickness::count();
        $latestUpdateSickness = Sickness::latest('updated_at')->first();

        $countDataIndication = Indication::count();
        $latestUpdateIndication = Indication::latest('updated_at')->first();

        $countDataUser = User::count();
        $latestUpdateUser = User::latest('updated_at')->first();

        $countDataEducation = Education::count();
        $latestUpdateEducation = Education::latest('updated_at')->first();

        return view('admin.dashboard', compact(
            'countDataSickness',
            'latestUpdateSickness',
            'countDataIndication',
            'latestUpdateIndication',
            'countDataUser',
            'latestUpdateUser',
            'countDataEducation',
            'latestUpdateEducation'
        ));
    }
}
