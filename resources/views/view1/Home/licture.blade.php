@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>المحاضرات</h2>
       <a href="{{route('Lecture.create')}}" class="user btn btn-info" >إضافة محاضرة</a>
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
          <th scope="col">نص العلامة</th>
          <th scope="col"> خصائص </th>

        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($allLectures as $Lecture)
            <tr>

                <td>{{$Lecture->id}}</td>
                <td>{{$Lecture->dept}}</td>
                <td>{{$Lecture->year}}</td>
                <td>{{$Lecture->text}}</td>
                <td></td>



          <td><a href="{{route('Lecture.edit',$Mark->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('Lecture.delete',$Mark->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

