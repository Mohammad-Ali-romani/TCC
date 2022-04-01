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