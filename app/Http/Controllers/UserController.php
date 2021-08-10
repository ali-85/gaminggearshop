<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests;
use App\Transfer;
use App\Resi;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth as IlluminateAuth;
use function Opis\Closure\unserialize;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6'
        ]);
        $users = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => 0,
            'password' => bcrypt($request->input('password'))
        ]);
        $users->save();
        Auth::login($users);
        return redirect('/');
    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password'),'role' => 1])) {
            return redirect()->route('admin.index');
        }elseif(Auth::attempt(['email' => $request->input('email'),'password' => $request->input('password')])){
            return Redirect()->route('user.profile');
        } else {
            return Redirect()->back()->with('danger','Your Email or Password are incorrect !');
        }
    }

    public function resetPassword()
    {
        return view('user.reset');
    }

    public function getProfile()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('user.profile')->withUser($user);
    }

    public function changeInfo()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('user.change')->withUser($user);
    }

    public function updateInfo(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required'
        ]);
        if (!(Hash::check($request->input('password'),Auth::user()->password))) {
            return redirect()->route('user.change')->with('danger','Wrong Password !');
        } else {
            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return redirect()->route('user.profile');
        }
    }

    public function changePass()
    {
        return view('user.changePass');
    }

    public function updatePass(Request $request)
    {
        $this->validate($request,[
            'password' => 'min:6'
        ]);
        $pass = User::find(Auth::user()->id);
        if (!(Hash::check($request->input('oldPass'),$pass->password))) {
            return redirect()->route('user.changePass')->with('danger','the current password is wrong!');
        } elseif(strcmp($request->get('oldPass'),$request->input('password')) == 0 ) {
            return redirect()->route('user.changePass')->with('danger','new password cannot be same as current!');
        } elseif(!(strcmp($request->get('password'),$request->get('password1'))) == 0) {
            return redirect()->route('user.changePass')->with('danger','New Password should be same as confirm password!');
        } else {
            $user = Auth::user();
            $user->password = bcrypt($request->input('password'));
            $user->save();
            return redirect()->route('user.profile');
        }        
    }

    public function getOrder()
    {
        $id = Order::all(['id'])->toArray();
        $orders = Auth::user()->orders;
        $orders->transform(function($order,$key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        $resic = Resi::where('credit_id',$id)->get();
        return view('user.order', ['orders' => $orders,'resic' => $resic,]);
    }
    public function getOrderT()
    {
        $idT = Transfer::all(['id'])->toArray();
        $transfers = Auth::user()->transfers;
        $transfers->transform(function($transfer,$key){
            $transfer->cart = unserialize($transfer->cart);
            return $transfer;
        });
        $resit = Resi::where('transfer_id',$idT)->get();
        return view('user.transfer', ['transfers' => $transfers,'resit' => $resit]);
    }

    public function storeSelesaiCC($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return redirect()->route('user.order');
    }

    public function storeSelesaiTF($id)
    {
        $transfer = Transfer::find($id);
        $transfer->status = 3;
        $transfer->save();
        return redirect()->route('user.order2');
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect()->back();
    }
}
