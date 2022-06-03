@extends('layout.layout')

@section('content')

<div class="mb-4">
    <h1>{{__('views/user.edit').' '.__('views/user.user')}} </h1>

    @if( session('success'))
        <div class="alert alert-info">
            {{ session('success')}}
        </div>
    @endif
    <form method="POST" action="{{route('AdminGroup.update',$user->user_id)}}" enctype="multipart/form-data">
        @csrf
        @method('POST')

{{--        <div class="mb-3">--}}
{{--          <label for="exampleFormControlInput1" class="form-label">{{__('views/user.name')}}</label>--}}
{{--          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.name')}}" name="name" value="{{$user->name}}">--}}
{{--          @error('name')--}}
{{--          <small class="form-text text-danger">{{$message}}</small>--}}
{{--          @enderror--}}
{{--        </div>--}}


{{--        <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.level')}} </label>--}}
{{--  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level">--}}
{{--    @foreach ($levels as $level )--}}
{{--      <option value="{{$level->id}}"--}}
{{--        @if ($user->level_id == $level->id)--}}
{{--          selected--}}
{{--        @endif--}}
{{--        >--}}
{{--        {{$level->name}}--}}
{{--      </option>--}}
{{--    @endforeach--}}
{{--  </select>--}}
{{--  <br>--}}


{{--  <div class="mb-3">--}}
{{--    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.status')}}</label><br>--}}
{{--    <input type="radio" class="" id="status"  name="status" value="1"--}}
{{--      @if ($user->status == 1)--}}
{{--        checked--}}
{{--      @endif--}}
{{--    >--}}
{{--    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.active')}}</label>--}}

{{--    &emsp;&emsp;--}}

{{--    <input type="radio" class="" id="status"  name="status" value="0"--}}
{{--      @if ($user->status == 0)--}}
{{--        checked--}}
{{--      @endif--}}
{{--    >--}}
{{--    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.not active')}} </label>--}}
{{--  </div>--}}


{{--  <div class="mb-3">--}}
{{--    <label for="exampleFormControlTextarea1" class="form-label"> {{__('views/user.email')}}</label>--}}
{{--    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.email')}}" name="email" value="{{$user->email}}">--}}
{{--    @error('email')--}}
{{--    <small class="form-text text-danger">{{$message}}</small>--}}
{{--    @enderror--}}
{{--  </div>--}}


{{--  <div class="mb-3">--}}
{{--    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.number phone')}}</label>--}}
{{--    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.number phone')}}" name="phone" value="{{$user->phone}}">--}}
{{--    @error('phone')--}}
{{--    <small class="form-text text-danger">{{$message}}</small>--}}
{{--    @enderror--}}
{{--  </div>--}}


{{--  <div class="mb-3">--}}
{{--    <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.password')}}</label>--}}
{{--    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.password')}}" name="password" value="{{$user->password}}">--}}
{{--    @error('password')--}}
{{--    <small class="form-text text-danger">{{$message}}</small>--}}
{{--    @enderror--}}
{{--  </div>--}}




{{--        <div class="mb-3">--}}
{{--          <label for="exampleFormControlInput1" class="form-label">{{__('views/user.name')}}</label>--}}
{{--          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.name')}}" name="name" value="{{$user->name}}">--}}
{{--          @error('name')--}}
{{--          <small class="form-text text-danger">{{$message}}</small>--}}
{{--          @enderror--}}
{{--        </div>--}}

    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>Module</th>
                <th>show</th>
                <th>Add</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbode>
            <tr>



                <td>المستخدمين</td>
                <td><input type="checkbox" value="enable" name="admin_show" @if ($user->admin_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="admin_add" @if ($user->admin_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="admin_edit" @if ($user->admin_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" @if ($user->admin_delete=='enable') checked @endif></td>
            </tr>
            <tr>
                <td>المحاضرات</td>
                <td><input type="checkbox" value="enable" name="lecture_show" @if ($user->lecture_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="lecture_add" @if ($user->lecture_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="lecture_edit" @if ($user->lecture_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="lecture_delete" @if ($user->lecture_delete=='enable') checked @endif></td>
            </tr>
            <tr>
                <td>الإعلانات</td>
                <td><input type="checkbox" value="enable" name="ad_show" @if ($user->ad_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="ad_add" @if ($user->ad_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="ad_edit" @if ($user->ad_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="ad_delete" @if ($user->ad_delete=='enable') checked @endif></td>
            </tr>
            <tr>
                <td>البرامج</td>
                <td><input type="checkbox" value="enable" name="program_show" @if ($user->program_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="program_add" @if ($user->program_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="program_edit" @if ($user->program_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="program_delete" @if ($user->program_delete=='enable') checked @endif></td>
            </tr>
            <tr>
                <td>العلامات</td>
                <td><input type="checkbox" value="enable" name="mark_show" @if ($user->mark_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="mark_add" @if ($user->mark_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="mark_edit" @if ($user->mark_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="mark_delete" @if ($user->mark_delete=='enable') checked @endif></td>
            </tr>
            <tr>
                <td>المواد</td>
                <td><input type="checkbox" value="enable" name="subject_show" @if ($user->subject_show=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="subject_add" @if ($user->subject_add=='enable') checked @endif></td>
                <td><input type="checkbox" value="enable" name="subject_edit" @if ($user->subject_edit=='enable') checked @endif></td>
                <td><input type="checkbox"  value="enable" name="subject_delete" @if ($user->subject_delete=='enable') checked @endif></td>
            </tr>
        </tbode>
    </table>
        <div >
            <button type="submit" class="btn btn-primary mb-3">{{__('views/user.edit')}}</button>
        </div>

    </form>
@endsection
