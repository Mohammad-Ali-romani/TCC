<?php

namespace App\Http\Controllers\Dashborde;

use App\Models\User;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

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

        return view('auth.register',compact('levels'));
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
            'password'=>$request->password,
            'level_id'=>$request->level_id,
            'status'=>$request->status,
        ]);


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
            return redirect()->route('User.index')->with(['error'=>__('messages.user').$User_id.__('messages.not exist m')]);
        }

        //delete this user from tabel "users"
        $user->delete();

        return redirect()->route('User.index')->with(['success'=>__('messages.data has been deleted successfully')]);
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

            return view('User.Home')->with([
                'allUsers' =>  $filteredUsers
            ]);
        }
    else {

        return redirect()->route('User.allUser')->with([
            'status' => 'search failed ,, please try again'
        ]);
        }
    }



}
