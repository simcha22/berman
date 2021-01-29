@extends('template')
@section('content')
<h1>הרשמה לאתר</h1>
<div class="row">
    <div class="col-md-8">
        <form class="clearfix" method="post" action="{{url('signup')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">הקלד את שמך</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="email">הקלד את כתובת המייל שלך</label>
                <input type="email" class="form-control" id="email" name="email">
                <small id="emailHelp" class="form-text text-muted">לעולם לא נשתף את הדוא"ל שלך עם אף אחד אחר.</small>
            </div>
            <div class="form-group">
                <label for="password">הקלד סיסמא</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
                <label for="repassword">הקלד שוב את הסיסמא</label>
                <input type="password" class="form-control" id="password" name="password_confirmation">
            </div>
            <div class="form-group">
                <label for="image">הוסף תמונה</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary float-right mb-5">הרשם</button>
        </form>
    </div>
</div>
@endsection
