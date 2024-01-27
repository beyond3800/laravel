<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users Orders</title>
</head>
<body>
 <x-layout>
    @php
        $orderAmount = count($orders);
        $orderArray = [];
        $orderUser = [];
    @endphp

    @if ($orderAmount > 0)
      <table class=" border w-full">
        <header class=" text-center text-3xl capitalize font-mono"> Orders from Customers</header>
        <thead>
            <tr class="text-center">
                <th>Menu Name</th>
                <th>Menu DESCRIPTION</th>
                <th>Menu Quatity</th>
                <th>Menu price</th>
                <th>Order time</th>
                <th>Customer Name</th>
                <th>Customer address</th>
                <th>Ordee Stage</th>
            </tr>
        </thead>

        <tbody class="">
            @foreach ($customers as $customer)
                @foreach ($orders as $order)
                    @if ($order->user_id == $customer->id)
                        <tr class=" text-center border">
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->quatity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->address}}</td>
                            <td>
                                <form action="/admin/deleteOrder/{{$order->id}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                   <button type="submit" class=" border px-2 hover:bg-green-600 text-sm ">Delivered</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach     
            @endforeach
        </tbody>
      </table>
    @else
       <div class=" text-center font-mono text-lg mt-8">No order at the moment</div>
    @endif
 </x-layout>
</body>
</html>