<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','student_name','slug','student_email','student_phone'
    ];

    //Model Binding
    // public function getRouteKeyName()
    // {
    //     return 'id/slug';
    // }
}