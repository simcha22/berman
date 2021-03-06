@extends('admin.template')
@section('admin-content')

<h1>הוסף עמוד חדש</h1>

<form class="clearfix" method="post" action="{{url('admin/pages')}}" >
    @csrf
    <div class="form-group">
        <label for="name">שם העמוד</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
    </div>
    <div class="form-group">
        <label for="content">תוכן</label>
        <textarea class="form-control" id="content" name="content" rows="10">{!!old('content')!!}</textarea>
    </div>
    <button type="submit" class="btn btn-primary float-right">הוסף</button>
</form>
@endsection
