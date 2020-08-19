@extends('admin.template')
@section('admin-content')

<h1>הוסף מוצר חדש</h1>
@if($categories->isEmpty())
    <h2>אנא הוסף קטגוריות לפני שהנך מוסיף מוצרים
        <a href="{{url('admin/categories/create')}}">הוסף קטגוריה</a>
    </h2>
@else
<form class="clearfix" method="post" action="{{url('admin/products')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">שם המוצר</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
    </div>
    <div class="form-group">
        <label for="category">קטגוריות</label>
    <select class="form-control" id="category" name="category">
        <option value="0">בחר קטגוריה</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == old('category')? 'selected': ''}}>{{$category->name}}</option>
        @endforeach
    </select>
    </div>
    <div class="form-group">
        <label for="price">מחיר המוצר</label>
        <input type="number" step="" class="form-control" id="price" name="price" value="{{old('price')}}">
    </div><div class="form-group">
        <label for="description">הוספת תיאור למוצר</label>
        <textarea type="text" class="form-control" id="description" name="description" rows="6">{{old('description')}}</textarea>
    </div>
    <div class="form-group">
        <label for="image">הוסף תמונה למוצר</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary float-right">הוסף מוצר</button>
</form>
@endif
@endsection
