@extends('layout.layout')

@section('content')



            <h2>{{__('views/user.users')}}</h2>
            <a href="{{route('User.create')}}"
               class="user btn btn-info">{{__('views/user.add').' '.__('views/user.user')}}</a>
             search
            <form method="get" action="{{route('User.search')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="q" id="q" class="form-control" value="{{old('q')}}" >
                <button type="submit" class="btn btn-primary mt-2"> Search</button>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Active" value="1" {{ (old('Active')=="1")? "checked" : "" }} @checked()>
                    <label class="form-check-label" for="flexRadioDefault2">
                        الفعالين
                    </label>
                </div>


                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Active" value="0" {{ (old('Active')=="0")? "checked" : "" }} @checked()>
                    <label class="form-check-label" for="flexCheckDefault">
                        الغير الفعالين
                    </label>
                </div>

                <label for="exampleFormControlTextarea1" class="form-label">{{__('views/user.level')}} </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="level_id">
                    <option value="" selected disabled hidden>Choose here</option>
                    <option value="1" {{ (old('level_id')=="1")? "selected" : "" }} @selected()>Adminstrator</option>
                    <option value="2" {{ (old('level_id')=="2")? "selected" : "" }} @selected()>Leader</option>
                    <option value="3" {{ (old('level_id')=="3")? "selected" : "" }} @selected()>StudentBody</option>
                    <option value="4" {{ (old('level_id')=="4")? "selected" : "" }} @selected()>Student</option>


                </select>


            </form>

            @if( session('status'))
                <div class="alert alert-info">
                    {{ session('status')}}
                </div>
            @endif
             search

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

                @foreach($allUsers as $User)
                    <tr>

                    <td>{{$User->id}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    <td>{{$User->phone}}</td>
                    <td>{{$User->level->name}}</td>
                    <td>  @if ($User->status)
                            <span
                               class="badge bg-danger">{{__('views/user.unactivate')}}</span>
                        @else
                            <span href="{{route('User.activate',[$User->id,1])}}"
                               class="badge bg-success">{{__('views/user.activate')}}</span>
                        @endif</td>


                    <td>
                         <a href="{{route('User.edit',$User->id)}}" class="btn btn-success">{{__('views/user.edit')}}</a>
                        <a href="{{route('User.delete',$User->id)}}"
                           class="btn btn-danger">{{__('views/user.delete')}}</a>

                        @if ($User->status)
                            <a href="{{route('User.activate',[$User->id,0])}}"
                               class="btn btn-dark">{{__('views/user.unactivate')}}</a>
                        @else
                            <a href="{{route('User.activate',[$User->id,1])}}"
                               class="btn btn-success">{{__('views/user.activate')}}</a>
                        @endif


                    </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection

