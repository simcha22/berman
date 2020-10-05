@extends('admin.template')
@section('admin-content')
<h1>עדכן משתמש</h1>
<form class="clearfix" method="post" action="{{url('admin/users/' .$user->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Your name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}">
    </div>
    <div class="form-group">
        <label for="role">הרשאות</label>
        <select class="form-control" id="role" name="role" {{$user->id == session('id')? ' disabled':''}}>
            <option value="0">בחר הרשאה</option>
        @foreach($roles as $role)
        <option value="{{$role->id}}" {{$role->id == old('role', $user->role->id)? ' selected': ''}}>{{$role->name}}</option>
        @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
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
