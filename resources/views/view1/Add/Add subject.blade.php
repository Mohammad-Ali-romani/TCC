@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>إضافة مادة</h1>
<form method="POST" action="{{route('Subject.store')}}" enctype="multipart/form-data">
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
  <label for="exampleFormControlTextarea1" class="form-label">اسم المادة </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="1">برنامج الدوام</option>
    <option value="2"> برنامج المذاكرات</option>
    <option value="3"> برنامج الامتحان </option>
  </select>
  <div class="mb-3">
    <label for="formFile" class="form-label"> اختر ملف المادة</label>
    <input class="form-control" type="file" id="formFile">
  </div>

  <div >
    <button type="submit" class="btn btn-primary mb-3">إضافة</button>
  </div>
</form>
@endsection
