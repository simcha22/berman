@extends('template')
@section('content')
<h1>Sign up</h1>
<div class="row">
    <div class="col-md-8">
        <form method="post" action="{{url('signup')}}">
            @csrf
            <div></div>
        </form>
    </div>
</div>
@endsection
