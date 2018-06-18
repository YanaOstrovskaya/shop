<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;
use App\Order;
use App\OrderItem;
use Validator;
use Gloudemans\Shoppingcart\Facades\Cart;
use Mail;
class CheckoutController extends Controller
{
       public function complete(Request $request)
   {
   	//dump($request->email);
   	$valid = [
   	'name'=> 'required',
   	'email'=> 'required|email|max:30',
   	'phone' => 'required|max:13',
    'address' => 'required',
   	];

    	$this->validate($request, $valid);
    	//dump(Cart::content());
   	$order = new Order();
   	$order->total_sum = Cart::subtotal();
   	$order->phone = $request->phone;
		$order->email = $request->email;
    $order->name = $request->name;
		$order->address = $request->address;
		$order->save();


   	foreach (Cart::content() as $product) {
   		//dump($product->qty);
   		$item = new OrderItem();
   		$item->order_id = $order->id;
   		$item->portfolio_id = $product->id;
   		$item->qty = $product->qty;
   		$item->price = $product->price;
   		$item->save();
   	}



//отправка писем на почту
   	Mail::send('mail.admin', compact('order'), function($message){
   		$message->to('osrtowskaya1995@gmail.com');
   		$message->from('osrtowskaya1995@gmail.com');
   		$message->subject('New order');
   	});
   	Mail::send('mail.client', compact('order'), function($message) use ($order){
   		$message->to($order->email);
   		$message->from('osrtowskaya1995@gmail.com');
   		$message->subject('Your order');
   	});
    	Cart::destroy();
    	return redirect('/cart')->with('success', 'Thanks!');
   }
   
}
