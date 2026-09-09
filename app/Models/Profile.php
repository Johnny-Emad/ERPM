<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = ["user_id", "phone", "bio", "avatar", "social_links"];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
