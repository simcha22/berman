@extends('admin.template')
@section('admin-content')

    <h1>ערוך עמוד</h1>

    <form class="clearfix" method="post" action="{{url('admin/pages/'. $page->id)}}" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">שם העמוד</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name', $page->name)}}">
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug', $page->slug)}}">
        </div>
        <div class="form-group">
            <label for="content">תוכן</label>
            <textarea class="form-control" id="content" name="content" rows="10">{!!old('content', $page->content)!!}</textarea>
        </div>
        <button type="submit" class="btn btn-primary float-right">עדכן עמוד</button>
    </form>
@endsection
