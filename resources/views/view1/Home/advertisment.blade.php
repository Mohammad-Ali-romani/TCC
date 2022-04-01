@extends('layout.layout')

@section('content')
<div class="table-responsive">
    <table class="table table-striped table-sm">
     <thead>
      <h2>الاعلانات</h2>
       <a href="{{route('Advertisment.create')}}" class="user btn btn-info" >إضافة اعلان</a>
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
            @foreach($allAdvertisments as $Advertisment)
            <tr>

                <td>{{$Advertisment->id}}</td>
                <td>{{$Advertisment->dept}}</td>
                <td>{{$Advertisment->year}}</td>
                <td>{{$Advertisment->text}}</td>
                <td></td>



          <td><a href="{{route('Advertisment.edit',$Advertisment->id)}}" class="btn btn-success">تعديل</a>

            <a href="{{route('Advertisment.delete',$Advertisment->id)}}" class="btn btn-danger">حذف</a></td>

    </td>
    @endforeach
      </tbody>
    </table>
  </div>
</main>
</div>
</div>

@endsection

