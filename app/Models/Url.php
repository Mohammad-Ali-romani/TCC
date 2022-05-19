<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Post;

class Url extends Model
{
    use HasFactory;
    protected $fillable=['url','file_type','post_id','created_at','updated_at'];
    protected $hidden=['post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }
}
