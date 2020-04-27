<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;


class Post extends Model
{
    use Rateable;
    protected $fillable = [
        'title','description','image','user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
  {
      return $this->morphMany('App\Comment',"commentable");
  }
}
