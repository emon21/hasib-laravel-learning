<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','group_id','student_name','student_phone'
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
