@extends('template')
@section('content')
    @if($items->isEmpty())
        <h3>Your cart is empty<a href="{{url('shop')}}"> start soping</a></h3>
    @else
<h1>Your cart </h1>
<div class="table-responsive">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">שם המוצר</th>
            <th scope="col">מחיר</th>
            <th scope="col">כמות</th>
            <th scope="col">סה"כ (&#8362)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td class="delete"><a class="delete-product text-danger" href="{{url('delete-item/'.$item->rowId) }}">X</a></td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>
                <form class="update-cart" method="post" action="{{url('update-cart')}}">
                    @csrf
                    <div class="number">
                        <span class="minus">-</span>
                        <input class="product-quantity" type="text" value="{{$item->qty}}" readonly name="quantity">
                        <span class="plus">+</span>
                    </div>
                    <input type="hidden" value="{{$item->rowId}}" name="rowId">
                </form>
            </td>
            <td class="product-total">{{number_format($item->total)}}</td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <td class="cart-total">{{$total}}</td>
        </tr>
    </tfoot>
</table>
</div>
<a href="{{url('delete-cart')}}" class="delete-cart">מחק עגלה</a>
<p class="clearfix"><a href="{{url('place-order')}}" class="btn btn-primary float-right">עבור לקניה</a></p>
@endif
@endsection
