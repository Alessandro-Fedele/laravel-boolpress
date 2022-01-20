<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'title', 'body'];

    // Relazione one to many->user
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
