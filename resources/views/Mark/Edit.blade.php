@extends('layout.layout')

@section('content')

    <div class="mb-4">
        <h1>{{__('views/post.edit').' '.__('views/post.mark')}}</h1>

        <form method="POST" action="{{ route('Mark.update', $mark->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <label for="dept" class="form-label f-1">{{__('views/post.dept')}} </label>
            <select class="form-control" name="dept">
                
                @foreach ($depts as $dept)                                 
                        <option value="{{$dept->id}}"
                            @if (old('dept') == null &&isset($mark_depts)&& $mark_depts->count()>0 &&$dept->id == $mark_depts[0]->id)
                                    selected
                            @elseif (old('dept') != null && old('dept') == $dept->id)   
                                    selected
                            @endif>
                              {{$dept->name}}
                            </option>      
                @endforeach
                </select>

                @error('dept')
                    <small class="form-text text-danger">{{$message}}</small>
                 @enderror

    @error('dept')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror

    <br.



    <label for="year" class="form-label">{{__('views/post.year')}} </label>
    <select class="form-control" name="year">
    @foreach ($years as $year)                                 
           <option value="{{$year->id}}"
            @if (old('year') == null && isset($mark_years) && $mark_years->count()>0 && $year->id == $mark_years[0]->id)
                     selected 
            @elseif (old('year') != null && old('year')== $year->id)                       
                    selected                         
            @endif>
              {{$year->name}}
            </option>
    @endforeach
    </select>
    @error('year')
         <small class="form-text text-danger">{{$message}}</small>
     @enderror
    <br>


    <label for="subject" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">       
                <div class="form-check">
                    @foreach ($subjects as $subject)                      
                        <option value="{{$subject->id}}"
                           
                        @if (old('subject') == null && $subject->id == $mark_subjects->id )
                                selected
                        @elseif (old('subject') != null && old('subject') == $subject->id)
                                selected
                        @endif>
                            {{$subject->name}}
                        </option>
                    @endforeach
                    </select>
             </div>
    

    




    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title').' '.__('views/post.mark')}}</label>
        <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title').' '.__('views/post.mark')}}" class="form-control"
            @if (old('title') == null)
                value="{{$mark->title}}"
            @elseif (old('title') != null)
                value="{{old('title')}}"
            @endif
        >
        @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
    </div>
    <br>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description').' '.__('views/post.mark')}}</label>
        <textarea name="description" cols="30" rows="8" class="form-control">
            @if (old('description') == null)
                 {{$mark->description}}
            @elseif (old('description') != null))
                {{old('description')}}
            @endif
           
        </textarea>
    </div>


    <br>

    <div class="mb-3">
        <label for="formFile" class="form-label">{{__('views/post.existing files')}}</label>
        <br>
        @foreach ($mark_urls as $urls )
        <a href={{asset($urls->url)}}>{{$urls->file_type}}</a>
        <button type="submit" class="btn btn-danger mb-3"><a href="{{route('delete.url',$urls->id)}}">×</a></button>
        <br>       
        {{-- <label for="formFile" class="form-label">{{$urls->file_type}}</label> --}}
        @endforeach

        <br>
        <label for="formFile" class="form-label">{{__('views/post.choose file')}} </label>
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
