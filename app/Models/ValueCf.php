<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValueCf extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_sickness',
        'code_indication',
        'mb',
        'md'
    ];

    public function sickness()
    {
        return $this->hasMany(Sickness::class, 'code_sickness', 'code_sickness');
    }
    public function indication()
    {
        return $this->hasMany(Indication::class, 'code_indication' /* tbl gejala */, 'code_indication');
    }
}
