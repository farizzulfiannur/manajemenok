<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'link',
        'status',
    ];

    public function Users(){
        return $this->belongsToMany(User::class,'tasks_users', 
        'tasks_id', 'users_id')->withPivot(['is_roles']);
    }

    
}
