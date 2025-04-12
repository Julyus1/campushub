<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'role_data_id');
    }

    protected $guarded = [];

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function acadHistories()
    {
        return $this->hasMany(AcadHistory::class);
    }

    public function latestAcadHistory()
    {

        return $this->hasOne(AcadHistory::class)->latestOfMany();
    }

    public function grades()
    {
        return $this->hasManyThrough(Grade::class, AcadHistory::class);
    }
}
