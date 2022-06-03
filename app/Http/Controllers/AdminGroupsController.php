<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\admin_groups;
use App\Models\User;
use Illuminate\Http\Request;

class AdminGroupsController extends Controller
{
    public function validate_value(){
        $rules = [
            'admin_show'         =>'sometimes|nullable|in:enable,disable',
            'admin_add'          =>'sometimes|nullable|in:enable,disable',
            'admin_edit'         =>'sometimes|nullable|in:enable,disable',
            'admin_delete'       =>'sometimes|nullable|in:enable,disable',
            'lecture_show'       =>'sometimes|nullable|in:enable,disable',
            'lecture_add'        =>'sometimes|nullable|in:enable,disable',
            'lecture_edit'       =>'sometimes|nullable|in:enable,disable',
            'lecture_delete'     =>'sometimes|nullable|in:enable,disable',
            'ad_show'            =>'sometimes|nullable|in:enable,disable',
            'ad_add'             =>'sometimes|nullable|in:enable,disable',
            'ad_edit'            =>'sometimes|nullable|in:enable,disable',
            'ad_delete'          =>'sometimes|nullable|in:enable,disable',
            'program_show'       =>'sometimes|nullable|in:enable,disable',
            'program_add'        =>'sometimes|nullable|in:enable,disable',
            'program_edit'       =>'sometimes|nullable|in:enable,disable',
            'program_delete'     =>'sometimes|nullable|in:enable,disable',
            'mark_show'          =>'sometimes|nullable|in:enable,disable',
            'mark_add'           =>'sometimes|nullable|in:enable,disable',
            'mark_edit'          =>'sometimes|nullable|in:enable,disable',
            'mark_delete'        =>'sometimes|nullable|in:enable,disable',
            'subject_show'       =>'sometimes|nullable|in:enable,disable',
            'subject_add'        =>'sometimes|nullable|in:enable,disable',
            'subject_edit'       =>'sometimes|nullable|in:enable,disable',
            'subject_delete'     =>'sometimes|nullable|in:enable,disable',
        ];

        $data = $this->validate_value(request(),$rules,[],[]);
        $new_data = [];
        foreach ($rules as $k =>$v){
            if (empty(request($k))){
                $new_data[$k]='disable';
            }else{
                $new_data[$k]= request($k);
            }
        }
        return $new_data;
    }
    public function store(){

        $data = $this->validate_value();
        admin_groups::create($data);
        return redirect()->back()->with(['success'=>__('messages.data has been added successfully')]);

    }
//    public function update(Request $request,$User_id){
//        $admin_groube = $this->validate_value();
//
//        admin_groups::where('user_id',$User_id)->update($admin_groube);
//        return redirect()->route('User.allUser')->with(['success'=>__('messages.data has been updated successfully')]);
//
//    }

    public function update(Request $request,$User_id){
        $valedatedData = $request->validate([
            'admin_show'         =>'sometimes|nullable|in:enable,disable',
            'admin_add'          =>'sometimes|nullable|in:enable,disable',
            'admin_edit'         =>'sometimes|nullable|in:enable,disable',
            'admin_delete'       =>'sometimes|nullable|in:enable,disable',
            'lecture_show'       =>'sometimes|nullable|in:enable,disable',
            'lecture_add'        =>'sometimes|nullable|in:enable,disable',
            'lecture_edit'       =>'sometimes|nullable|in:enable,disable',
            'lecture_delete'     =>'sometimes|nullable|in:enable,disable',
            'ad_show'            =>'sometimes|nullable|in:enable,disable',
            'ad_add'             =>'sometimes|nullable|in:enable,disable',
            'ad_edit'            =>'sometimes|nullable|in:enable,disable',
            'ad_delete'          =>'sometimes|nullable|in:enable,disable',
            'program_show'       =>'sometimes|nullable|in:enable,disable',
            'program_add'        =>'sometimes|nullable|in:enable,disable',
            'program_edit'       =>'sometimes|nullable|in:enable,disable',
            'program_delete'     =>'sometimes|nullable|in:enable,disable',
            'mark_show'          =>'sometimes|nullable|in:enable,disable',
            'mark_add'           =>'sometimes|nullable|in:enable,disable',
            'mark_edit'          =>'sometimes|nullable|in:enable,disable',
            'mark_delete'        =>'sometimes|nullable|in:enable,disable',
            'subject_show'       =>'sometimes|nullable|in:enable,disable',
            'subject_add'        =>'sometimes|nullable|in:enable,disable',
            'subject_edit'       =>'sometimes|nullable|in:enable,disable',
            'subject_delete'     =>'sometimes|nullable|in:enable,disable',
        ]);
        if (empty($request->admin_show)){$request->admin_show = 'disable';}
        if (empty($request->admin_add)){$request->admin_add = 'disable';}
        if (empty($request->admin_edit)){$request->admin_edit = 'disable';}
        if (empty($request->admin_delete)){$request->admin_delete = 'disable';}
        if (empty($request->lecture_show)){$request->lecture_show = 'disable';}
        if (empty($request->lecture_add)){$request->lecture_add = 'disable';}
        if (empty($request->lecture_edit)){$request->lecture_edit = 'disable';}
        if (empty($request->lecture_delete)){$request->lecture_delete = 'disable';}
        if (empty($request->ad_show)){$request->ad_show = 'disable';}
        if (empty($request->ad_add)){$request->ad_add = 'disable';}
        if (empty($request->ad_edit)){$request->ad_edit = 'disable';}
        if (empty($request->ad_delete)){$request->ad_delete = 'disable';}
        if (empty($request->program_show)){$request->program_show = 'disable';}
        if (empty($request->program_add)){$request->program_add = 'disable';}
        if (empty($request->program_edit)){$request->program_edit = 'disable';}
        if (empty($request->program_delete)){$request->program_delete = 'disable';}
        if (empty($request->mark_show)){$request->mark_show = 'disable';}
        if (empty($request->mark_add)){$request->mark_add = 'disable';}
        if (empty($request->mark_edit)){$request->mark_edit = 'disable';}
        if (empty($request->mark_delete)){$request->mark_delete = 'disable';}
        if (empty($request->subject_show)){$request->subject_show = 'disable';}
        if (empty($request->subject_add)){$request->subject_add = 'disable';}
        if (empty($request->subject_edit)){$request->subject_edit = 'disable';}
        if (empty($request->subject_delete)){$request->subject_delete = 'disable';}
        $data = [
            'admin_show'=>$request->admin_show,
            'admin_add'=>$request->admin_add,
            'admin_edit'=>$request->admin_edit,
            'admin_delete'=>$request->admin_delete,
            'lecture_show'=>$request->lecture_show,
            'lecture_add'=>$request->lecture_add,
            'lecture_edit'=>$request->lecture_edit,
            'lecture_delete'=>$request->lecture_delete,
            'ad_show'=>$request->ad_show,
            'ad_add'=>$request->ad_add,
            'ad_edit'=>$request->ad_edit,
            'ad_delete'=>$request->ad_delete,
            'program_show'=>$request->program_show,
            'program_add'=>$request->program_add,
            'program_edit'=>$request->program_edit,
            'program_delete'=>$request->program_delete,
            'mark_show'=>$request->mark_show,
            'mark_add'=>$request->mark_add,
            'mark_edit'=>$request->mark_edit,
            'mark_delete'=>$request->mark_delete,
            'subject_show'=>$request->subject_show,
            'subject_add'=>$request->subject_add,
            'subject_edit'=>$request->subject_edit,
            'subject_delete'=>$request->subject_delete,
        ];


        admin_groups::where('user_id',$User_id)->update($data);
        return redirect()->route('User.allUser')->with(['success'=>__('messages.data has been updated successfully')]);

    }


}
