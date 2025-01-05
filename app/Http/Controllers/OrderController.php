<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = [];
        if(auth()->check())
        {
          $orders = auth()->user()->usersOrders()->latest()->get();
        }
        return view('/order.index',['usersOrders'=>$orders]);
    }

    public function store(Request $request, Menu $menu)
    {
    //    dd($request);
        if(!$request['user_id']){
            return redirect('/login');
        }
        $orderedMenu = $request->validate([
            'product_name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'user_id'=>'required',
            'description' => 'required',
            'quatity' => 'required',
            'menu_id'=> 'required',
           ]);
        $orderedMenu['product_name'] = strip_tags($orderedMenu['product_name']);
        //    $orderedMenu['category'] = strip_tags($orderedMenu['category']);
        $orderedMenu['price'] = strip_tags($orderedMenu['price']);
        $orderedMenu['description'] = strip_tags($orderedMenu['description']);
        //    $orderedMenu['short_desc'] = strip_tags($orderedMenu['short_desc']);
        $orderedMenu['quatity'] = strip_tags($orderedMenu['quatity']);
        $orderedMenu['image'] = strip_tags($orderedMenu['image']);
        Order::create($orderedMenu);
        return back()->with('message','Menu added to order');
    }

    public function show(Order $order)
    {
        return view('show/index',['viewed'=>$order]);
    }

    public function addOrder(Request $request)
    {
        $orderId =$request['order_id'];
        $updateOrder= Order::where('menu_id',$orderId)->get();
        foreach($updateOrder as $orders)
        {
            $orders->update([
                'quatity' =>$orders['quatity']+1,]);
        }
        return back()->with('message','order added');
    }

    public function update(Request $request, Order $order)
    {
    // dd($request);
        $orderId = $request['order_id'];
        $updateOrder = Order::where('menu_id',$orderId)->get();
        foreach($updateOrder as $orders)
        {
            $orders->update([
                'quatity' =>$orders['quatity']+1,]);
        }
        return back()->with('message','order added');
    }

    public function removeOrder(Request $request, Order $order)
    {
        $orderId = $request['order_id'];
        $updateOrder= Order::where('menu_id',$orderId)->get();
        foreach($updateOrder as $orders)
        {
            $orders->update([
            'quatity' =>$orders['quatity']-1,]);
        }
        return back()->with('error','Order removed');
    }
    
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('error','Order deleted');
    }
}
