<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
      'user_id', 'product_id', 'body', 'status',
    ];

    public function product(){
    return $this->belongsTo(Product::class);
    }
    
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user(){
    return $this->belongsTo(User::class);
    }
}
