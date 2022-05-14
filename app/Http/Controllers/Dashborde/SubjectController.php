<?php

namespace App\Http\Controllers\Dashborde;

use App\Models\Dept;
use App\Models\Subject;
use App\Models\Year;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $allSubjects = Subject::get();
       //return $allSubjects;
       //return $allSubjects[0]->dept;

        return view('Subject.Home',compact('allSubjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depts = Dept::get();
        $years = Year::get();

        return view('Subject.Create',compact('depts','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {

          //Validation

          //insert data into tabel
         Subject::create([
              'name'=> $request->name,
              'dept_id'=>$request->dept,
              'year_id'=>$request->year,
          ]);

          //retrun into index page
          return redirect()->route('Subject.create')->with(['success'=>'تم إضافة البيانات بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($Subject_id)
    {
        $subject= Subject::find($Subject_id);
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>'المادة غير موجودة']);
        }

        $depts = Dept::get();
        $years = Year::get();

        return view('Subject.Edit',compact('subject','depts','years'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request,$Subject_id)
    {
        $subject = Subject::find($Subject_id);
        // check if id exiet
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>' المادة غير موجودة']);
        }
        //update data
        $subject->update([
            'name'=>$request->name,
            'dept_id'=>$request->dept,
            'year_id'=>$request->year,
        ]);

        //return into Advertisment page
        return redirect()->route('Subject.index')->with(['success'=>'تم تعديل البيانات بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($Subject_id)
    {
        $subject= Subject::find($Subject_id);
        // check if id exiet
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>'المادة غير موجودة']);
        }
        $subject->delete();
        return redirect()->route('Subject.index')->with(['success'=>'تم حذف البيانات بنجاح']);
    }

    //Search
    public function searchSubject( Request $request) {


        $request->validate([

            'q' => 'required'
        ]);


        $q = $request->q;
        $dept = $request->dept;
        // $dept = Dept::find($dept);
        // $posts = $dept->posts();

        if ($dept == 1) {
            $filteredLectre = Subject::where('name', 'like', '%' . $q . '%')
                                    ->with('dept')
                                    ->whereHas('dept',function ($query){
                                        $query->where('name','Software engineering');
                                    })
                                    ->get();
        }

        if ($dept == 2) {
            $filteredLectre = Subject::where('name', 'like', '%' . $q . '%')
                                    ->with('dept')
                                    ->whereHas('dept',function ($query){
                                        $query->where('name','computer engineering');
                                    })
                                    ->get();
        }

        if ($dept == 3) {
            $filteredLectre = Subject::where('name', 'like', '%' . $q . '%')
                                    ->with('dept')
                                    ->whereHas('dept',function ($query){
                                        $query->where('name','Software engineering');
                                    })
                                    ->get();
        }

        if ($filteredLectre->count()) {

            return view('Subject.Home')->with([
                'allSubjects' =>  $filteredLectre
            ]);
        }
    else {

        return redirect()->route('Subject.index')->with([
            'status' => 'search failed ,, please try again'
        ]);
        }

    }

//end search
}
