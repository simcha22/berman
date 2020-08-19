@extends('admin.template')
@section('admin-content')
<h1>הוסף משתמש חדש</h1>
<form class="clearfix" method="post" action="{{url('admin/users')}}">
    @csrf
    <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="role">הרשאות</label>
        <select class="form-control" id="role" name="role">
            <option value="0">בחר הרשאה</option>
        @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="repassword">Reenter Password</label>
        <input type="password" class="form-control" id="password" name="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary float-right">Submit</button>
</form>
@endsection
