@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/subject.subjects')}}</h2>
       <a href="{{route('Subject.create')}}" class="user btn btn-info" >{{__('views/subject.subject add')}}</a>
    </thead>

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
            @foreach($allSubjects as $subject)
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



