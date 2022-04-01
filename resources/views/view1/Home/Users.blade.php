@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>المستخدمين</h2>
       <a href="{{route('User.create')}}" class="user btn btn-info" >إضافة مستخدم</a>
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
            @foreach($allUsers as $User)
            <tr>

                <td>{{$User->id}}</td>
                <td>{{$User->dept}}</td>
                <td>{{$User->year}}</td>
                <td>{{$User->text}}</td>
                <td></td>



          <td><a href="{{route('User.edit',$User->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('User.delete',$User->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

