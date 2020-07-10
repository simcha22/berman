@extends('template')
@section('content')
<h1 class="mb-5">tihs is catgories page!</h1>

<div class="row">
 @foreach ($categories as $category)
 
 <div class="col-md-4">
     <div class="cat-container">         
         <h3>{{$category->name}}</h3>
         <a href="{{url('shop/'. $category->slug)}}"><img src="{{asset('images/'. $category->image)}}"></a>
     </div>
     
 </div>
 @endforeach
</div>
@endsection

