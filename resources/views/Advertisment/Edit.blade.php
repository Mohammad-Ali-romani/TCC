@extends('layout.layout')

@section('content')

    <div class="mb-4">
        <h1>{{__('views/post.edit').' '.__('views/post.advertisment')}}</h1>

        <form method="POST" action="{{ route('Advertisment.update', $advertisment->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            @foreach ($depts as $dept)
                <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="{{ $dept->id }}" name="depts[]"
            @if (old('depts')==null )        
                @foreach ($advertisment_depts as $ad_dept)
                        @if ($ad_dept->id == $dept->id)
                            checked
                        @endif        
                @endforeach
            @elseif (old('depts')!=null)           
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
    @error('depts')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror



    <label for="dept" class="form-label">{{__('views/post.year')}} </label>

    @foreach ($years as $year)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $year->id }}" name="years[]" 
            @if (old('years') == null)
                @foreach ($advertisment_years as $ad_year)
                    @if ($ad_year->id == $year->id)
                        checked
                    @endif           
                @endforeach
            @elseif (old('years') != null)
                @foreach (old('years') as $oldYears)
                    @if ($oldYears ==$year->id)
                        checked
                    @endif
                @endforeach
            @endif
    >
    <label class="form-check-label" for="defaultCheck1">
        {{ $year->name }}
    </label>
    </div>
    @endforeach

    @error('years')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror

    <br>

    {{-- <label for="subject" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">       
                <div class="form-check">
                    @foreach ($subjects as $subject)
                            
                        <option value="{{$subject->id}}" @if ($subject->id == $advertisment_subjects->id)
                                selected
                        @endif>

                            {{$subject->name}}

                        </option>
                            
                        
                    @endforeach
                    </select>
             </div> --}}
    

    




    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title')}}</label>
        <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title')}}" class="form-control"  
        @if (old('title')!=null)
            value="{{old('title')}}"
        @else
             value="{{$advertisment->title}}"
        @endif>
        
        @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
    </div>
    <br>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description')}}</label>
        <textarea name="description" cols="30" rows="8" placeholder="{{__('views/post.description')}}" class="form-control">
            @if (old('description') != null)
                {{old('description')}}
            @else
                {{$advertisment->description}}
            @endif
        </textarea>
    </div>


    <br>

    <div class="mb-3">
        <label for="formFile" class="form-label">{{__('views/post.existing files')}}</label><br>
        @foreach ($advertisment_urls as $urls )
        <a href={{asset($urls->url)}}>{{$urls->file_type}}</a>
        <button type="submit" class="btn btn-danger mb-3"><a href="{{route('delete.url',$urls->id)}}">×</a></button>
        <br>
        {{-- <label for="formFile" class="form-label">{{$urls->file_type}}</label> --}}
        @endforeach
        <br><br>
        <label for="formFile" class="form-label">{{__('views/post.add new file')}}</label>
        <input class="form-control" type="file" id="formFile" name="file">
        @error('file')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-3">{{__('views/post.edit')}}</button>
    </div>
    </form>

@endsection
