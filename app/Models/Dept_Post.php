<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept_Post extends Model
{
    use HasFactory;
    protected $fillable=['dept_id','post_id','created_at','updated_at'];
    protected $hidden=[];
}
