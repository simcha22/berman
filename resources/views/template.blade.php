<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>berman</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/style.css') }}">
    </head>
    <body>
        <header class="mb-5 bg-warning">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{url('/')}}">
                        <img src="{{asset('images/logo.jpg')}}" class="logo-img" alt="berman"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{url('/')}}">דף הבית</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('about')}}">אודות</a>
                            </li>
                            @unless($pages->isEmpty())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    מאמרים
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($pages as $page)
                                    <a class="dropdown-item" href="{{url($page->slug)}}">{{$page->name}}</a>
                                    @endforeach
                                </div>
                            </li>
                            @endunless
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('shop')}}" >מוצרים</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            @if(session('id'))
                            @if(session('role')===85)
                            <li class="nav-item">
                                <a class="nav-link font-weight-bolder" href="{{url('admin')}}">מערכת ניהול</a>
                            </li>
                            @endif
                                @if(session('image'))
                            <li>
                                <img src="{{asset('storage/'.session('image'))}}" class="user-img" alt="{{session('name')}}">
                            </li>
                                @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('logout')}}">{{session('name')}}, יציאה מהמערכת</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('signup')}}">הרשם</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('login')}}">הכנס</a>
                            </li>
                            @endif
                        </ul>
                        <a class="text-secondary" href="{{url('cart')}}">
                            <div id="mini-cart">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                </svg>
                                <span>{{$cart_count?:''}}</span>
                            </div>
                        </a>
                    </div>
                </nav>
            </div>
        </header>
        <main>
            <div class="container">
                <div id="alert"></div>
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                @if(session('status-fail'))
                <div class="alert alert-danger">
                    {{session('status-fail')}}
                </div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @yield('content')
            </div>
        </main>
        <div class=" bg-warning">
            <footer class=" container">
                <div class="text-center pt-4 pb-4">
                    @כל הזכויות שמורות לקונדטורית ברמן {{date('y')}}
                </div>
            </footer>
        </div>
        <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
        <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
        <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{asset('js/script.js') }}"></script>

    </body>
</html>

