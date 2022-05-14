<?php

namespace App\Http\Controllers\Api;

use App\Models\Dept;
use App\Models\Post;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PostApiController extends Controller
{
    public function index()
    {
        return Post::where('category_id',1)->with('depts')->with('years')->get();
    }
//    advertments api
    public function showAdverts($yearId , $deptId){

        $posts =  Post::where('category_id',1)
            ->whereRelation('depts','dept_id',$deptId)
            ->whereRelation('years','year_id',$yearId)
            ->with('urls')
            ->get();
        return $posts;
    }
    //    lectures api
    public function showLectures($subjectId){
        return Post::where([
            'category_id'=>2,
            'subject_id'=>$subjectId
        ])->with('urls')->get();
    }
    public function showLecturesSingle($id){
        return Post::with('urls')->find($id);
    }
    //    softwares api
    public function showPrograms()
    {
        return Post::where('category_id',4)->with('depts')->with('years')->with('urls')->get();
    }
    public function showResults()
    {
        return Post::where('category_id',3)->with('depts')->with('years')->with('urls')->get();
    }
    public function showProgramSingle($id)
    {
        return Post::with('urls')->find($id);
    }
    public function showResultSingle($id)
    {
        return Post::with('urls')->find($id);
    }

    public function indexResults($yearId, $deptId)
    {
        $posts =  Post::where('category_id',3)
            ->whereRelation('depts','dept_id',$deptId)
            ->whereRelation('years','year_id',$yearId)
            ->with('urls')
            ->get();
        return $posts;
    }
    public function indexPrograms($yearId, $deptId)
    {
        $posts =  Post::where('category_id',4)
            ->whereRelation('depts','dept_id',$deptId)
            ->whereRelation('years','year_id',$yearId)
            ->with('urls')
            ->get();
        return $posts;
    }
}
