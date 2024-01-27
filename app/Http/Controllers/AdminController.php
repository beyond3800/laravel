<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
    public function create()
    {
        return view('admin.register');
    }
    public function store(Request $request)
    {
        // dd($request);
        $adminInput = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'username'=>['required',Rule::unique('users','username')],
            'email'=>['required','email',Rule::unique('users','email')],
            'role'=>'required',
           ]);
        $adminInput['password'] = bcrypt($adminInput['password']);
        $admin = Admin::create($adminInput);
        auth()->login($admin);
        return redirect('admin/dashboard')->with('message','Admin created and login successfully');
    }
    public function login()
    {
        return view('admin/login');
    }
    public function authen(Request $request)
    {
       $formField=$request->validate([
          'username'=>['required'],
          'password'=>'required'
       ]);
       
       if(Auth::guard('admin')->attempt($formField))
       {
          $request->session()->regenerate();
          return redirect('admin/dashboard')->with('message','You are logged in!');
       }
       return back()->withErrors(['username'=>'Invalid Credentials'])->onlyInput('username');
 
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login')->with('message','You have logged out!');
    }
    public function customers()
    {
        return view('admin/customers',['customer'=>User::latest()->get()]);
    }
    public function usersOrders()
    {
        return view('admin/usersOrders',[
            'customers'=>User::latest()->get(),
            'orders'=>Order::latest()->where('checkout','1')->get()]);
    }
    public function deleteOrder(Order $order)
    {
        $order->delete();
        return back()->with('message','Order Delived');
    }
    public function adminUsers()
    {
        return view('admin/admins',[
            'allAdmin'=>Admin::latest()->get(),]);
    }
    public function editAdmin(Admin $admin)
    {
        return view('admin/editAdmin',['admin'=>$admin]);
    }
    public function updateAdmin(Request $request, Admin $admin)
    {
        $formField = $request->validate([
            'username'=>['required'],
            'email'=>'required',
            'role'=>'required',
        ]);
        $admin->update($formField);
        return redirect('admin/admins')->with('message','Admin updated ');
    }
    public function deleteAdmin(Admin $admin)
    {
        $admin->delete();
        return back()->with('message','Admin Deleted');
    }
}
