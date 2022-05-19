<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Subject;
use App\Models\User;
use App\Models\Category;
use App\Models\Url;
use App\Models\Year;
use App\Models\Dept;


class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','description','category_id','user_id','subject_id','created_at','updated_at'];
    protected $hidden=[];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function urls()
    {
        return $this->hasMany(Url::class,'post_id');
    }
    public function depts()
    {
        return $this->belongsToMany(Dept::class,'dept_posts');
    }
    public function years()
    {
        return $this->belongsToMany(Year::class,'year_posts');
    }
    public function scopegetAll($q,$cate){
        switch ($cate){
            case 1:
                $q->with([
                    'category',
                    'depts',
                    'years',
                    'subject'
                ])->with('urls',function($q){
                    $q->select('url','post_id');
                })->whereHas('category',function($q){
                    $q->where('id', 1);
                });
                break;
            case 2:
                $q->with([
                    'category',
                    'depts',
                    'years',
                    'subject'
                ])->with('urls',function($q){
                    $q->select('url','post_id');
                })->whereHas('category',function($q){
                    $q->where('id', 2);
                });
                break;
            case 3:
                $q->with([
                    'category',
                    'depts',
                    'years',
                    'subject'
                ])->with('urls',function($q){
                    $q->select('url','post_id');
                })->whereHas('category',function($q){
                    $q->where('id', 3);
                });
                break;
            case 4:
                $q->with([
                    'category',
                    'depts',
                    'years',
                    'subject'
                ])->with('urls',function($q){
                    $q->select('url','post_id');
                })->whereHas('category',function($q){
                    $q->where('id', 4);
                });
                break;
        }

    }
}
