<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
class StudentFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','student_id','student_img'
    ];

    public function student()
    {
        // return $this->hasMany(''::class,'');
        // return $this->hasMany(Student::class);
       // return $this->belongsTo(Student::class);
    }
}
