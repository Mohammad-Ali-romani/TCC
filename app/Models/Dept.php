<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subject;
use App\Models\Post;

class Dept extends Model
{
    use HasFactory;
    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden =[];

    public function subjects()
    {
        return $this->hasMany(Subject::class,'dept_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class,'dept_posts');
    }
}
