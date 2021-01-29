@extends('admin.template')
@section('admin-content')
<h1>עדכן משתמש</h1>
<form class="clearfix" method="post" action="{{url('admin/users/' .$user->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">הקלד את השם</label>
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
        <label for="email">הקלד את כתובת המייל</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
    </div>
    <div class="form-group">
        <label for="password">הקלד סיסמא חדשה</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="form-group">
        <label for="repassword">הקלד שוב את הסיסמא</label>
        <input type="password" class="form-control" id="password" name="password_confirmation">
    </div>
    <div class="form-group">
        <img class="admin-thumbnail" src="{{asset('storage/'. $user->image)}}">
        <label for="image">הוסף תמונה</label>
        <input type="file" class="form-control-file" id="image" name="image">
        <p>אם אינך רוצה להחליף תמונה אנא השאר שדה זה ריק</p>
    </div>
    <button type="submit" class="btn btn-primary float-right mb-5">עדכן את המשתמש</button>
</form>
@endsection
