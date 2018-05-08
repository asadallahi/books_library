<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bookReviews()
    {
        return $this->hasMany('App\BookReview');
    }
}
