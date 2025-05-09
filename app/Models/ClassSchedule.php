<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = ['subject_id', 'day', 'start_time', 'end_time'];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

