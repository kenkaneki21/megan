<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $fillable = [
    		'entity_type',
            'f_name',
            'm_name',
            'l_name',
            'birthdate',
            'sex',
            'civil_status',
            'height',
            'weight',
            'blood_type',
            'gsis_id',
            'pag_ibig_no',
            'philhealth_no',
            'sss_no',
            'tin_no',
            'agency_employee_no',
            'citizenship',
            'res_house',
            'res_street',
            'res_subdivision',
            'res_brgy',
            'res_city',
            'res_province',
            'res_zipcode',
            'per_house',
            'per_street',
            'per_subdivision',
            'per_brgy',
            'per_city',
            'per_province',
            'per_zipcode',
            'telephone',
            'mobile',
            'email',
            'profile_pic',
    ];
}
