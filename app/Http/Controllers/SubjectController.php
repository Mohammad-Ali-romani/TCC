<?php

namespace App\Http\Controllers;

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




    public function index()
    {
        // get subjects form table "subjects"
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
        //get depts and years and set it in variables to return it  into view(Subject.Create)
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
        // get subject by id  which should Edit
        $subject= Subject::find($Subject_id);

        // check if subject is exist or not
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>'المادة غير موجودة']);
        }

        // get all depts and years to return it into view(Subject.Edit)
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
        //get subject by id should update
        $subject = Subject::find($Subject_id);

        // check if subject is exist or not
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>' المادة غير موجودة']);
        }
        //update data in tabel "subjects"
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
        //get subject by id should delete
        $subject= Subject::find($Subject_id);

        // check if subject is exist or not
        if(!$subject)
        {
            return redirect()->route('Subject.index')->with(['error'=>'المادة غير موجودة']);
        }

        //delete subject from table "subjects"
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
