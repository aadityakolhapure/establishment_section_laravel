<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'leave_name',
        'days_assigned'
    ];

    /**
     * Validation rules for leave type
     *
     * @return array
     */
    public static function validationRules($id = null)
    {
        return [
            'leave_name' => 'required|unique:leave_types,name,' . $id,
            'days_assigned' => 'required|integer|min:0'
        ];
    }
}
