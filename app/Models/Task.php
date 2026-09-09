<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;

    protected $fillable = ['project_id', 'assigned_user_id', 'title', 'description', 'priority', 'status', 'due_date'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assingnedUser()
    {
        return $this->belongsTo(User::class , 'assigned_user_id');
    }
}
