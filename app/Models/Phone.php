<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'id','user_id','name','phone'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
