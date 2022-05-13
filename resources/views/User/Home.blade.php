@extends('layout.layout')

@section('content')


<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/user.users')}}</h2>
       <a href="{{route('User.create')}}" class="user btn btn-info" >{{__('views/user.add').' '.__('views/user.user')}}</a>
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
          <th scope="col">{{__('views/user.name')}}</th>
          <th scope="col">{{__('views/user.email')}}</th>
          <th scope="col"> {{__('views/user.number phone')}}</th>
          <th scope="col"> {{__('views/user.level')}} </th>
          <th scope="col"> {{__('views/user.status')}} </th>
          <th scope="col"> {{__('views/user.processes')}} </th>

        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($allUsers as $User)
            <tr>

                <td>{{$User->id}}</td>
                <td>{{$User->name}}</td>
                <td>{{$User->email}}</td>
                <td>{{$User->phone}}</td>
                <td>{{$User->level->name}}</td>
                <td>{{$User->status  }}</td>


          <td>
            {{-- <a href="{{route('User.edit',$User->id)}}" class="btn btn-success">{{__('views/user.edit')}}</a> --}}
            <a href="{{route('User.delete',$User->id)}}" class="btn btn-danger">{{__('views/user.delete')}}</a>

            @if ($User->status == __('messages.active'))
            <a href="{{route('User.unactivate',$User->id)}}" class="btn btn-dark">{{__('views/user.unactivate')}}</a>
            @else
            <a href="{{route('User.activate',$User->id)}}" class="btn btn-success">{{__('views/user.activate')}}</a>
            @endif


          </td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

