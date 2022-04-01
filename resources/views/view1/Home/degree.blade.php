@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>العلامات</h2>
       <a href="{{route('Advertisment.create')}}" class="user btn btn-info" >إضافة علامة</a>
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
            @foreach($allMarks as $Mark)
            <tr>

                <td>{{$Mark->id}}</td>
                <td>{{$Mark->dept}}</td>
                <td>{{$Mark->year}}</td>
                <td>{{$Mark->text}}</td>
                <td></td>



          <td><a href="{{route('Mark.edit',$Mark->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('Mark.delete',$Mark->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

