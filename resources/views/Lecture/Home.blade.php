@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/post.lectures')}}</h2>
       <a href="{{route('Lecture.create')}}" class="user btn btn-info" >{{__('views/post.add').' '.__('views/post.lecture')}} </a>
    </thead>

    </table>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">{{__('views/post.dept')}}</th>
          <th scope="col">{{__('views/post.year')}}</th>
          <th scope="col">{{__('views/post.subject')}}</th>
          <th scope="col">{{__('views/post.title').' '.__('views/post.lecture')}}</th>
          <th scope="col">{{__('views/post.description').' '.__('views/post.lecture')}}</th>
          <th scope="col"> {{__('views/post.processes')}} </th>

        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($allLecturesPosts as $Lecture)
            <tr>

                <td>{{$Lecture->id}}</td>

                <td>
                  
                  @foreach ($Lecture->depts as $dept)

                  {{ $dept->name }}<br>
                  @endforeach

              </td>
              <td>
                 
                  @foreach ($Lecture->years as $year)
                  {{ $year->name }}<br>
                  @endforeach
                 
              </td>

                <td>{{$Lecture->subject->name}}</td>
                <td>{{$Lecture->title}}</td>
                <td>{{$Lecture->description}}</td>



          <td><a href="{{route('Lecture.edit',$Lecture->id)}}" class="btn btn-success">{{__('views/post.edit')}}</a>

            <a href="{{route('Lecture.delete',$Lecture->id)}}" class="btn btn-danger">{{__('views/post.delete')}}</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

