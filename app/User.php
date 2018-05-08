<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function bookReviews()
    {
        return $this->hasMany('App\BookReview');
    }


}
