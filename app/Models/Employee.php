<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    protected $fillable = ["department_id", "name", "job_title", "salary", "hire_date"];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
