<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller {

    public function placeOrder(){
        if(session('id')){
            if(\Cart::count()) {
                Order::store();
                return redirect('shop')->with('status', 'הזמנתכם נשלחה למערכת והיא מעובדת בדקות אלו אישור הזמנה יישלח למייל.');
            }
            return redirect('shop');
        }

        session(['place-order-process', true]);
        return redirect('login')->with('status', '  אינך רשום במערכת בשביל להשלים את ההזמנה עליך להרשם קודם תודה');
        //אפשר להוסיף קישור להרשמה
    }
    public function deleteCart(){
        \Cart::destroy();
        return redirect('shop')->with('status', 'העגלה נמחקה בהצלחה');
    }
    public function deleteItem($rowId){
        \Cart::remove($rowId);

        return redirect('cart')->with('status', 'המוצר נמחק בהצלחה.');
    }
    public function updateCart(Request $request){
        \Cart::update($request->rowId, $request->quantity);
        $data = [
            'cart_count' =>\Cart::count(),
            'cart_total' =>\Cart::total(0),
            'product_total' =>\Cart::get($request->rowId)->total(0),
        ];
        return json_encode($data);
    }
    public function addToCartByQty(Request $request) {
        Product::addToCart($request->id, (int) $request->quantity);
        return \Cart::count();
    }

    public function addToCart($id) {
        Product::addToCart($id);
        return \Cart::count();
    }

    public function displayCart() {
        \Cart::setGlobalTax(0);
        $data['items'] = \Cart::content();
        $data['total'] = \Cart::total();
        return view('cart.cart', $data);
    }

}
