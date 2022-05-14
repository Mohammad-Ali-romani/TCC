<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SubjectApiController extends Controller
{
    public function index($yearId, $deptId)
    {
        return Subject::where([
            'year_id'=>$yearId,
            'dept_id'=>$deptId
        ])->get();

    }
}
