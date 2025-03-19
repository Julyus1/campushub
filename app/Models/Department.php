<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    protected $guarded = [];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'dept_id');
    }
    public function course()
    {
        return $this->hasMany(Course::class);
    }

    public function sections()
    {
        return $this->hasManyThrough(Section::class, Course::class);
    }
}
