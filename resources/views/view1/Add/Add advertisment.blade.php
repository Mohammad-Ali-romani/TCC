@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>إضافة إعلان</h1>


    <form method="POST" action="{{route('Advertisment.store')}}" enctype="multipart/form-data">
        @csrf

  <label for="exampleFormControlTextarea1" class="form-label" >القسم </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="dept">
    <option value="1">هندسة شبكات</option>
    <option value="2">هندسة برمجيات</option>
    <option value="3">هندسة حواسيب </option>
  </select>
  <label for="exampleFormControlTextarea1" class="form-label">السنة </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="year">
    <option value="1">السنة الاولى</option>
    <option value="2">السنة الثانية</option>
  </select>
  <div class="mb-3">
    <label for="formFile" class="form-label" > إختر الملف</label>
    <input class="form-control" type="file" id="formFile" name="file">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">النص</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="النص" name="text">
  </div>

  <div >
    <button type="submit" class="btn btn-primary mb-3">إضافة</button>
  </div>

</form>
</div>
@endsection
