@extends('admin.template')
@section('admin-content')
    <h1>הזמנות</h1>
@if($orders->isEmpty())
    <p>אין הזמנות במערכת</p>
@else
    @endif
@endsection
