<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory;

    protected $guarded = [];

    public function department()
    {
        return $this->hasOne(Department::class);
    }
    public function user()
    {
        return $this->hasOne(User::class, 'role_data_id')->where('role_id', 2);
    }
}
