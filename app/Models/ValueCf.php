<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueCf extends Model
{
    use HasFactory;

    protected $table = 'value_cfs';
    protected $guard = ["id"];
    protected $fillable = [
        'code_sickness',
        'code_indication',
        'mb',
        'md'
    ];

    public function sickness()
    {
        return $this->belongsTo(Sickness::class, 'code_sickness', 'code_sickness');
    }

    public function indication()
    {
        return $this->belongsTo(Indication::class, 'code_indication', 'code_indication');
    }


}