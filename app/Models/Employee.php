<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'employee_code',
        'name',
        'surname',
        'email',
        'home_address',
        'phone',
        'kin_name',
        'kin_surname',
        'kin_phone',
        'kin_relationship',
        'employee_id_path',
        'contract_path',
    ];
}
