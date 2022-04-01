@extends('layout.layout')

@section('content')

<div class="mb-4">
    <h1>{{__('views/user.edit').' '.__('views/user.user')}} </h1>

    <form method="POST" action="{{route('User.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">{{__('views/user.name')}}</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.name')}}" name="name" value="{{$user->name}}">
          @error('name')
          <small class="form-text text-danger">{{$message}}</small>
          @enderror
        </div>


        <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.level')}} </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level">
    @foreach ($levels as $level )
      <option value="{{$level->id}}"
        @if ($user->level_id == $level->id)
          selected
        @endif
        >
        {{$level->name}} 
      </option>
    @endforeach   
  </select> 
  <br>


  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.status')}}</label><br>
    <input type="radio" class="" id="status"  name="status" value="1"
      @if ($user->status == 1)
        checked
      @endif
    >
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.active')}}</label>

    &emsp;&emsp;

    <input type="radio" class="" id="status"  name="status" value="0"
      @if ($user->status == 0)
        checked
      @endif
    >
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.not active')}} </label>
  </div>


  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label"> {{__('views/user.email')}}</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.email')}}" name="email" value="{{$user->email}}">
    @error('email')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>


  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.number phone')}}</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.number phone')}}" name="phone" value="{{$user->phone}}">
    @error('phone')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>


  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.password')}}</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.password')}}" name="password" value="{{$user->password}}">
    @error('password')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>


  <div >
    <button type="submit" class="btn btn-primary mb-3">{{__('views/user.edit')}}</button>
  </div>
</form>

@endsection
