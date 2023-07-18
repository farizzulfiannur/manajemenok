<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
    ];

    public function Users(){
        return $this->belongsTo(User::class);
    }
}
