<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Level;
use App\Models\Post;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'status',
        'level_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    #####################################
    ######## Begin relations ############
    #####################################

    public function level()
    {
        return $this->belongsTo(Level::class,'level_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function AdminGroubs(){
        return $this->hasOne(admin_groups::class,'user_id');
    }


    #####################################
    ######## End relations #############
    #####################################



<<<<<<< HEAD
=======

>>>>>>> 87be09f5da521a700c534c67e8897917c1035e9a
}
