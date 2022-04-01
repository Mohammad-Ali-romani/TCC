@extends('layout.layout')

@section('content')

<div class="mb-4">
    <h1>{{__('views/subject.subject edit')}}</h1>

    <form method="POST" action="{{route('Subject.update',$subject->id)}}" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">{{__('views/subject.subject name')}}</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{__('views/subject.subject name')}}" value="{{$subject->name}}" name="name">
        </div>
        @error('name')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
        <br><br>


        <label for="exampleFormControlTextarea1" class="form-label">{{__('views/subject.dept')}}</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dept"> 
        
          @foreach ($depts as $dept )
             <option value="{{$dept->id}}"   
                  @if($dept->id == $subject->dept_id)  
                  selected 
                @endif >
              {{$dept->name}}  
            </option>
          @endforeach
          
        </select>
        <br><br>


        <label for="exampleFormControlTextarea1" class="form-label">{{__('views/subject.year')}}</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="year">
        
          @foreach ($years as $year)
            <option value="{{$year->id}}" @if($year->id == $subject->year_id)  
                selected
              @endif > 
              {{$year->name}}
            </option>

         @endforeach
        </select>
        <br><br>


        <div >
          <button type="submit" class="btn btn-primary mb-3">{{__('views/subject.edit')}}</button>
        </div>
</form>

@endsection
