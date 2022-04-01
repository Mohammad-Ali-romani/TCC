@extends('layout.layout')

@section('content')
<div class="mb-4">
    <h1>إضافة مستخدم</h1>
<form method="POST" action="{{route('User.store')}}" enctype="multipart/form-data">
        @csrf
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">الاسم</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="الاسم">
  </div>
  <label for="exampleFormControlTextarea1" class="form-label">النوع </label>
  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
    <option value="1">مدير</option>
    <option value="2">رئيس قسم</option>
    <option value="3">هيئة </option>
  </select>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">البريد الالكتروني</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="البريد الالكتروني">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">كلمة السر</label>
    <input type="password" class="form-control" id="exampleFormControlInput1" placeholder="كلمة السر">
  </div>
  <div >
    <button type="submit" class="btn btn-primary mb-3">إضافة</button>
  </div>

</div>
</form>
</div>

@endsection

