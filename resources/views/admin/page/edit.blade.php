@extends('admin.template')
@section('admin-content')

<h1>ערוך קטגוריה</h1>

<form class="clearfix" method="post" action="{{url('admin/categories/'.$category->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">שם הקטגוריה</label>
        <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{$category->slug}}">
    </div>



    <div class="form-group">
        <img class="admin-thumbnail" src="{{asset('storage/'. $category->image)}}">
        <label for="image">הוסף תמונה</label>
        <input type="file" class="form-control-file" id="image" name="image">
    <p>אם אינך רוצה להחליף תמונה אנא השאר שדה זה ריק</p>
    </div>
    <button type="submit" class="btn btn-primary float-right">הוסף קטגוריה</button>
</form>
@endsection
