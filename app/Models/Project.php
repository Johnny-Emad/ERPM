<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
