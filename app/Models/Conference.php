<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    /** @use HasFactory<\Database\Factories\ConferenceFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function favoriteUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_conferences');
    }
}
