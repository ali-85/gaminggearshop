<?php

namespace App\Http\Controllers;
use App\Products;
use App\Order;
use App\Slider;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Transfer;
use App\Resi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use function Opis\Closure\unserialize;

class adminController extends Controller
{
    public function getDashboard()
    {
        return view('admin.index');
    }

    public function getProducts()
    {
        $products = Products::all();
        return view('admin.product.allproduct', ['products' => $products]);
    }

    public function addProduct()
    {
        return view('admin.product.addProduct');
    }

    public function storeProduct(Request $request)
    {
        $products = new Products([
            'title' => $request->input('title'),
            'adress' => $request->input('adress'),
            'price' => $request->input('price'),
            'description' => $request->input('description')
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/img/',$filename);
            $products->imagePath = $filename;
        } else {
            return $request;
            $products->image = '';
        }

        $products->save();
        return redirect()->route('admin.allproduct');
    }

    public function updateProduct(Request $request,$id)
    {
        $products = Products::find($id);
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/img/',$filename);
            $products->imagePath = $filename;
        }

        $products->save();
        return redirect()->route('admin.allproduct')->with('products',$products);
    }

    public function delProduct($id)
    {
        $products = Products::find($id);
        $image_path = "assets/img/".$products->imagePath; 
        if (file_exists($image_path)) {
            @unlink($image_path);
        }
        $products->delete();
        return redirect()->back();
    }

    public function showSlider()
    {
        $slider = Slider::all();
        $count = Slider::count();
        return view('admin.slider.show',['slider' => $slider,'count' => $count]);
    }

    public function addSlider()
    {
        return view('admin.slider.add');
    }

    public function storeSlider(Request $request)
    {
        $slider = new Slider([
            'title' => $request->input('title'),
            'link' => $request->input('link')
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/img/carousel',$filename);
            $slider->image = $filename;
        } else {
            return $request;
            $slider->image = '';
        }
        $slider->save();
        return redirect()->route('admin.slider');
    }

    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        $image = "assets/img/carousel".$slider->image; 
        if (file_exists($image)) {
            @unlink($image);
        }
        $slider->delete();
        return redirect()->back();
    }

    public function updateSlider(Request $request,$id)
    {
        $slider = Slider::find($id);
        $slider->title = $request->input('title');
        $slider->link = $request->input('link');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/img/carousel/',$filename);
            $slider->image = $filename;
        }

        $slider->save();
        return redirect()->route('admin.slider')
            ->withSlider($slider);

    }

    public function getOrder()
    {
        $pending = Transfer::where('status',1)->get();
        $pending->transform(function($pending,$key)
        {
            $pending->cart = unserialize($pending->cart);
            return $pending;
        }
        );
        return view('admin.order.pending',['pending' => $pending]);
    }
    public function getOrder2()
    {
        $id = Transfer::all(['id'])->toArray();
        $pending = Transfer::where('status',2)->get();
        $pending->transform(function($pending,$key)
        {
            $pending->cart = unserialize($pending->cart);
            return $pending;
        }
        );
        $resi = Resi::where('transfer_id',$id)->get();
        return view('admin.order.kirim',['pending' => $pending,'resi' => $resi]);
    }
    public function getOrder3()
    {
        $id = Transfer::all(['id'])->toArray();
        $pending = Transfer::where('status',3)->get();
        $pending->transform(function($pending,$key)
        {
            $pending->cart = unserialize($pending->cart);
            return $pending;
        }
        );
        $resi = Resi::where('transfer_id',$id)->get();
        return view('admin.order.selesai',['pending' => $pending,'resi' => $resi]);
    }
    public function storeToAccept(Request $request,$id)
    {
        $order = Transfer::find($id);
        $order->status = 2;
        $order->save();
        $resi = new Resi([
            'transfer_id' => $id,
            'resi' => $request->input('resi')
        ]);
        $resi->save();
        return redirect()->route('admin.order')->with('success','Order Diterima !');
    }
    public function getCC()
    {
        $pending = Order::where('status',1)->get();
        $pending->transform(function($pending,$key)
        {
            $pending->cart = unserialize($pending->cart);
            return $pending;
        }
        );
        return view('admin.order.pendingcc',['pending' => $pending]);
    }
    public function storeAcceptCC(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        $resi = new Resi([
            'credit_id' => $id,
            'resi' => $request->input('resi')
        ]);
        $resi->save();
        return redirect()->route('admin.order')->with('success','Order Diterima !');
    }
    public function getCC2()
    {   
        $id = Order::all(['id'])->toArray();
        $pending = Order::where('status',2)->get();
        $pending->transform(function($pending,$key)
            {
            $pending->cart = unserialize($pending->cart);
            return $pending;
            }
        );
        $resi = Resi::where('credit_id',$id)->get();
        return view('admin.order.kirim2',['pending' => $pending,'resi' => $resi]);
    }
    public function getCC3()
    {   
        $id = Order::all(['id'])->toArray();
        $pending = Order::where('status',3)->get();
        $pending->transform(function($pending,$key)
            {
            $pending->cart = unserialize($pending->cart);
            return $pending;
            }
        );
        $resi = Resi::where('credit_id',$id)->get();
        return view('admin.order.selesai2',['pending' => $pending,'resi' => $resi]);
    }
}
