<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'student_id',
        'firstname',
        'lastname',
        'faculty',
        'field_of_study',
        'classroom_id',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function classroom()
    {
        return $this->belongsTo(\App\Models\Classroom::class);
    }
}
