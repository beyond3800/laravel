<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout orders</title>
</head>
<body>
    @php
     $usersOrders = [];
     $totalAmount = 0;
     $totalQuatity =0;
     $confirmBtn = 0;
        if(auth()->check()){
         $usersOrders = auth()->user()->usersOrders()->get();
         $confirmUsersOrders = auth()->user()->confirmUsersOrders()->get();
        }
        // foreach ($usersOrders as $usersOrder) {
            // $totalAmount += $usersOrder['price']*$usersOrder['quatity'];
            // $totalQuatity += $usersOrder['quatity'];
            // $confirmBtn = $usersOrder['checkout'];
        // }
        foreach ($confirmUsersOrders as $usersOrder) {
            $confirmBtn = $usersOrder['checkout'];
            $totalAmount += $usersOrder['price']*$usersOrder['quatity'];
            $totalQuatity += $usersOrder['quatity'];
            $confirmBtn = $usersOrder['checkout'];
        }
    @endphp
    <x-layout>
        {{-- <div class="">{{$usersOrders}}</div> --}}
    <div class="">
        <table class="border w-full ">
          <thead>
            <header class="text-center mb-5 pt-3 text-lg font-serif">Checkout orders</header>
            <tr class="capitalize">
                <th class="">product name</th>
                <th class=" border-r border-l ">description</th>
                <th class=" border-r border-l ">quatity</th>
                <th class="">price</th>
            </tr>
          </thead>
          <tbody>
            
                @foreach ($confirmUsersOrders as $checkout_order)
                <tr class="text-center border  capitalize text-sm font-serif">
                    <td class=" border-r ">{{$checkout_order->product_name}}</td>
                    <td class=" border-r w-80">{{$checkout_order->description}}</td>
                    <td class=" border-r ">{{$checkout_order->quatity}}</td>
                    <td >#{{$checkout_order->price}}</td>
                </tr>
                @endforeach
          </tbody>
        </table>
        <div class=" mt-5 border border-t-0 py-3 px-3 md:text-center">
            <div class=" mb-3">
            </div>
            <div class="mb-3">
                <div class="">Menu Amount : #{{$totalAmount}} </div>
                <div class="">Quatity : {{$totalQuatity}} </div>
                <div class="">Delivery Fees : #1000</div>
                <div class="">Total Amount : #{{$totalAmount + 1000}}</div>
            </div>
            @if (!$confirmBtn)
                <div class=""> Your order will be there within 30minus thanks for ordering from Beyond Restaurant</div>
            @endif

        </div>
    </div>
        {{-- <div class="checkout_card ">
            <h1 class=" text-center mb-6">Your Orders</h1> 
            <div class=" flex justify-between capitalize font-mono">
                <span>productname</span>
                <span>description</span>
                <span>price</span>
            </div>
            @foreach ($checkout_orders as $checkout_order)
            <div class="product_name grid grid-cols-1">
                <div class=" flex py-5 bg-slate-300 mt-3 justify-between px-3">
                    <p class=" capitalize font-mono">{{$checkout_order->product_name}}</p>
                    <p class=" capitalize font-mono">{{$checkout_order->description}}</p>
                    <p class=" capitalize font-mono">#{{$checkout_order->price}}</p>
                </div>
                
            </div>  --}}
            {{-- <div class="product_price grid grid-cols-1">
                <div class=""> Your Orde</div>
                <p>{{$checkout_order->product_name}}</p>
            </div>  --}}
            {{-- @endforeach --}}
        {{-- </div> --}}
    </x-layout>
</body>
</html>