<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class leaves extends Model
{

    protected $table = 'leave_types';

    protected $fillable = [
        'leave_name',
        'days_assigned',
    ];

    public static function validationRules($id = null)
    {
        return [
            'name' => 'required|unique:leave_types,name,' . $id,
            'days_assigned' => 'required|integer|min:0'
        ];
    }
}
