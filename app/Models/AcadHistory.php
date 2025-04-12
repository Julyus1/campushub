<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcadHistory extends Model
{
    protected $guarded = [];
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
