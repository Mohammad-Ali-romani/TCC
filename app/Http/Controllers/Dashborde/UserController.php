<?php

namespace App\Http\Controllers\Dashborde;

use App\Models\User;
use App\Models\Level;
use App\Models\admin_groups;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('Permission:admin_show',['only' => 'AllUser']);
    }


    public function AllUser()
    {
        // get All Users(Active or not Avtive) form table "users"
        $allUsers = User::get();

        return view('User.Home',compact('allUsers'));
    }

    public function ActiveUser()
    {
        //get Users (Active only) from tabel "users"
        $allUsers = User::get()->where('status',__('messages.active'));

        return view('User.Home',compact('allUsers'));
    }
    public function NotActiveUser()
    {
        //get users (not Avtive only) from tabel "users"
        $allUsers = User::get()->where('status',__('messages.unactive'));

        return view('User.Home',compact('allUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get All  levle from table "levels"
        $levels = Level::select('id','name')->get();
        return view('User.Create',compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        //insert data into tabel
        User::create([
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
            'level_id'=>$request->level_id,
            'status'=>$request->status,
        ]);

        $id = User::select('id')->orderBy('created_at', 'desc')->first();
        if ($request->level_id === '1'){
            admin_groups::create([
                'user_id' => $id->id,
                'admin_show'         =>'enable',
                'admin_add'          =>'enable',
                'admin_edit'         =>'enable',
                'admin_delete'       =>'enable',
                'lecture_show'       =>'enable',
                'lecture_add'        =>'enable',
                'lecture_edit'       =>'enable',
                'lecture_delete'     =>'enable',
                'ad_show'            =>'enable',
                'ad_add'             =>'enable',
                'ad_edit'            =>'enable',
                'ad_delete'          =>'enable',
                'program_show'       =>'enable',
                'program_add'        =>'enable',
                'program_edit'       =>'enable',
                'program_delete'     =>'enable',
                'mark_show'          =>'enable',
                'mark_add'           =>'enable',
                'mark_edit'          =>'enable',
                'mark_delete'        =>'enable',
            ]);
        }

        //retrun into index page
        return redirect()->route('User.allUser')->with(['success'=>__('messages.data has been inserted successfully')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(User $uesr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($User_id)
    {
        // get user by id from tabel "users"  should edit
        $user= User::find($User_id);

        //check if this user is exist or not
        if(!$user)
        {
            return redirect()->route('User.index')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }

        //get All  levle from table "levels"
        $levels = Level::get();

        return view('User.Edit',compact('user','levels'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */

     //this Methode to avtive user
    public function activate($User_id)
    {
        //get user by id from table "users" should Avtive
        $user= User::find($User_id);

        //check if this user is exist or not
        if(!$user)
        {
            return redirect()->route('User.allUser')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }

        //update column status to avtive
        $user->update([
            'status'=>'1'
        ]);


        return redirect()->back()->with(['success'=>__('messages.data has been updated successfully')]);

    }

    //this Methode to unavtive user
    public function unactivate($User_id)
    {
        //get user by id from table "users" should unActive
        $user= User::find($User_id);

        //check if this user is exist or not
        if(!$user)
        {
            return redirect()->route('User.allUser')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }

        //update column status to unavtive
            $user->update([
                'status'=>'0'
            ]);



        return redirect()->back()->with(['success'=>__('messages.data has been updated successfully')]);

    }



    public function update(UserRequest $request,$User_id)
    {
        //get user by id from table "users" should update
        $uesr = User::find($User_id);

        //check if this user is exist or not
        if(!$uesr)
        {
            return redirect()->route('User.index')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }
        //update data
        $uesr->update($request->all());

        //return into Advertisment page
        return redirect()->route('User.index')->with(['success'=>__('messages.data has been updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($User_id)
    {
        //get user by id from table "users" should delete
        $user= User::find($User_id);

        // check if this user is exist or not
        if(!$user)
        {
            return redirect()->route('User.allUser')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }

        //delete this user from tabel "users"
        $user->delete();

        return redirect()->route('User.allUser')->with(['success'=>__('messages.data has been deleted successfully')]);
    }

    //Search
    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);
        $q = $request->q;
        $Active = $request->Active;
        $level_id = $request->level_id;
        $filteredUsers = User::where('name', 'like', '%' . $q . '%')
                                ->where('status' ,'=',$Active)->where('level_id','=',$level_id)
                                ->orWhere('email', 'like', '%' . $q . '%')
                                ->where('status' ,'=',$Active)->where('level_id','=',$level_id)
                                ->get();

        if ($filteredUsers->count() ) {

            return redirect()->back()->with([
                'allUsers' =>  $filteredUsers
            ]);
        }
    else {
        //return redirect()->route('signUp')->withInput();
        return redirect()->back()->withInput()->with([
            'status' => 'search failed ,, please try again'
        ]);
        }
    }



}
