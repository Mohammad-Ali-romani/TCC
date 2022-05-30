@extends('layout.layout')

@section('content')

<div class="mb-4">
    <h1>{{__('views/user.edit').' '.__('views/user.user')}} </h1>

    @if( session('success'))
        <div class="alert alert-info">
            {{ session('success')}}
        </div>
    @endif
    <form method="POST" action="{{route('AdminGroup.update',$user->id)}}" enctype="multipart/form-data">
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




        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">{{__('views/user.name')}}</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.name')}}" name="name" value="{{$user->name}}">
          @error('name')
          <small class="form-text text-danger">{{$message}}</small>
          @enderror
        </div>

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
                <td><input type="checkbox" value="enable" name="admin_show" {{old('admin_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('admin_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('admin_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('admin_delete')?'checked':''}}></td>
            </tr>
            <tr>
                <td>المحاضرات</td>
                <td><input type="checkbox" value="enable" name="admin_show" {{old('lecture_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('lecture_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('lecture_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('lecture_delete')?'checked':''}}></td>
            </tr>
            <tr>
                <td>الإعلانات</td>
                <td><input type="checkbox" value="enable" name="admin_show" {{old('ad_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('ad_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('ad_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('ad_delete')?'checked':''}}></td>
            </tr>
            <tr>
                <td>البرامج</td>
                <td><input type="checkbox" value="enable" name="admin_show" {{old('program_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('program_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('program_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('program_delete')?'checked':''}}></td>
            </tr>
            <tr>
                <td>العلامات</td>
                <td><input type="checkbox" value="enable" name="admin_show" {{old('mark_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('mark_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('mark_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('mark_delete')?'checked':''}}></td>
            </tr>
            <tr>
                <td>المواد</td>
                <td><input type="checkbox" value="enable" name="admin_show" {{old('subject_show')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_add" {{old('subject_add')?'checked':''}}></td>
                <td><input type="checkbox" value="enable" name="admin_edit" {{old('subject_edit')?'checked':''}}></td>
                <td><input type="checkbox"  value="enable" name="admin_delete" {{old('subject_delete')?'checked':''}}></td>
            </tr>
        </tbode>
    </table>
        <div >
            <button type="submit" class="btn btn-primary mb-3">{{__('views/user.edit')}}</button>
        </div>

    </form>
@endsection
