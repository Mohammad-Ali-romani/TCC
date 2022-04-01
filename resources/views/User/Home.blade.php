@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>{{__('views/user.users')}}</h2>
       <a href="{{route('User.create')}}" class="user btn btn-info" >{{__('views/user.add').' '.__('views/user.user')}}</a>
    </thead>

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

