<?php

namespace App\Http\Controllers;

use App\Models\Indication;
use App\Models\ConditionUser;
use App\Models\Diagnosis;
use App\Models\Sickness;
use App\Models\ValueCf;
use Illuminate\Http\Request;

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


        $condition = array_filter($filterArray, function($value){
            return $value !== null;
        });
        // dd($condition);

        $codeIndication = [];
        $bobotPilihan = [];

        foreach ($condition as $key => $value) {
            if ($value != "#") {
                echo "key : $key, value : $value";
                echo "<br/>";
                array_push($codeIndication, $key);
                array_push($bobotPilihan, array($key, $value));
            }
        }

        $sickness = Sickness::all();
        $cf=0;
        $arrIndication = [];

        for ($i = 0; $i < count($sickness); $i++) {
            $cfArr = [
                "cf" => [],
                "code_sickness" => []
            ];
            $res = 0;
            $ruleSick = ValueCf::whereIn("code_indication", $codeIndication)->where("code_sickness", $sickness[$i]->code_sickness)->get();
            // dd($ruleSick);
            if (count($ruleSick) > 0) {
                foreach ($ruleSick as $ruleKey) {
                    $cf = $ruleKey->mb - $ruleKey->md;
                    array_push($cfArr["cf"], $cf);
                    array_push($cfArr["code_sickness"], $ruleKey->code_sickness);
                }
                $res = $this->getGabunganCf($cfArr);
                // dd($res);
                // print "<br> res : $res <br>";
                array_push($arrIndication, $res);
            } else {
                continue;
            }
        }
        $diagnosis_id = uniqid();
        $ins =  Diagnosis::create([
            'diagnosis_id' => strval($diagnosis_id),
            'data_diagnosis' => json_encode($arrIndication),
            'condition' => json_encode($bobotPilihan)
        ]);

        // dd($ins);
        return redirect()->route('diagnosis.result', ["diagnosis_id" => $diagnosis_id]);
    }
    public function getGabunganCf($cfArr)
    {
        if (!$cfArr["cf"]) {
            return 0;
        }
        if (count($cfArr["cf"]) == 1) {
            return [
                "value" => strval($cfArr["cf"][0]),
                "code_sickness" => $cfArr["code_sickness"][0]
            ];
        }

        $cfoldGabungan = $cfArr["cf"][0];


        for ($i = 0; $i < count($cfArr["cf"]) - 1; $i++) {
            $cfoldGabungan = $cfoldGabungan + ($cfArr["cf"][$i + 1] * (1 - $cfoldGabungan));
        }


        return [
            "value" => "$cfoldGabungan",
            "code_sickness" => $cfArr["code_sickness"][0]
        ];
    }

    public function diagnosisResult($diagnosis_id)
    {
        $diagnosis = Diagnosis::where('diagnosis_id', $diagnosis_id)->first();
        // dd($diagnosis);
        $indications = json_decode($diagnosis->condition, true);
        $data_diagnosis = json_decode($diagnosis->data_diagnosis, true);
        $int = 0.0;
        $diagnosis_selected = [];
        // dd($data_diagnosis);
        foreach ($data_diagnosis as $val) {
            // print_r(floatval($val["code_sickness"]));
            if (floatval($val["value"]) > $int) {
                $diagnosis_selected["value"] = floatval($val["value"]);
                $diagnosis_selected["code_sickness"] = Sickness::where("code_sickness", $val["code_sickness"])->first();
                $int = floatval($val["value"]);
            }
        }
        // dd($data_diagnosis);
        // dd($diagnosis_selected);
        // dd($indications);

        $kodeGejala = [];
        foreach ($indications as $key) {
            array_push($kodeGejala, $key[0]);
        }
        // dd($codeIndication);
        $codeSickness = $diagnosis_selected["code_sickness"]->code_sickness;
        $expert = ValueCf::whereIn("code_indication", $kodeGejala)->where("code_sickness", $codeSickness)->get();
        // dd($codeSickness);
        $indication_by_user = [];
        foreach ($expert as $key) {
            $i = 0;
            foreach ($indications as $gKey) {
                if ($gKey[0] == $key->code_indication) {
                    array_push($indication_by_user, $gKey);
                }
            }
        }
        // dd($gejala_by_user);

        $valueExpert = [];
        foreach ($expert as $key) {
            array_push($valueExpert, ($key->mb - $key->md));
        }
        $valueUser = [];
        foreach ($indication_by_user as $key) {
            array_push($valueUser, $key[1]);
        }
        // dd($nilaiPakar);
        // dd($nilaiUser);

        $cfCombination = $this->getCfCombination($valueExpert, $valueUser);
        // dd($cfCombination);
        $result = $this->getGabunganCf($cfCombination);
        // dd($result);


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
                array_push($cfComb, floatval($res));
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
