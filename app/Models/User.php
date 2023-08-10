<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    const role_pm = 'pm';
    const role_member = 'member';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function profiles(){
        return $this->hasOne(profile::class);
    }

    public function notes(){
        return $this->hasMany(note::class);
    }

    public function tasks(){
        return $this->belongsToMany(task::class,'tasks_users','users_id','tasks_id')
        ->withTimestamps()
        ->withPivot(['is_roles']);
        // ->as('user_task');
        // -> using()
    }

    public function task_admin(){
        return $this->belongsToMany(task::class,'tasks_users','users_id','tasks_id')
        ->withTimestamps()
        ->withPivot(['is_roles'])
        ->wherePivot('is_roles',1);
    }
    public function task_member(){
        return $this->belongsToMany(task::class,'tasks_users','users_id','tasks_id')
        ->withTimestamps()
        ->withPivot(['is_roles'])
        ->wherePivot('is_roles',2);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
