@extends('layout.layout')
@section('title')
{{__('views/post.advertisments')}}
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <h2>{{__('views/post.advertisments')}}</h2>
            <a href="{{ route('Advertisment.create') }}" class="user btn btn-info">{{__('views/post.add').' '.__('views/post.advertisment')}}</a>
        </thead>

{{-- search --}}

<form method="POST" action="{{route('Advertisment.search')}}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="q" id="q" class="form-control">
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
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{__('views/post.dept')}}</th>
                <th scope="col">{{__('views/post.year')}}</th>
                {{-- <th scope="col">{{__('views/post.subject')}}<+/th> --}}
                <th scope="col">{{__('views/post.title').' '.__('views/post.advertisment')}}</th>
                <th scope="col">{{__('views/post.description').' '.__('views/post.advertisment')}} </th>
                <th scope="col"> {{__('views/post.processes')}} </th>

            </tr>
        </thead>
        <tbody>


            @foreach ($allAdvertismentsPosts as $Advertisment)
            <tr>
                <td>{{$Advertisment->id}}</td>

                <td>
                    @foreach ($Advertisment->depts as $dept)

                    {{ $dept->name }}<br>
                    @endforeach

                </td>
                <td>

                    @foreach ($Advertisment->years as $year)
                    {{ $year->name }}<br>
                    @endforeach
                </td>

                {{-- <td>{{ $Advertisment->subject->name }}</td> --}}
                <td>{{ $Advertisment->title }}</td>
                <td>{{ $Advertisment->description }}</td>

                <td>
                    <a href="{{ route('Advertisment.edit', $Advertisment->id) }}" class="btn btn-success">{{__('views/post.edit')}}</a>
                    <a href="{{ route('Advertisment.delete', $Advertisment->id) }}" class="btn btn-danger">{{__('views/post.delete')}}</a>
                </td>

            @endforeach
        </tbody>
    </table>
</div>

@endsection
