@extends('admin.template')
@section('admin-content')
    <h1>הזמנות</h1>
@if($orders->isEmpty())
    <p>אין הזמנות במערכת</p>
@else
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">הזמנה</th>
                <th scope="col">מספר משתמש</th>
                <th scope="col">תאריך יצירה</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->id}}</th>
                    <td>@foreach(json_decode($order->order_list) as $item)
                        <p>{{$item->name . ' '. $item->qty . ' X '. $item->price. '='. $item->subtotal}}</p>
                        @endforeach
                    </td>

                    <td>{{$order->user_id}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection
