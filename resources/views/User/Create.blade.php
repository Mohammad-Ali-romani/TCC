@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>{{__('views/user.add').' '.__('views/user.user')}}</h1>
<form method="POST" action="{{route('User.store')}}" enctype="multipart/form-data">
        @csrf
  </div>
 {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.name')}}</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.name')}}" name="name">
    @error('name')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div> --}}


  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.email')}}</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.email')}}" name="email" value="{{ old('email') }}">
    @error('email')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>

  {{-- <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.number phone')}}</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.number phone')}}" name="phone">
    @error('phone')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div> --}}

  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.password')}} </label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/user.password')}}" name="password" value="{{old('password')}}">
    @error('password')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
  </div>

  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.status')}}</label><br>
    <input type="radio" class="" id="status"  name="status" value="1" @if ( old('status') == 1)  checked    @endif>
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.active')}}</label>
    &emsp;&emsp;
    <input type="radio" class="" id="status"  name="status" value="0" @if ( old('status') == 0)  checked   @endif>
    <label for="exampleFormControlInput1" class="form-label">{{__('views/user.not active')}}</label>
  </div>



  <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.level')}} </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level_id">
    @foreach ($levels as $level )
      <option value="{{$level->id}}" @if (old('level_id') == $level->id )  selected   @endif>{{$level->name}} </option>
    @endforeach
  </select>
  <br>

  <div >
    <button type="submit" class="btn btn-primary mb-3">{{__('views/user.add')}}</button>
  </div>


</div>
</form>
</div>

@endsection

