
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    
</head>
<body>
    @php
        $orderLenght = count($usersOrders);
        $totalAmount = 0;
        $totalQuatity =0;
        foreach ($usersOrders as $usersOrder) {
            $totalAmount += $usersOrder['price']*$usersOrder['quatity'];
            $totalQuatity +=$usersOrder['quatity'];
        }
    @endphp
 <x-layout>
  <div class=" w-full pb-5">
    @auth
    <div class=" text-center capitalize"> {{auth()->user()->username}}</div>
     
    @if ($orderLenght <= 0)
      <div class=" text-center text-lg font-semibold">You've not order any food yet</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 md:pl-5 md:pr-24 pr-5">
    @foreach ($usersOrders as $userOrder)
      <x-eachOrder :data="$userOrder"/>
    </div>
    @endforeach

    @else
      <div class=" text-center text-lg font-semibold">You are not logged in</div>
    @endauth
  </div>
  @if ($orderLenght > 0)
  @auth
    <div class="mb-2 text-center"> <address>Address : {{auth()->user()->address}}</address></div>
    <form action="/checkout-address" method="post" class="text-center">
        @csrf
        @method('put')
        <label for="address" class=" font-bold">Change Address :</label>
        <input type="hidden" name="user_id" id="" value="{{auth()->user()->id}}">
        <input type="text" id="address" placeholder="" class=" border rounded-md pl-3" name="address" value="{{auth()->user()->address}}">
        <button type="submit" class=" border rounded-md px-1 shadow">change</button>
    </form>
  @endauth
  <div class=" mt-11">
    <div class="text-center">Delivery Fees : #1000</div>
      <div class=" text-center">Total Amount: <span>#{{$totalAmount}}</span></div>
      {{-- <div class="">Total Quatity: <span>{{$totalQuatity}}</span></div> --}}
   <div class="flex justify-center">
      <form action="/checkout-order" method="post" class="">
       @csrf
       @method('put')
       <button type="submit" class=" bg-transparent border px-2 rounded-xl font-serif hover:bg-green-600 hover:text-white shadow-xl">Checkout Order</button>
      </form>
      <form action="/clear-order" method="post" class="ml-10">
          @csrf
          @method('DELETE')
       <button type="submit" class=" bg-transparent border px-2 rounded-xl font-serif hover:bg-red-600 hover:text-white shadow-xl">Clear Order</button>
      </form>  
   </div>

  </div>
  @endif
 </x-layout>
</body>
</html>