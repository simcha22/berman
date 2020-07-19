@extends('template')
@section('content')

<h1 class="mb-5">{{$category->name}}</h1>
@if($category->products->isEmpty())
<h3>אין מוצרים להצגה</h3>
@endif
<div class="row">
    @foreach ($category->products as $product)

    <div class="col-md-4 mb-5">
        <div class="cat-container">         
            <h3>{{strtoupper($product->name)}}</h3>
            <a href="{{url('shop/'.$category->slug . '/' . $product->slug)}}"><img src="{{asset('images/products/'. $product->image)}}"></a>
            <h4>&#8362; {{$product->price}}</h4>
            <a href="{{url('add-to-cart/'. $product->id)}}" class="add-to-cart btn btn-primary">הוסף לעגלה</a>
            <a href="{{url()->current(). '/'.$product->slug}}" class="btn btn-info">קרא עוד</a>

        </div>

    </div>
    @endforeach
</div>
@endsection

