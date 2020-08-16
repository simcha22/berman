@extends('admin.template')
@section('admin-content')

<h1>הוסף קטגוריה חדשה</h1>

<form class="clearfix" method="post" action="{{url('admin/categories')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">שם הקטגוריה</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" >
    </div>
    <div class="form-group">
        <label for="image">הוסף תמונה</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary float-right">הוסף קטגוריה</button>
</form>
@endsection
