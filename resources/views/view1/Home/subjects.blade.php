@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>المواد</h2>
       <a href="{{route('Subject.create')}}" class="user btn btn-info" >إضافة مادة</a>
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
          <th scope="col">نص الاعلان</th>
          <th scope="col"> خصائص </th>

        </tr>
      </thead>
      <tbody>
        <tr>
            @foreach($allSubjects as $Subject)
            <tr>

                <td>{{$Subject->id}}</td>
                <td>{{$Subject->dept}}</td>
                <td>{{$Subject->year}}</td>
                <td>{{$Subject->text}}</td>
                <td></td>



          <td><a href="{{route('Subject.edit',$Subject->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('Subject.delete',$Subject->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection


@endsection

