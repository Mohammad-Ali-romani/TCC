@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>{{__('views/subject.subject add')}}</h1>
<form method="POST" action="{{route('Subject.store')}}" enctype="multipart/form-data">
        @csrf


  <label for="exampleFormControlTextarea1" class="form-label">{{__('views/subject.subject name')}}</label>
  <input type="text" name="name" cols="30" rows="8" placeholder="{{__('views/subject.subject name')}}" class="form-control">
  @error('name')
  <small class="form-text text-danger">{{$message}}</small>
  @enderror
  <br><br>
  
        
  <label for="exampleFormControlTextarea1" class="form-label">{{__('views/subject.dept')}} </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='dept'>   
    @foreach ($depts as $dept )
    <option value="{{$dept->id}}">{{$dept->name}} </option>
    @endforeach  
  </select>
  <br><br>


  <label for="exampleFormControlTextarea1" class="form-label">{{__('views/subject.year')}} </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name='year'>
    @foreach ($years as $year )
    <option value="{{$year->id}}">{{$year->name}} </option>
    @endforeach  
    
  </select>
  <br><br>

 

  <div >
    <button type="submit" class="btn btn-primary mb-3">{{__('views/subject.add')}}</button>
  </div>
</form>
@endsection
