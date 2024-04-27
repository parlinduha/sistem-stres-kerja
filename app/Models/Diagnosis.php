<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $guard = ["id"];
    protected $fillable = ["diagnosis_id", "data_diagnosis", "condition"];
}
