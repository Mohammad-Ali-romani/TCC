@extends('layout.layout')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <h2>{{__('views/subject.subjects')}}</h2>
            <a href="{{route('Subject.create')}}" class="user btn btn-info" >{{__('views/subject.subject add')}}</a>
            </thead>

            {{-- search --}}

            <form method="POST" action="{{route('Subject.search')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="q" id="q" class="form-control" value="{{old('q')}}">
                <button type="submit" class="btn btn-primary mt-2"> Search</button>

                <br>
                <label for="exampleFormControlTextarea1" class="form-label">Dept </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dept">
                    {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                    <option value="1" @selected()>Software Engineering</option>
                    <option value="2" @selected()>Computer Engineering </option>
                    <option value="3" @selected()>Network Engineering </option>


                </select>


            </form>

            @if( session('status'))
                <div class="alert alert-info">
                    {{ session('status')}}
                </div>
            @endif
            {{-- search --}}

        </table>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('views/subject.subject name')}}</th>
                <th scope="col">{{__('views/subject.dept')}}</th>
                <th scope="col">{{__('views/subject.year')}}</th>
                <th scope="col">{{__('views/subject.processes')}}</th>

            </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($search as $subject)
                <tr>

                    <td>{{$subject->id}}</td>
                    <td>{{$subject->name}}</td>



                    <td>
                        {{$subject->dept->name}}
                    </td>
                    <td>
                        {{$subject->year->name}}
                    </td>




                    <td><a href="{{route('Subject.edit',$subject->id)}}" class="btn btn-success">{{__('views/subject.edit')}}</a>

                        <a href="{{route('Subject.delete',$subject->id)}}" class="btn btn-danger">{{__('views/subject.delete')}}</a></td>

                    </td>
            @endforeach
            </tbody>
        </table>
    </div>
    </main>
    </div>
    </div>

@endsection



