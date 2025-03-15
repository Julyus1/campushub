<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Superadmin extends Model
{
    public function user()
    {
        return $this->hasOne(User::class, 'role_data_id');
    }
}
