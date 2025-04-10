<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'description', 'faculty_id'];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
