@extends('admin.template')
@section('admin-content')

    <h1>עדכן מוצר</h1>
        <form class="clearfix" method="post" action="{{url('admin/products/'.$product->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">שם המוצר</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $product->name)}}">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $product->slug)}}">
            </div>
            <div class="form-group">
                <label for="category">קטגוריות</label>
                <select class="form-control" id="category" name="category">
                    <option value="0">בחר קטגוריה</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{$category->id == old('category', $product->category_id)? 'selected': ''}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">מחיר המוצר</label>
                <input type="number" step="" class="form-control" id="price" name="price" value="{{old('price', $product->price)}}">
            </div><div class="form-group">
                <label for="description">הוספת תיאור למוצר</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="6">{{old('description', $product->description)}}</textarea>
            </div>
            <div class="form-group">
                <img class="admin-thumbnail" src="{{asset('storage/'. $product->image)}}">
                <label for="image">הוסף תמונה</label>
                <input type="file" class="form-control-file" id="image" name="image">
                <p>אם אינך רוצה להחליף תמונה אנא השאר שדה זה ריק</p>
            </div>
            <button type="submit" class="btn btn-primary float-right">הוסף מוצר</button>
        </form>
@endsection

