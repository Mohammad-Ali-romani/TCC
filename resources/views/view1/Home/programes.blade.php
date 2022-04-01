@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>الاعلانات</h2>
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
            @foreach($allPrograms as $Program)
            <tr>

                <td>{{$Program->id}}</td>
                <td>{{$Program->dept}}</td>
                <td>{{$Program->year}}</td>
                <td>{{$Program->text}}</td>
                <td></td>



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

