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
}
