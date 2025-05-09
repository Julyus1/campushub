<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Course;

class Section extends Model
{
    /** @use HasFactory<\Database\Factories\SectionFactory> */
    use HasFactory;
    protected $guarded = [];

    public function students()
    {

        return $this->hasMany(Student::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function getDepartmentTitleAttribute()
    {
        // null‑safe navigation in case any relation is missing
        return optional($this->course)->department->title ?? '—';
    }
    public function acadHistories()
    {

        return $this->hasMany(AcadHistory::class, 'section_id');
    }
    public function getSubjectsCountAttribute()
    {
        // Check if count is already loaded to avoid N+1 queries
        if (array_key_exists('subjects_count', $this->attributes)) {
            return $this->attributes['subjects_count'];
        }
        
        return $this->subjects()->count();
    }
}
