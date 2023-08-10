<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'desc',
    ];

    public function Users(){
        return $this->belongsTo(User::class);
    }
}
