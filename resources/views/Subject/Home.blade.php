@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/subject.subjects')}}</h2>
       <a href="{{route('Subject.create')}}" class="user btn btn-info" >{{__('views/subject.subject add')}}</a>
    </thead>

    {{-- search --}}

    <form method="POST" action="{{route('User.search')}}" enctype="multipart/form-data">
      @csrf
      <input type="text" name="q" id="q" class="form-control">
      <button type="submit" class="btn btn-primary mt-2"> Search</button>

      <div class="form-check">
        <input class="form-check-input" type="radio" name="Active" value="1" @checked()>
        <label class="form-check-label" for="flexRadioDefault2">
          الفعالين
        </label>
      </div>

      

      <div class="form-check">
        <input class="form-check-input" type="radio" name="Active" value="0" @checked()>
        <label class="form-check-label" for="flexCheckDefault">
          الغير الفعالين
        </label>
      </div>

      <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.level')}} </label>
      <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level_id">
        <option value="" selected disabled hidden>Choose here</option>
        <option value="1" @selected()>Adminstrator </option>
        <option value="2" @selected()>Leader </option>
        <option value="3" @selected()>StudentBody </option>
        <option value="4" @selected()>Student </option>

   
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



