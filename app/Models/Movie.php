<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'tmdb_id',
        'title',
        'poster_path',
        'overview'
    ];

    public function watchlists() {
        return $this->belongsToMany(Watchlist::class);
    }
}
