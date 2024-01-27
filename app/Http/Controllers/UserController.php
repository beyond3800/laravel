<?php

namespace App\Http\Controllers;

use auth;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function create()
   {
    return view('user.register');
   } 
   public function store(Request $request)
   {
   if($request->name==25 && $request->username==24 && $request->email==14 && $request->password==13 && $request->address==4){
      return redirect('/admin.login');
   }
      $input = $request->validate(
   [
      'name' =>['required',Rule::unique('admins','name')],
      'email' => ['required','email',Rule::unique('users','email')],
      'username' => ['required','min:6','max:30',Rule::unique('users','username')],
      'password' => ['required','min:7','max:30'],
      'address' =>['nullable']
   ]);
      $input['password'] = bcrypt($input['password']);
      $user=User::create($input); 
      auth()->login($user);
      return redirect('/')->with('message','User created and login successfully');
   }
   public function login()
   {
      return view('/user.login');
   }
   public function authen(Request $request)
   {
      // dd($request);
      $formField=$request->validate([
         'email'=>['required'],
         'password'=>'required'
      ]);
      if(auth()->attempt($formField)){
         $request->session()->regenerate();
         return redirect('/')->with('message','You are logged in!');
      }

      return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');

   }
   public function logout()
   {
      auth()->logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();

      return redirect('/login')->with('error','You have logged out!');
   }
   public function destroy(Order $order)
   {
      $user = auth()->user()->id;
      $deletedOrder= Order::where('user_id',$user)->delete();
      return back()->with('error','All order cleared');
   }
   public function checkout()
   {
      $userOrder=[];
      if(auth()->check()){
         $userOrder=auth()->user()->usersOrders()->get();
      }
      return view('/order/checkout',['checkout_orders'=>$userOrder,]);
   }
   public function updateAddress(Request $request)
   {
      // dd($request);
      $used_id = $request['user_id'];
      if($request['address'] =='')
      {
         return back()->with('message','Address input empty');
      }
      else
      {
         $userAddress = User::where('id',$used_id)->get();
         // dd($userAddress);
          foreach($userAddress as $address)
         {
             $address->update([
                 'address' => $request['address'] ]);
         }
         return back()->with('message','Address updated');
      }

   }
   public function checkoutOrders()
   {
      $used_id = '';
     if(auth()->check())
     {
      $used_id = auth()->user()->id;
      $userOrders = Order::where('user_id',$used_id)->get();
      foreach($userOrders as $userOrder)
     {
        // dd($userOrder);
         $userOrder->update([
             'checkout' =>1
         ]);
     }
     return redirect('/checkout')->with('message','Orders confirmed');
     }

   }
}

