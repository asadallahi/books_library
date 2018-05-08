<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookReview extends Model
{
    protected $table = 'book_reviews';

    public function book()
    {
        return $this->belongsTo('App\Book');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
