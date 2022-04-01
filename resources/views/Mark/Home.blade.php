@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/post.marks')}}</h2>
       <a href="{{route('Mark.create')}}" class="user btn btn-info" >{{__('views/post.add').' '.__('views/post.mark')}}</a>
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
          <th scope="col">{{__('views/post.title').' '.__('views/post.mark')}}</th>
          <th scope="col">{{__('views/post.description').' '.__('views/post.mark')}}</th>
          <th scope="col"> {{__('views/post.processes')}} </th>

        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($allMarksPosts as $Mark)
            <tr>

                <td>{{$Mark->id}}</td>

                <td>
                 
                  @foreach ($Mark->depts as $dept)

                  {{ $dept->name  }}<br>


                  @endforeach
                
              </td>
              <td>
                 
                  @foreach ($Mark->years as $year)
                  {{ $year->name }}<br>
                  @endforeach
        
              </td>
                
                <td>{{$Mark->subject->name}}</td>
                <td>{{$Mark->title}}</td>
                <td>{{$Mark->description}}</td>
                <td></td>



          <td><a href="{{route('Mark.edit',$Mark->id)}}" class="btn btn-success">{{__('views/post.edit')}}</a>

            <a href="{{route('Mark.delete',$Mark->id)}}" class="btn btn-danger">{{__('views/post.delete')}}</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

