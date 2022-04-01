<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subject;
use App\Models\Post;

class Year extends Model
{
    use HasFactory;

    protected $fillable = ['name','created_at','updated_at'];
    protected $hidden =[];

    public function subjects()
    {
        return $this->hasMany(Subject::class,'year_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class,'year_posts');
    }
}
