<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Products;
use App\Order;
use App\Slider;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use function Opis\Closure\serialize;

class ProductController extends Controller
{
    public function getIndex(Request $request)
    {
        $slider = Slider::all();
        $products = Products::all();
        $request->session()->forget('status');
        return view('shop.index')
            ->withSlider($slider)
            ->withProducts($products);
    }

    public function getDetail($id)
    {
        $products = Products::where('id',$id)->get();
        return view('shop.detail')
                    ->withProducts($products);
    }

    public function toCheckout(Request $request, $id)
    {
        $products = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $products->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('checkout');
    }

    public function search(Request $request)
    {
        $slider = Slider::all();
        $products = Products::when($request->keyword, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->keyword}%")
                ->orWhere('description', 'like', "%{$request->keyword}%");
        })->get();
        $request->session()->flash('status', $request->keyword);
        return view('shop.index')
                    ->withSlider($slider)
                    ->withProducts($products);
    }
    public function getAddtoCart(Request $request, $id)
    {
        $products = Products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products, $products->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            $get = Products::inRandomOrder()->limit(3)->get();
            return view('shop.cart')->withGet($get);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart')){
            return view('shop.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total' => $total]);
    }

    public function postCheckout(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->cart = serialize($cart);
        $order->name = $request->input('name');
        $order->address = $request->input('address');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/img/',$filename);
            $order->image = $filename;
        } else {
            return $request;
            $order->image = '';
        }

        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return redirect()->route('product.index')->with('success','succesfully purchased items!');
    }

    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return Redirect()->route('product.cart');
    }

    public function getRemove($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return Redirect()->route('product.cart');
    }
}
