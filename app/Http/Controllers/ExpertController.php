<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Indication;
use App\Models\Sickness;
use App\Models\ValueCf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function index()
    {
        $indications = Indication::all();
        return view('diagnosis2', compact('indications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'indications' => 'required|array',
        ]);

        $selectedIndications = $request->indications;
        $sicknesses = Sickness::all();
        $maxCertainty = -1; // Biasanya CF maksimum diawali dari -1 untuk memastikan nilai aktual terpilih.
        $diagnosedSickness = null;

        foreach ($sicknesses as $sickness) {
            $certaintyFactor = $this->calculateCertaintyFactor($sickness, $selectedIndications);

            if ($certaintyFactor > $maxCertainty) {
                $maxCertainty = $certaintyFactor;
                $diagnosedSickness = $sickness;
            }
        }

        // Simpan hasil diagnosis ke dalam tabel diagnoses
        $diagnosis = new Diagnosis();
        $diagnosis->diagnosis_id = uniqid();
        $diagnosis->data_diagnosis = json_encode($selectedIndications);
        $diagnosis->condition = json_encode($sicknesses->pluck('code_sickness')->toArray());
        $diagnosis->result_value = $maxCertainty;
        $diagnosis->result_code_sickness = $diagnosedSickness ? $diagnosedSickness->code_sickness : null;
        $diagnosis->result_name_sickness = $diagnosedSickness ? $diagnosedSickness->name_sickness : null;
        $diagnosis->user_id = Auth::id(); // Mengambil user id yang sedang login
        $diagnosis->save();

        return view('result_diagnosis2', compact('diagnosedSickness', 'maxCertainty', 'selectedIndications'));
    }

    private function calculateCertaintyFactor($sickness, $selectedIndications)
    {
        $cfOld = 0;

        $valueCfs = ValueCf::where('code_sickness', $sickness->code_sickness)->get();
        $first = true;

        foreach ($valueCfs as $valueCf) {
            if (in_array($valueCf->code_indication, $selectedIndications)) {
                $mb = $valueCf->mb;
                $md = $valueCf->md;
                $cfNew = $mb - $md;

                if ($first) {
                    $cfOld = $cfNew;
                    $first = false;
                } else {
                    $cfOld = $cfOld + $cfNew * (1 - abs($cfOld));
                }
            }
        }

        return $cfOld;
    }
}
