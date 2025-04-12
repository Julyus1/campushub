<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $guarded = [];
    public function acadhistory()
    {
        return $this->belongsTo(AcadHistory::class, 'acad_history_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }


    public function faculty()
    {
        return $this->belongsTo(Faculty::class);  // Each grade is assigned by a faculty
    }
}
