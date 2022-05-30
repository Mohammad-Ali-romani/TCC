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
        ];
        $data = $this->validate_value(request(),$rules,[],[
            'name' =>trans('admin.name'),
        ]);
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
    public function update($User_id){
        $data = $this->validate_value();
        admin_groups::where('user_id',$User_id)->update($data);
        return redirect()->back()->with(['success'=>__('messages.data has been updated successfully')]);

    }
}
