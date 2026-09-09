<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class);
    }
}
