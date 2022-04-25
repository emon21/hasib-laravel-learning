<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','student_name','slug','student_email','student_phone','student_picture'
    ];

    //Model Binding
    // public function getRouteKeyName()
    // {
    //     return 'id/slug';
    // }

    public function studentfiles()
    {
        // return $this->hasMany(StudentFile::class);
        return $this->hasMany(StudentFile::class,'student_id', 'id');
    }
}
