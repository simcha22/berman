@extends('template')
@section('content')
<h1 class="mb-5">tihs is catgories page!</h1>
@if($categories->isEmpty())
<h2>אין קטגוריות להצגה</h2>
@endif
<div class="row mb-5">
 @foreach ($categories as $category)
 
 <div class="col-md-4">
     <div class="cat-container">         
         <h3>{{strtoupper($category->name)}}</h3>
         <a class="stretched-link" href="{{url('shop/'. $category->slug)}}"><img src="{{asset('images/'. $category->image)}}"></a>
     </div>
     
 </div>
 @endforeach
</div>
@endsection

