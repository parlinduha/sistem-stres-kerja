<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnoses';

    protected $guarded = ['id']; // Perbaikan typo dari 'guard' ke 'guarded'
    protected $fillable = ['diagnosis_id', 'data_diagnosis', 'condition', 'user_id', 'result_value', 'result_code_sickness', 'result_name_sickness']; // Tambahkan 'user_id' ke $fillable

    /**
     * Get the user that owns the diagnosis.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
