<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','group_name'
    ];
    public function studentGroup()
    {
        return $this->hasOne(StudentGroup::class);
    }
}
