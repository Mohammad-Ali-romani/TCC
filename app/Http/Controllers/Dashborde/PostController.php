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
        $allAdvertismentsPosts = Post::with([
            'category' => function($q){ $q->select('id','name')->where('name','advertisment'); },
            'depts',
            'years',
            'subject'
            ])->get()->where('category','!=',null);
        
        return view('Advertisment.Home',compact('allAdvertismentsPosts'));
        // return $allAdvertismentsPosts;
    }



    public function indexMark()
    {
        $allMarksPosts = Post::with([
            'category'=>function($q){ $q->select('id','name')->where('name','mark'); },
            'depts',
            'years' ,
            'subject'
            ])->get()->where('category','!=',null);

        //  return $allMarksPosts;
        return view('Mark.Home',compact('allMarksPosts'));
    }  


    public function indexProgram()
    {
        $allProgramsPosts = Post::with([
            'category'=>function ($q){ $q->select('id','name')->where('name','program'); },
            'depts',
            'years',
            'subject'
        ])->get()->where('category','!=',null);

        return view('Program.Home',compact('allProgramsPosts'));
    }



    public function indexLecture()
    {
        $allLecturesPosts = Post::with([
            'category'=>function ($q) { $q->select('id','name')->where('name','lecture'); },
            'depts',
            'years',
            'subject'
        ])->get()->where('category','!=',null);

        return view('Lecture.Home',compact('allLecturesPosts'));
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
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Advertisment.Create',compact('depts','years','subjects'));
    }

    public function createMark()
    {
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Mark.Create',compact('depts','years','subjects'));
    }

    public function createProgram()
    {
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Program.Create',compact('depts','years','subjects'));
    }

    public function createLecture()
    {
        $depts = Dept::get();
        $years = Year::get();
        $subjects = Subject::get();

        return view('Lecture.Create',compact('depts','years','subjects'));
    }

    ############################################################################################################
        ################################ End functions Create ############################################
    ############################################################################################################
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     ############################################################################################################
        ################################ Begin functions Store ############################################
    ############################################################################################################


    public function storeAdvertisment(AdvertismentRequest $request)
    {
        //get category id 
        $category_id = Category::select('id','name')->where('name','advertisment')->get();
        $category_id = $category_id[0]->id;

        //save file in folder (assets\advertisments)
        $fileUrl = $this->saveFile($request->file,'assets\advertisments');
        $fileType = $this->fileType($request->file);

        //validation


        //insert into table post
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'category_id'=>$category_id,
            'user_id'=>1,  //$request->user,
            // 'subject_id'=>$request->subject,
        ]);
        $post->years()->attach($request->years);
        $post->depts()->attach($request->depts);

        //insert into table url
        Url::create([
            'url'=>$fileUrl,
            'file_type'=>$fileType,
            'post_id'=>$post->id,
        ]);

        return redirect()->route('Advertisment.create')->with(['success'=>__('messages.data has been inserted successfully')]);
        
    }

    public function storeMark(MarkRequest $request)
    {
        $category_id = Category::select('id','name')->where('name','mark')->get();
        $category_id = $category_id[0]->id;

        //save file in folder (assets\marks)
        $fileUrl = $this->saveFile($request->file,'assets\marks');
        $fileType = $this->fileType($request->file);

        //validation

        //insert into table post
        $post = Post::create([
            'title'=>$request->title,          
            'category_id'=>$category_id,
            'user_id'=>1,
            'subject_id'=>$request->subject,
        ]);
        $post->years()->attach($request->year);
        $post->depts()->attach($request->dept);

        //insert into table url
        Url::create([
            'url'=>$fileUrl,
            'file_type'=>$fileType,
            'post_id'=>$post->id,
        ]);

        return redirect()->route('Mark.create')->with(['success'=>__('messages.data has been inserted successfully')]);
    }


    public function storeProgram(ProgramRequest $request)
    {
        //get category id 
        $category_id = Category::select('id','name')->where('name','program')->get();
        $category_id = $category_id[0]->id;

        //save file in folder (assets\programs)
        $fileUrl = $this->saveFile($request->file,'assets\programs');
        $fileType = $this->fileType($request->file);

        //validation


        //insert into table post
        $post = Post::create([
            'title'=>$request->title,          
            'category_id'=>$category_id,
            'user_id'=>1,  //$request->user,
        ]);
        $post->years()->attach($request->years);
        $post->depts()->attach($request->depts);

        //insert into table url
        Url::create([
            'url'=>$fileUrl,
            'file_type'=>$fileType,
            'post_id'=>$post->id,
        ]);


        return redirect()->route('Program.create')->with(['success'=>__('messages.data has been inserted successfully')]);
    }


    public function storeLecture(LectureRequest $request)
    {
        //get category id 
        $category_id = Category::select('id','name')->where('name','Lecture')->get();
        $category_id = $category_id[0]->id;

        //save file in folder (assets\lectures)
        $fileUrl = $this->saveFile($request->file,'assets\lectures');
        $fileType = $this->fileType($request->file);

        $post = Post::create([
            'title'=>$request->title,
            'category_id'=>$category_id,
            'user_id'=>1,  //$request->user,
            'subject_id'=>$request->subject,
        ]);
        $post->years()->attach($request->year);
        $post->depts()->attach($request->dept);

        Url::create([
            'url'=>$fileUrl,
            'file_type'=>$fileType,
            'post_id'=>$post->id,
        ]);
        
        return redirect()->route('Lecture.index')->with(['success'=>__('messages.data has been inserted successfully')]);
    }


    ############################################################################################################
        ################################ End functions Store ############################################
    ############################################################################################################

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     ############################################################################################################
        ################################ Begin functions Edit ############################################
    ############################################################################################################


    public function editAdvertisment($Advertisment_id)
    {
        $advertisment = Post::find($Advertisment_id);
        if (!$advertisment)
        {
            return redirect()->route('Advertisment.index')->with(['error' =>__('messages.advertisment').$Advertisment_id.__('messages.not exist m')]);
        }

        $advertisment_years = $advertisment->years;
        $advertisment_depts = $advertisment->depts;
        $advertisment_urls = $advertisment->urls;
        $advertisment_subjects = $advertisment->subject;

       $depts = Dept::get();
       $years = Year::get();
       $subjects =Subject::get();
        //return $advertisment_subjects;
        return view('Advertisment.Edit',compact('advertisment','advertisment_years','advertisment_depts','depts','years','advertisment_urls','advertisment_subjects','subjects'));
       
    }


    public function editMark($Mark_id)
    {
        $mark = Post::find($Mark_id);
        // if (!$mark)
        // {
        //     return redirect()->route('Mark.index')->with(['error' => __('messages.mark').$Mark_id.__('messages.not exist f')]);
        // }

        $mark_years = $mark->years;
        $mark_depts = $mark->depts;
        $mark_urls = $mark->urls;
        $mark_subjects = $mark->subject;


       $depts = Dept::get();
       $years = Year::get();
       $subjects =Subject::get();


        return view('Mark.Edit',compact('mark','mark_years','mark_depts','depts','years','mark_urls','mark_subjects','subjects'));
    }


    public function editProgram($Program_id)
    {
        $program = Post::find($Program_id);
        if (!$program)
        {
            return redirect()->route('Program.index')->with(['error' => __('messages.program').$Program_id.__('messages.not exist m')]);
        }

        $program_years = $program->years;
        $program_depts = $program->depts;
        $program_urls = $program->urls;
        $program_subjects = $program->subject;

       $depts = Dept::get();
       $years = Year::get();
       $subjects =Subject::get();

        return view('Program.Edit',compact('program','program_years','program_depts','depts','years','program_urls','program_subjects','subjects'));
    }


    public function editLecture($Lecture_id)
    {
        $lecture = Post::find($Lecture_id);
        if (!$lecture)
        {
            return redirect()->route('Lecture.index')->with(['error' => __('messages.lecture').$Lecture_id.__('messages.not exist f')]);
        }

        $lecture_years = $lecture->years;
        $lecture_depts = $lecture->depts;
        $lecture_urls = $lecture->urls;
        $lecture_subjects = $lecture->subject;

       $depts = Dept::get();
       $years = Year::get();
       $subjects =Subject::get();

        return view('Lecture.Edit',compact('lecture','lecture_years','lecture_depts','depts','years','lecture_urls','lecture_subjects','subjects'));
    }



    ############################################################################################################
        ################################ End functions Edit ############################################
    ############################################################################################################

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */



     ############################################################################################################
        ################################ Begin functions update ############################################
    ############################################################################################################

    public function updateAdvertisment(AdvertismentRequest $request ,$Advertisment_id)
    {
        $advertisment = Post::find($Advertisment_id);
        
        // if (!$advertisment) 
         //{
        //     return redirect()->route('Advertisment.index')->with(['error' => __('messages.advertisment').$Advertisment_id.__('messages.not exist m')]);
        // }

        $advertisment->update([
            'title'=>$request->title,
            'description'=>$request->description,
            // 'subject_id'=>$request->subject,
            
        ]);

        if($request->file !=null)
        {
            $fileUrl = $this->saveFile($request->file,'assets\advertisment');
            $fileType = $this->fileType($request->file);

            Url::created([
                'url'=>$fileUrl,
                'file_type'=>$fileType,
                'post_id'=>$advertisment->id,
            ]);
        }

        $advertisment->years()->sync($request->years);
        $advertisment->depts()->sync($request->depts);

        return redirect()->route('Advertisment.index')->with(['success' => __('messages.data has been updated successfully'). $Advertisment_id]);


    }


    public function updateMark(MarkRequest $request ,$Mark_id)
    {
        $mark = Post::find($Mark_id);
        
        if (!$mark) {
            return redirect()->route('Mark.index')->with(['error' =>__('messages.mark').$Mark_id.__('messages.not exist f')]);
        }

        $mark->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'subject_id'=>$request->subject,
            
        ]);


        if($request->file !=null)
        {
            $fileUrl = $this->saveFile($request->file,'assets\marks');
            $fileType = $this->fileType($request->file);
    
            Url::create([
                'url'=>$fileUrl,
                'file_type'=>$fileType,
                'post_id'=>$mark->id,
            ]);
        }


        $mark->years()->sync($request->year);
        $mark->depts()->sync($request->dept);

        return redirect()->route('Mark.index')->with(['success' => __('messages.data has been updated successfully') . $Mark_id]);


    }


    public function updateProgram(ProgramRequest $request ,$Program_id)
    {
        $program = Post::find($Program_id);
        
        if (!$program) {
            return redirect()->route('Advertisment.index')->with(['error' => __('messages.program').$Program_id.__('messages.not exist m')]);
        }

        $program->update([
            'title'=>$request->title,
            'user_id'=>1,  //$request->user,
            
        ]);


        if($request->file !=null)
        {
            $fileUrl = $this->saveFile($request->file,'assets\programs');
            $fileType = $this->fileType($request->file);

            Url::create([
                'url'=>$fileUrl,
                'file_type'=>$fileType,
                'post_id'=>$program->id,
            ]);
        }

        $program->years()->sync($request->years);
        $program->depts()->sync($request->depts);
        

        return redirect()->route('Program.index')->with(['success' => __('messages.data has been updated successfully') . $Program_id]);


    }


    public function updateLecture(LectureRequest $request ,$Lectrue_id)
    {
        $lectrue = Post::find($Lectrue_id);
        
        if (!$lectrue) {
            return redirect()->route('Lecture.index')->with(['error' => __('messages.lecture'). $Lectrue_id. __('messages.not exist m')]);;
        }

        $lectrue->update([
            'title'=>$request->title,
            'subject_id'=>$request->subject,
            
        ]);

        if($request->file !=null)
        {
            $fileUrl = $this->saveFile($request->file,'assets\lectures');
            $fileType = $this->fileType($request->file);
            Url::create([
                'url'=>$fileUrl,
                'file_type'=>$fileType,
                'post_id'=>$lectrue->id,
            ]);
        }

        $lectrue->years()->sync($request->year);
        $lectrue->depts()->sync($request->dept);

        return redirect()->route('Lecture.index')->with(['success' => __('messages.data has been updated successfully') . $Lectrue_id]);


    }


    ############################################################################################################
        ################################ End functions update ############################################
    ############################################################################################################

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

     ############################################################################################################
        ################################ Begin functions destory ############################################
    ############################################################################################################
    
    public function destroyAdvertisment($Advertisment_id)
    {
        $advertisment = Post::find($Advertisment_id);

        if(!$advertisment)
        {
            return redirect()->route('Advertisment.index')->with(['error'=>__('messages.advertisment').$Advertisment_id.__('messages.not exist m')]);
        }

        foreach($advertisment->urls as $file)
        {
            if (FacadesFile::exists($file->url))
            {
                unlink($file->url);
            }
        }  

        $advertisment->delete();

        return redirect()->route('Advertisment.index')->with(['success' =>__('messages.data has been deleted successfully')]);
    }


    public function destroyMark($Mark_id)
    {
        $mark = Post::find($Mark_id);

        if(!$mark)
        {
            return redirect()->route('Mark.index')->with(['error'=>__('messages.mark').$Mark_id.__('messages.not exist f')]);
        }

        
        foreach($mark->urls as $file)
        {
            if (FacadesFile::exists($file->url))
            {
                unlink($file->url);
            }
            
        }  

        $mark->delete();

        return redirect()->route('Mark.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }


    public function destroyProgram($Program_id)
    {
        $program = Post::find($Program_id);

        if(!$program)
        {
            return redirect()->route('Program.index')->with(['error'=>__('messages.program').$Program_id.__('messages.not exist m')]);
        }

        foreach($program->urls as $file)
        {
            if (FacadesFile::exists($file->url))
            {
                unlink($file->url);
            }
        }  

        $program->delete();

        return redirect()->route('Program.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }


    public function destroyLectrue($Lectrue_id)
    {
        $lectrue = Post::find($Lectrue_id);

        if(!$lectrue)
        {
            return redirect()->route('Lecture.index')->with(['error'=>__('messages.lecture').$Lectrue_id.__('messages.not exist f')]);
        }

        foreach($lectrue->urls as $file)
        {
            if (FacadesFile::exists($file->url))
            {
                unlink($file->url);
            }
        }  

        $lectrue->delete();

        return redirect()->route('Lecture.index')->with(['success' => __('messages.data has been deleted successfully')]);
    }



    ############################################################################################################
        ################################ End functions destory ############################################
    ############################################################################################################

    public function deleteUrl($url_id)
    {
        $url = Url::find($url_id);

        if(!$url)
        {
            return redirect()->back()->with(['error'=>__('messages.this file is not exsit')]);
        }
        $url->delete();

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
