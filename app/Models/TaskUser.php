<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskUser extends Pivot
{
    public function role(){
        return $this->belongsTo(role::class,'role_id');
    }
}
