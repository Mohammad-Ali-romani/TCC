@extends('layout.layout')

@section('content')
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <h2>{{__('views/post.marks')}}</h2>
            <a href="{{route('Mark.create')}}"
               class="user btn btn-info">{{__('views/post.add').' '.__('views/post.mark')}}</a>
            </thead>

            {{-- search --}}

            <form method="POST" action="{{route('Mark.search')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="q" id="q" class="form-control">
                <button type="submit" class="btn btn-primary mt-2"> Search</button>

                <br>
                <label for="exampleFormControlTextarea1" class="form-label">Dept </label>
                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dept">
                    {{-- <option value="" selected disabled hidden>Choose here</option> --}}
                    <option value="1" @selected()>Software Engineering</option>
                    <option value="2" @selected()>Computer Engineering</option>
                    <option value="3" @selected()>Network Engineering</option>


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
                <th scope="col">{{__('views/post.dept')}}</th>
                <th scope="col">{{__('views/post.year')}}</th>
                <th scope="col">{{__('views/post.subject')}}</th>
                <th scope="col">{{__('views/post.title').' '.__('views/post.mark')}}</th>
                <th scope="col">{{__('views/post.description').' '.__('views/post.mark')}}</th>
                <th scope="col">{{__('views/post.urls')}}</th>
                <th scope="col"> {{__('views/post.processes')}} </th>

            </tr>
            </thead>
            <tbody>
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
                    <x-field :post="$Mark"/>
                    <td><a href="{{route('Mark.edit',$Mark->id)}}" class="btn btn-success">{{__('views/post.edit')}}</a>
                        <a href="{{route('Mark.delete',$Mark->id)}}"
                           class="btn btn-danger">{{__('views/post.delete')}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </main>
    </div>
    </div>

@endsection

