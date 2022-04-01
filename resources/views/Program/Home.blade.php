@extends('layout.layout')
@section('title')
البرامج
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>البرامج</h2>
       <a href="{{route('Program.create')}}" class="user btn btn-info" >أضافة برنامج</a>
    </thead>

    </table>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">القسم</th>
          <th scope="col">السنة</th>
          <th scope="col">المواد</th>
          <th scope="col">عنوان البرنامج</th>
          <th scope="col">تفاصيل البرنامج</th>
          
          <th scope="col"> خصائص </th>

        </tr>
      </thead>
      <tbody>
          
         @foreach ($allProgramsPosts as $Program)
        <tr>        
            
                <td>{{$Program->id}}</td>

                <td>
                 
                                @foreach ($Program->depts as $dept)

                                    {{ $dept->name}}<br>
                                @endforeach
                   
                </td>
                
                <td>
                  
                  @foreach ($Program->years as $year)
                      {{ $year->name }}<br>
                  @endforeach
            
                </td>
                <td>
                @if ($Program->subject != null)
                  {{$Program->subject->name}}
                @endif                 
                </td>
                <td>{{$Program->title}}</td>
                <td>{{$Program->description}}</td>

          <td><a href="{{route('Program.edit',$Program->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('Program.delete',$Program->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

