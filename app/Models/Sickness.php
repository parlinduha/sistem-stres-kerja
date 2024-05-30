<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sickness extends Model
{
    use HasFactory;

    protected $table = 'sicknesses';
    protected $guard = ["id"];
    protected $fillable = [
        'code_sickness',
        'name_sickness',
        'description',
    ];
}
