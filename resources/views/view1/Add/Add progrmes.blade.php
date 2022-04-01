@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>إضافة برنامج</h1>
<form method="POST" action="{{route('Program.store')}}" enctype="multipart/form-data">
        @csrf
  <label for="exampleFormControlTextarea1" class="form-label">القسم </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="1">هندسة شبكات</option>
    <option value="2">هندسة برمجيات</option>
    <option value="3">هندسة حواسيب </option>
  </select>
  <label for="exampleFormControlTextarea1" class="form-label">السنة </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="1">السنة الاولى</option>
    <option value="2">السنة الثانية</option>
  </select>
  <div class="mb-3">
    <label for="formFile" class="form-label"> اختر ملف البرنامج</label>
    <input class="form-control" type="file" id="formFile">
  </div>
  <label for="exampleFormControlTextarea1" class="form-label">النوع </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="1">برنامج الدوام</option>
    <option value="2"> برنامج المذاكرات</option>
    <option value="3"> برنامج الامتحان </option>
  </select>
  <div >
    <button type="submit" class="btn btn-primary mb-3">إضافة</button>
  </div>
</form>
@endsection

