<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dept;
use App\Models\Year;
use App\Models\Post;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name','dept_id','year_id','created_at','updated_at'];
    protected $hidden =[];

    public function dept()
    {
        return $this->belongsTo(Dept::class,'dept_id');
    } 
    public function year()
    {
        return $this->belongsTo(Year::class,'year_id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class,'subject_id');
    }

}
