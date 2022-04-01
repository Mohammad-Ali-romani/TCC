<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Year_Posts extends Model
{
    use HasFactory;
    protected $fillable=['year_id','post_id','created_at','updated_at'];
    protected $hidden=[];
}
