<?php

namespace App\Http\Controllers;

use App\Models\Indication;
use App\Models\ConditionUser;
use App\Models\Diagnosis;
use App\Models\Sickness;
use App\Models\ValueCf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function index()
    {
        $indications = Indication::all();
        $conditionUsers = ConditionUser::all();
        return view('diagnosis', compact('indications', 'conditionUsers'));
    }

    public function store(Request $request)
    {
        $filterArray = $request->post('condition');

        $condition = array_filter($filterArray, function ($value) {
            return $value !== null;
        });

        $codeIndication = [];
        $bobotPilihan = [];

        foreach ($condition as $key => $value) {
            if ($value != "#") {
                array_push($codeIndication, $key);
                array_push($bobotPilihan, array($key, $value));
            }
        }

        $sickness = Sickness::all();
        $arrIndication = [];

        foreach ($sickness as $sick) {
            $cfArr = [
                "cf" => [],
                "code_sickness" => []
            ];
            $ruleSick = ValueCf::whereIn("code_indication", $codeIndication)
                ->where("code_sickness", $sick->code_sickness)
                ->get();

            if (count($ruleSick) > 0) {
                foreach ($ruleSick as $rule) {
                    $cf = $rule->mb - $rule->md;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["code_sickness"], $rule->code_sickness);
                }
                $res = $this->getGabunganCf($cfArr);
                array_push($arrIndication, $res);
            }
        }

        $diagnosis_id = uniqid();
        $ins =  Diagnosis::create([
            'diagnosis_id' => strval($diagnosis_id),
            'data_diagnosis' => json_encode($arrIndication),
            'condition' => json_encode($bobotPilihan),
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('diagnosis.result', ["diagnosis_id" => $diagnosis_id]);
    }

    public function getGabunganCf($cfArr)
    {
        if (empty($cfArr["cf"])) {
            return 0;
        }

        $cfoldGabungan = $cfArr["cf"][0];

        for ($i = 1; $i < count($cfArr["cf"]); $i++) {
            $cfoldGabungan = $cfoldGabungan + ($cfArr["cf"][$i] * (1 - $cfoldGabungan));
        }

        return [
            "value" => "$cfoldGabungan",
            "code_sickness" => $cfArr["code_sickness"][0]
        ];
    }

    public function diagnosisResult($diagnosis_id)
    {
        $diagnosis = Diagnosis::where('diagnosis_id', $diagnosis_id)->first();
        $indications = json_decode($diagnosis->condition, true);
        $data_diagnosis = json_decode($diagnosis->data_diagnosis, true);
        $diagnosis_selected = [];

        $int = 0.0;
        foreach ($data_diagnosis as $val) {
            if (floatval($val["value"]) > $int) {
                $diagnosis_selected["value"] = floatval($val["value"]);
                $diagnosis_selected["code_sickness"] = Sickness::where("code_sickness", $val["code_sickness"])->first();
                $int = floatval($val["value"]);
            }
        }

        $kodeGejala = [];
        foreach ($indications as $key) {
            array_push($kodeGejala, $key[0]);
        }
        $codeSickness = $diagnosis_selected["code_sickness"]->code_sickness;
        $expert = ValueCf::whereIn("code_indication", $kodeGejala)
            ->where("code_sickness", $codeSickness)
            ->get();

        $indication_by_user = [];
        foreach ($expert as $key) {
            foreach ($indications as $gKey) {
                if ($gKey[0] == $key->code_indication) {
                    array_push($indication_by_user, $gKey);
                }
            }
        }

        $valueExpert = [];
        foreach ($expert as $key) {
            array_push($valueExpert, ($key->mb - $key->md));
        }

        $valueUser = [];
        foreach ($indication_by_user as $key) {
            array_push($valueUser, $key[1]);
        }

        $cfCombination = $this->getCfCombination($valueExpert, $valueUser);
        $result = $this->getGabunganCf($cfCombination);

        // dd($result);
        $diagnosis->result_value = $result['value'];
        $diagnosis->result_code_sickness = $diagnosis_selected['code_sickness']->code_sickness;
        $diagnosis->result_name_sickness = $diagnosis_selected['code_sickness']->name_sickness;
        $diagnosis->save();

        return view('result_diagnosis', [
            "diagnosa" => $diagnosis,
            "diagnosa_dipilih" => $diagnosis_selected,
            "indications" => $indications,
            "data_diagnosis" => $data_diagnosis,
            "expert" => $expert,
            "indication_by_user" => $indication_by_user,
            "cf_Combination" => $cfCombination,
            "result" => $result
        ]);
    }

    public function getCfCombination($expert, $user)
    {
        $cfComb = [];

        if (count($expert) == count($user)) {
            for ($i = 0; $i < count($expert); $i++) {
                $res = $expert[$i] * $user[$i];
                array_push($cfComb, $res);
            }

            return [
                "cf" => $cfComb,
                "code_sickness" => ["0"]
            ];
        } else {
            return "Data not valid";
        }
    }
}
