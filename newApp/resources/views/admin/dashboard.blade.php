<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard</title>
</head>
<body>
    @php
        $admin = Auth::guard('admin')->user();
    @endphp
    <x-layout>
     <div class="">
        <header class=" text-center capitalize">{{$admin->username}}</header>
        <div class=" items-center flex flex-col mb-10">
            <h1 class=" capitalize text-lg ">admin room</h1>
            <h6 class=" w-14 h-1 text-center bg-green-500"></h6>
        </div>
        <div class=" grid md:grid-cols-6 sm:grid-cols-1">
            <div class=" border ml-6 text-center bg-orange-400 font-mono">
                <a href="/menu.createMenu" class="text-center border-b capitalize">create menu</a>
                <p>Create menu for your customer a menu must have an IMAGE,NAME,PRICE and a DESCRIPTION to advertise the menu</p>
            </div>
            <div class=" border ml-6 text-center bg-orange-400 font-mono">
                <a href="/admin/usersOrders" class="text-center border-b capitalize">user order</a>
                <p> The link to customers orders with time and the menu they have ordered</p>
            </div>
            <div class="border ml-6 text-center bg-orange-400 font-mono">
                <a href="/admin/customers" class="text-center border-b capitalize">users info</a>
                <p> The link to users details they sign up with their name address number and unique username</p>
            </div>
            <div class="border ml-6 text-center bg-orange-400 font-mono">
                <a href="" class="text-center border-b capitalize">delete menu</a>
                <p> Where you can delete menu which is available for the customers</p>
            </div>
            <div class="border ml-6 text-center bg-orange-400 font-mono">
                <a href="" class=" text-center border-b capitalize">update menu</a>
                <p>Where you can update order to what you will be serving </p>
            </div>
        </div>
     </div>

        
    </x-layout>
</body>
</html>