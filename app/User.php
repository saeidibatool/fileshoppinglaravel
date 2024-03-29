<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender_id', 'lastlogin',
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function rating(){
        return $this->hasMany(Rating::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function role(){
        return $this->belongsToMany(Role::class);
    }

    public function basket(){
        return $this->hasMany(Basket::class);
    }

    public function factor(){
        return $this->hasMany(Factor::class);
    }

    public function article(){
        return $this->hasMany(Article::class);
    }
    
    public function favorite(){
      return $this->hasMany(Favorite::class);
    }
    
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function support(){
        return $this->hasMany(Support::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function hasRole($roles){
//        dd($roles);
        if(is_string($roles)){
            return $this->role->contains('en_name', $roles);
        }else{
            foreach($roles as $role){
                if($this->hasRole($role->en_name)){
                    return true;
                }
            }   
        }
        
    }
}
