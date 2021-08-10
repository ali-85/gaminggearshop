<?php

namespace App\Http\Controllers;

use App\Order;
use App\Cart;
use App\User;
use App\Transfer;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use function Opis\Closure\serialize;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function index()
    {
        if(!Session::has('cart')){
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total' => $total]);
    }

    public function storeCheckout(Request $request)
    {
      if(!Session::has('cart')){
        return redirect()->route('product.cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      Stripe::setApiKey('sk_test_lNN5qJTKNn4mrxuUIjAXjxFX00c5VHJksH');
      try{
        $charge = Charge::create(array(
            "amount" => $cart->totalPrice * 100,
            "currency" => "idr",
            "customer" => "cus_Fwq6N97d7488CA",
            "source" => $request->input('stripeToken'),
            "description" => "test charge"
        ));
        $order = new Order([
          'name' => $request->input('name'),
          'address' => $request->input('address'),
          'cart' => serialize($cart),
          'payment_id' => $charge->id
        ]);
        Auth::user()->orders()->save($order);
      } catch(\Exception $e){
        return redirect()->route('checkout')->with('error', $e->getMessage());
      }
      Session::forget('cart');
      return redirect()->route('product.index')->with('success','Berhasil membayar item!');
    }
    public function getTransfer()
    {
        if(!Session::has('cart')){
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.transfer',['total' => $total]);
    }
    public function postTransfer(Request $request)
    {
      if(!Session::has('cart')){
        return view('shop.cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $transfer = new Transfer([
        'name' => $request->input('name'),
        'address' => $request->input('address'),
        'cart' => serialize($cart),
      ]);
      if($request->hasFile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('assets/img/',$filename);
        $transfer->image = $filename;
    } else {
        return $request;
        $transfer->image = '';
    }
      Auth::user()->transfers()->save($transfer);
      Session::forget('cart');
      return redirect()->route('product.index')->with('success','Berhasil membayar item!');
    }
}
