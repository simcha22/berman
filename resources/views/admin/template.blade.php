@extends('template')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="nav flex-column nav-pills">
            <a class="nav-link active" href="{{url('admin')}}">כניסה</a>
            <a class="nav-link" href="{{url('admin/orders')}}">הזמנות</a>
            <a class="nav-link" href="{{url('admin/categories')}}">קטגוריות</a>
            <a class="nav-link" href="{{url('admin/products')}}">מוצרים</a>
            <a class="nav-link" href="{{url('admin/users')}}">משתמשים</a>
            <a class="nav-link" href="{{url('admin/pages')}}">עמודים</a>
        </div>
    </div>
    <div class="col-md-9">
        @yield('admin-content')
    </div>
</div>
@endsection

