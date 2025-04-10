<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = ['first_name', 'last_name', 'middle_name'];
    public function user()
    {
        return $this->hasOne(User::class, 'role_data_id');
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function sections()
    {
        return $this->hasManyThrough(Section::class, Subject::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
