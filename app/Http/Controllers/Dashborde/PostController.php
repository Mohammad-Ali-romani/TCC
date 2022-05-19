<?php

namespace App\Http\Controllers\Dashborde;


//use Illuminate\Http\Request;
use App\Http\Requests\AdvertismentRequest;
use App\Http\Requests\LectureRequest;
use App\Http\Requests\MarkRequest;
use App\Http\Requests\ProgramRequest;

use App\Traits\DashbordeTrait;
use App\Models\Post;
use App\Models\Category;
use App\Models\Dept;
use App\Models\Subject;
use App\Models\Url;
use App\Models\Year;

use Illuminate\Support\Facades\File as FacadesFile;

class PostController extends Controller
{

    use DashbordeTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    ############################################################################################################
    ################################ Begin functions index ############################################
    ############################################################################################################

    public function indexAdvertisment()
    {
        // $x=Category::select('id','name')->where('name','advertisment')->get();

        //get data { category (where category name == advertisment) , depts , years , subject   } where category is not null(this condetion cause return other data(prog,mark,lecut) == null)
        $allAdvertismentsPosts = Post::getAll(1)->get();
//        return $allAdvertismentsPosts;
        return view('Advertisment.Home', compact('allAdvertismentsPosts'));
        // return $allAdvertismentsPosts;
    }
    public function indexMark()
    {


        //get data { category (where category name == mark) , depts , years , subject   } where category is not null(this condetion cause return other data(adve,prog,lecture) == null)
        $allMarksPosts = Post::getAll(3)->get();

        //  return $allMarksPosts;
        return view('Mark.Home', compact('allMarksPosts'));
    }


    public function indexProgram()
    {

        //get data { category (where category name = program) , depts , years , subject   } where category is not null(this condetion cause return other data(adve,mark ,lecture) == null)
        $allProgramsPosts = Post::getAll(4)->get();

        return view('Program.Home', compact('allProgramsPosts'));
    }


    public function indexLecture()
    {

        //get data { category (where category name = lecture) , depts , years , subject   } where category is not null(this condetion cause return other data(prog,mark,adve) == null)
        $allLecturesPosts = Post::getAll(2)->get();

        return view('Lecture.Home', compact('allLecturesPosts'));
    }

    ############################################################################################################
    ################################ End functions index ############################################
    ############################################################################################################


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    ############################################################################################################
    ################################ Begin functions Create ############################################
    ############################################################################################################

    public function createAdvertisment()
    {
        // get all depts and years and subjects to send it into view
        $depts = Dept::get();
        $years = Year::get();
//        $subjects = Subject::all();
        return view('Advertisment.Create', compact('depts', 'years'));
    }

    public function createMark()
    {
        // get all depts and years and subjects to send it into view
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Mark.Create', compact('depts', 'years', 'subjects'));
    }

    public function createProgram()
    {
        // get all depts and years and subjects to send it into view
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Program.Create', compact('depts', 'years', 'subjects'));
    }

    public function createLecture()
    {
        // get all depts and years and subjects to send it into view
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Lecture.Create', compact('depts', 'years', 'subjects'));
    }

    ############################################################################################################
    ################################ End functions Create ############################################
    ############################################################################################################


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    ############################################################################################################
    ################################ Begin functions Store ############################################
    ############################################################################################################


    public function storeAdvertisment(AdvertismentRequest $request)
    {
        //get category id
        $category_id = Category::select('id', 'name')->where('id', 1)->get();
        //insert into table post
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $category_id,
            'user_id' => auth()->id(),  //$request->user,
            'subject_id' => $request->subject,
        ]);
        // insert into tabel year_posts by relation (years())
        $post->years()->attach($request->years);

        // insert into tabel  "dept_posts"  by relation (depts())
        $post->depts()->attach($request->depts);

        //check if file send or not
        if ($request->file != null) {
            //save file in folder (assets\advertisments)
            $fileUrl = $this->saveFile($request->file, 'assets\advertisments');
            $fileType = $this->fileType($request->file);

            //insert into table url
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $post->id,
            ]);
        }


        return redirect()->route('Advertisment.create')->with(['success' => __('messages.data has been inserted successfully')]);

    }

    public function storeMark(MarkRequest $request)
    {
        //get category id
        $category_id = Category::select('id', 'name')->where('name', 'mark')->get();
        $category_id = $category_id[0]->id;


        //insert into table post
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $category_id,
            'user_id' => 1,
            'subject_id' => $request->subject,
        ]);
        // insert into tabel "year_posts" by relation (years())
        $post->years()->attach($request->year);

        // insert into tabel  "dept_posts"  by relation (depts())
        $post->depts()->attach($request->dept);

        //check if file send or not (null)
        if ($request->file != null) {
            //save file in folder (assets\marks)
            $fileUrl = $this->saveFile($request->file, 'assets\marks');
            $fileType = $this->fileType($request->file);

            //insert into table url
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $post->id,
            ]);
        }


        return redirect()->route('Mark.create')->with(['success' => __('messages.data has been inserted successfully')]);
    }


    public function storeProgram(ProgramRequest $request)
    {
        //get category id
        $category_id = Category::select('id', 'name')->where('name', 'program')->get();
        $category_id = $category_id[0]->id;


        //insert into table post
        $post = Post::create([
            'title' => $request->title,
            'category_id' => $category_id,
            'user_id' => 1,  //$request->user,
        ]);
        // insert into tabel "year_posts" by relation (years())
        $post->years()->attach($request->years);

        // insert into tabel  "dept_posts"  by relation (depts())
        $post->depts()->attach($request->depts);

        //check if file send or not (null)
        if ($request->file != null) {
            //save file in folder (assets\programs)
            $fileUrl = $this->saveFile($request->file, 'assets\programs');
            $fileType = $this->fileType($request->file);

            //insert into table url
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $post->id,
            ]);
        }


        return redirect()->route('Program.create')->with(['success' => __('messages.data has been inserted successfully')]);
    }


    public function storeLecture(LectureRequest $request)
    {
        //get category id
        $category_id = Category::select('id', 'name')->where('name', 'Lecture')->get();
        $category_id = $category_id[0]->id;


        $post = Post::create([
            'title' => $request->title,
            'category_id' => $category_id,
            'user_id' => 1,  //$request->user,
            'subject_id' => $request->subject,
        ]);
        // insert into tabel "year_posts" by relation (years())
        $post->years()->attach($request->year);

        // insert into tabel  "dept_posts"  by relation (depts())
        $post->depts()->attach($request->dept);

        //check if file send or not (null)
        if ($request->file != null) {
            //save file in folder (assets\lectures)
            $fileUrl = $this->saveFile($request->file, 'assets\lectures');
            $fileType = $this->fileType($request->file);

            //insert into table url
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $post->id,
            ]);
        }


        return redirect()->route('Lecture.index')->with(['success' => __('messages.data has been inserted successfully')]);
    }


    ############################################################################################################
    ################################ End functions Store ############################################
    ############################################################################################################

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */

    ############################################################################################################
    ################################ Begin functions Edit ############################################
    ############################################################################################################


    public function editAdvertisment($Advertisment_id)
    {
        //get post(advertisment) by id  which should edit
        $advertisment = Post::find($Advertisment_id);

        // check if post(advertisment) is exits or not
        if (!$advertisment) {
            return redirect()->route('Advertisment.index')->with(['error' => __('messages.advertisment') . " " . __('messages.not exist m')]);
        }

        // get depts and years and ulrs and subjects for this post(advertisment) and set it in variables  to retrun it into view (Advertisment.Edit)
        $advertisment_years = $advertisment->years;
        $advertisment_depts = $advertisment->depts;
        $advertisment_urls = $advertisment->urls;
        $advertisment_subjects = $advertisment->subject;

        //get all depts and years and subject to return it into view (Advertisment.Edit)
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();
        //return $advertisment_subjects;
        return view('Advertisment.Edit', compact('advertisment', 'advertisment_years', 'advertisment_depts', 'depts', 'years', 'advertisment_urls', 'advertisment_subjects', 'subjects'));

    }


    public function editMark($Mark_id)
    {
        //get post(mark) by id  which should edit
        $mark = Post::find($Mark_id);

        // check if post(mark) is exits or not
        if (!$mark) {
            return redirect()->route('Mark.index')->with(['error' => __('messages.mark') . " " . __('messages.not exist f')]);
        }

        // get depts and years and ulrs and subjects for this post(mark) and set it in variables  to retrun it into view (Mark.Edit)
        $mark_years = $mark->years;
        $mark_depts = $mark->depts;
        $mark_urls = $mark->urls;
        $mark_subjects = $mark->subject;

        //get all depts and years and subject to return it into view (Mark.Edit)
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();


        return view('Mark.Edit', compact('mark', 'mark_years', 'mark_depts', 'depts', 'years', 'mark_urls', 'mark_subjects', 'subjects'));
    }


    public function editProgram($Program_id)
    {
        //get post(program) by id  which should edit
        $program = Post::find($Program_id);

        //check if post(program) is exits or not
        if (!$program) {
            return redirect()->route('Program.index')->with(['error' => __('messages.program') . " " . __('messages.not exist m')]);
        }

        // get depts and years and ulrs and subjects for this post(Program) and set it in variables  to retrun it into view (Program.Edit)
        $program_years = $program->years;
        $program_depts = $program->depts;
        $program_urls = $program->urls;
        $program_subjects = $program->subject;

        //get all depts and years and subject to return it into view (Program.Edit)
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Program.Edit', compact('program', 'program_years', 'program_depts', 'depts', 'years', 'program_urls', 'program_subjects', 'subjects'));
    }


    public function editLecture($Lecture_id)
    {
        //get post(Lecture) by id  which should edit
        $lecture = Post::find($Lecture_id);

        //check  if post(lecture) is exits or not
        if (!$lecture) {
            return redirect()->route('Lecture.index')->with(['error' => __('messages.lecture') . " " . __('messages.not exist f')]);
        }

        // get depts and years and ulrs and subjects for this post(Lecture) and set it in variables  to retrun it into view (Lecture.Edit)
        $lecture_years = $lecture->years;
        $lecture_depts = $lecture->depts;
        $lecture_urls = $lecture->urls;
        $lecture_subjects = $lecture->subject;

        //get all depts and years and subject to return it into view (Lecture.Edit)
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Lecture.Edit', compact('lecture', 'lecture_years', 'lecture_depts', 'depts', 'years', 'lecture_urls', 'lecture_subjects', 'subjects'));
    }



    ############################################################################################################
    ################################ End functions Edit ############################################
    ############################################################################################################

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */


    ############################################################################################################
    ################################ Begin functions update ############################################
    ############################################################################################################

    public function updateAdvertisment(AdvertismentRequest $request, $Advertisment_id)
    {
        //get post(advertisment) by id  which should update
        $advertisment = Post::find($Advertisment_id);

        // check if post(advertisment) is exits or not
        // if (!$advertisment)
        //{
        //     return redirect()->route('Advertisment.index')->with(['error' => __('messages.advertisment').__('messages.not exist m')]);
        // }

        // update post(advertisment) in tabel (post)
        $advertisment->update([
            'title' => $request->title,
            'description' => $request->description,
            // 'subject_id'=>$request->subject,

        ]);

        // check if view(Edit.Advertisment) send file or not send(null)
        if ($request->file != null) {
            //save file which send in folder(assets\advertisment)
            $fileUrl = $this->saveFile($request->file, 'assets\advertisment');
            $fileType = $this->fileType($request->file);

            //insert url file into tabel "urls"
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $advertisment->id,
            ]);


            //return "im in";
        }


        // update years in tabel "year_posts" by relation (years())
        $advertisment->years()->sync($request->years);

        // update depts in tabel "dept_posts" by relation (depts())
        $advertisment->depts()->sync($request->depts);

        return redirect()->route('Advertisment.index')->with(['success' => __('messages.data has been updated successfully')]);


    }


    public function updateMark(MarkRequest $request, $Mark_id)
    {
        //get post(mark) by id  which should update
        $mark = Post::find($Mark_id);

        // check if post(mark) is exits or not
        if (!$mark) {
            return redirect()->route('Mark.index')->with(['error' => __('messages.mark') . " " . __('messages.not exist f')]);
        }

        // update post(mark) in tabel (post)
        $mark->update([
            'title' => $request->title,
            'description' => $request->description,
            'subject_id' => $request->subject,

        ]);

        // check if view(Edit.Mark) send file or not send(null)
        if ($request->file != null) {
            //save file which send in folder(assets\marks)
            $fileUrl = $this->saveFile($request->file, 'assets\marks');
            $fileType = $this->fileType($request->file);

            //insert url file into tabel "urls"
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $mark->id,
            ]);
        }

        // update years in tabel "year_posts" by relation (years())
        $mark->years()->sync($request->year);

        // update depts in tabel "dept_posts" by relation (depts())
        $mark->depts()->sync($request->dept);

        return redirect()->route('Mark.index')->with(['success' => __('messages.data has been updated successfully')]);


    }


    public function updateProgram(ProgramRequest $request, $Program_id)
    {
        //get post(program) by id  which should update
        $program = Post::find($Program_id);

        // check if post(program) is exits or not
        if (!$program) {
            return redirect()->route('Advertisment.index')->with(['error' => __('messages.program') . " " . __('messages.not exist m')]);
        }

        // update post(program) in tabel (post)
        $program->update([
            'title' => $request->title,
            'user_id' => 1,  //$request->user,

        ]);

        // check if view(Edit.Program) send file or not send(null)
        if ($request->file != null) {
            //save file which send in folder(assets\programs)
            $fileUrl = $this->saveFile($request->file, 'assets\programs');
            $fileType = $this->fileType($request->file);

            //insert url file into tabel "urls"
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $program->id,
            ]);
        }

        // update years in tabel "year_posts" by relation (years())
        $program->years()->sync($request->years);

        // update depts in tabel "dept_posts" by relation (depts())
        $program->depts()->sync($request->depts);


        return redirect()->route('Program.index')->with(['success' => __('messages.data has been updated successfully')]);


    }


    public function updateLecture(LectureRequest $request, $Lectrue_id)
    {
        //get post(lectrue) by id  which should update
        $lectrue = Post::find($Lectrue_id);

        // check if post(lectrue) is exits or not
        if (!$lectrue) {
            return redirect()->route('Lecture.index')->with(['error' => __('messages.lecture') . " " . __('messages.not exist m')]);;
        }

        // update post(lecture) in tabel (post)
        $lectrue->update([
            'title' => $request->title,
            'subject_id' => $request->subject,

        ]);

        // check if view(Edit.Lecture) send file or not send(null)
        if ($request->file != null) {
            //save file which send in folder(assets\lectures)
            $fileUrl = $this->saveFile($request->file, 'assets\lectures');
            $fileType = $this->fileType($request->file);

            //insert url file into tabel "urls"
            Url::create([
                'url' => $fileUrl,
                'file_type' => $fileType,
                'post_id' => $lectrue->id,
            ]);
        }

        // update years in tabel "year_posts" by relation (years())
        $lectrue->years()->sync($request->year);

        // update depts in tabel "dept_posts" by relation (depts())
        $lectrue->depts()->sync($request->dept);


        return redirect()->route('Lecture.index')->with(['success' => __('messages.data has been updated successfully')]);


    }


    ############################################################################################################
    ################################ End functions update ############################################
    ############################################################################################################

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */

    ############################################################################################################
    ################################ Begin functions destory ############################################
    ############################################################################################################

    public function destroyAdvertisment($Advertisment_id)
    {
        //get post(advertisment) by id  which should delete
        $advertisment = Post::find($Advertisment_id);

        // check if post(advertisment) is exits or not
        if (!$advertisment) {
            return redirect()->route('Advertisment.index')->with(['error' => __('messages.advertisment') . " " . __('messages.not exist m')]);
        }

        // loop to each file  in this post(advertisment)
        foreach ($advertisment->urls as $file) {
            //check if file is exits in folder or not
            if (FacadesFile::exists($file->url)) {
                //delete file in folder
                unlink($file->url);
            }
        }

        // delete post(advertisment) in tabel "posts"
        $advertisment->delete();

        return redirect()->route('Advertisment.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }


    public function destroyMark($Mark_id)
    {
        //get post(mark) by id  which should delete
        $mark = Post::find($Mark_id);

        // check if post(mark) is exits or not
        if (!$mark) {
            return redirect()->route('Mark.index')->with(['error' => __('messages.mark') . " " . __('messages.not exist f')]);
        }

        // loop to each file  in this post(mark)
        foreach ($mark->urls as $file) {
            //check if file is exits in folder or not
            if (FacadesFile::exists($file->url)) {
                //delete file in folder
                unlink($file->url);
            }

        }

        // delete post(mark) in tabel "posts"
        $mark->delete();

        return redirect()->route('Mark.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }


    public function destroyProgram($Program_id)
    {
        //get post(program) by id  which should delete
        $program = Post::find($Program_id);

        // check if post(program) is exits or not
        if (!$program) {
            return redirect()->route('Program.index')->with(['error' => __('messages.program') . " " . __('messages.not exist m')]);
        }

        // loop to each file  in this post(program)
        foreach ($program->urls as $file) {
            //check if file is exits in folder or not
            if (FacadesFile::exists($file->url)) {
                //delete file in folder
                unlink($file->url);
            }
        }

        // delete post(program) in tabel "posts"
        $program->delete();

        return redirect()->route('Program.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }


    public function destroyLectrue($Lectrue_id)
    {
        //get post(lectrue) by id  which should delete
        $lectrue = Post::find($Lectrue_id);

        // check if post(lectrue) is exits or not
        if (!$lectrue) {
            return redirect()->route('Lecture.index')->with(['error' => __('messages.lecture') . " " . __('messages.not exist f')]);
        }

        // delete post(lecture) in tabel "posts"
        foreach ($lectrue->urls as $file) {
            //check if file is exits in folder or not
            if (FacadesFile::exists($file->url)) {
                //delete file in folder
                unlink($file->url);
            }
        }

        // delete post(lecture) in tabel "posts"
        $lectrue->delete();

        return redirect()->route('Lecture.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }



    ############################################################################################################
    ################################ End functions destory ############################################
    ############################################################################################################

    public function deleteUrl($url_id)
    {
        //get ulr by id  which should delete
        $urll = Url::find($url_id);

        // check if url is exits or not
        if (!$urll) {
            return redirect()->back()->with(['error' => __('messages.this file is not exsit')]);
        }

        //check if file is exits in folder or not
        if (FacadesFile::exists($urll->url)) {
            //delete file in folder
            unlink($urll->url);
        }

        //delete url in tabel "urls"
        $urll->delete($urll->url);

        return redirect()->back();

    }


################################################# TESTING #######################################################


    public function test()
    {


        //$subjects=Subject::with('dept','year')->get();
        // return $subjects;

        //    $dept_subject = Subject::find(6);
        //    return $dept_subject->dept;

        // $year_subject=Subject::find(1);
        // return $year_subject->year;

        // $subjects_dept= Dept::with('subjects')->get();
        // return $subjects_dept;

        // $subjects_year=Year::with('subjects')->get();
        // return $subjects_year;

        //  $allUsers = User::get()->where('status','0');

        //  return view('User.Home',compact('allUsers'));
        //   $lecture = Post::find(22);


        //   $lecture_years = $lecture->years;
        //   $lecture_depts = $lecture->depts;
        //   $lecture_urls = $lecture->urls;
        //   $lecture_subjects = $lecture->subject;

        //  $depts = Dept::get();
        //  $years = Year::get();
        //  $subjects =Subject::get();

        //  return $lecture_depts;
        //    foreach ($depts as $dept)
        //    {
        //        if($dept->id == $lecture_depts[0]->id)
        //        {
        //             return 'true';
        //        }
        //        else
        //        {
        //            return 'false';
        //        }
        //    }


        //  // return $lecture;
        //  // return $lecture_depts;

        // //   return ;
        // //   return $lecture_years;
        // //   return $years;
        // //   return $lecture_subjects;
        // //   return $subjects;
    }
}
