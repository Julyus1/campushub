<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    public function acadhistory()
    {
        return $this->belongsTo(AcadHistory::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);  // Each grade belongs to a student
    }

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);  // Each grade is assigned by a faculty
    }
}
