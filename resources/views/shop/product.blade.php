@extends('template')
@section('content')

<div class="row">
    <div class="col-md-7 mb-5">
        <h1>{{strtoupper($product->name)}}</h1>
        <p>{!! $product->description !!}</p>
        <p>only for: &#8362; {{$product->price}}</p>
        <form id="add-to-cart" method="post" action="{{url('add-to-cart')}}">
            @csrf
            <div class="number">
                <span class="minus">-</span>
                <input name="quantity" type="text" value="1" readonly/>
                <span class="plus">+</span>
                <button type="submit" class="btn btn-primary">הוסף</button>
            </div>
            <input type="hidden" name="id" value="{{$product->id}}">
        </form>
    </div>
    <div class="col-md-5 mb-5">
        <img src="{{asset('storage/'.$product->image)}}" alt="{{strtoupper($product->name)}}">
    </div>

</div>

@endsection

