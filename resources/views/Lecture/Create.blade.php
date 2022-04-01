@extends('layout.layout')

@section('content')
    <div class="mb-4">
        <h1>{{__('views/post.add').' '.__('views/post.lecture')}}</h1>
        <form method="POST" action="{{ route('Lecture.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="dept" class="form-label f-1">{{__('views/post.dept')}} </label>
            <select class="form-control" name="dept">
                @foreach ($depts as $dept)                                 
                        <option value="{{$dept->id}}"
                            @if (old('dept')==$dept->id)
                                selected
                            @endif>
                            {{$dept->name}}
                        </option>
                @endforeach
                </select>
            <br>
            <label for="dept" class="form-label">{{__('views/post.year')}} </label>
            <select class="form-control" name="year">
            @foreach ($years as $year)                                 
                    <option value="{{$year->id}}"
                        @if (old('year')==$year->id)
                            selected
                        @endif>
                        {{$year->name}}
                    </option>
            @endforeach
            </select>
            <br>

            <label for="dept" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">
            @foreach ($subjects as $subject)
                <div class="form-check">
                    
                    <option value="{{$subject->id}}"
                        @if (old('subject')== $subject->id)
                            selected
                        @endif>
                        {{$subject->name}}
                    </option>
                    
                </div>
            @endforeach
                <option value="null">   </option>
            </select>
            <br>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title').' '.__('views/post.lecture')}}</label>
                <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title').' '.__('views/post.lecture')}}" class="form-control" value="{{old('title')}}">
                @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            

            {{-- <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description').' '.__('views/post.lecture')}}</label>
                <textarea name="description" cols="30" rows="8" placeholder="{{__('views/post.description').' '.__('views/post.lecture')}}" class="form-control"></textarea>
            </div> --}}

            <br>

            <div class="mb-3">
                <label for="formFile" class="form-label"> {{__('views/post.choose file')}} </label>
                <input class="form-control" type="file" id="formFile" name="file">
                @error('file')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
            </div>
            <br>
            
            <div>
                <button type="submit" class="btn btn-primary mb-3">{{__('views/post.add')}}</button>
            </div>

        </form>
    </div>
@endsection
