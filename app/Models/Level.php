<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Level extends Model
{
    use HasFactory;
    protected $fillable=['name','created_at','updated_at'];
    protected $hidden=[];

    public function users()
    {
        return $this->hasMany(User::class,'level_id');
    }
}
