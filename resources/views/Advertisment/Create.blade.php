@extends('layout.layout')

@section('content')
    <div class="mb-4">
        <h1>{{__('views/post.add').' '.__('views/post.advertisment')}}</h1>
        <form method="POST" action="{{ route('Advertisment.store') }}" enctype="multipart/form-data">
            @csrf
            <label for="dept" class="form-label f-1">{{__('views/post.dept')}}</label>
            @foreach ($depts as $dept)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value={{ $dept->id}} name="depts[]"
                    @if (old('depts')!=null )
                        @foreach (old('depts') as $oldDepts)
                            @if ($oldDepts ==$dept->id)
                                checked
                            @endif
                        @endforeach
                    @endif
                    >
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $dept->name }}
                    </label>
                </div>
            @endforeach
            <br>
            <label for="dept" class="form-label">{{__('views/post.year')}}</label>
            @foreach ($years as $year)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value={{ $year->id }} name="years[]" 
                    @if (old('years')!=null)
                        @foreach (old('years') as $oldYears)
                            @if ($oldYears ==$year->id)
                                checked
                            @endif
                        @endforeach
                    @endif>
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $year->name }}
                    </label>
                </div>
            @endforeach
            <br>

            {{-- <label for="dept" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">
            @foreach ($subjects as $subject)
                <div class="form-check">
                    
                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                    
                </div>
            @endforeach
                <option value="null">  </option>
            </select>
            <br> --}}

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title')}}</label>
                <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title')}}" class="form-control" value="{{old('title')}}">
                @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <br>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description')}}</label>
                <textarea name="description" cols="30" rows="8" placeholder="{{__('views/post.description')}}" class="form-control">{{old('description')}}</textarea>
            </div>

            <br>

            <div class="mb-3">
                <label for="formFile" class="form-label"> {{__('views/post.choose file')}}</label>
                <input class="form-control" type="file" id="formFile" name="file" >
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
