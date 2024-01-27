<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $orderQuatity = 0;
        $checkoutBtn = 0;
        $admin = auth()->guard('admin')->user();
        
        if($admin){
            $adminName = $admin->name;
        }else{
            $adminName = '';
        }
        if(auth()->check()){
        $orders = auth()->user()->usersOrders()->get();
        $checkedOuts = auth()->user()->confirmUsersOrders()->get();
        foreach ($orders as $usersOrder) {
            $orderQuatity += $usersOrder['quatity'];
        }
        foreach ($checkedOuts as $checkedOut) {
            $checkoutBtn = $checkedOut['checkout'];
        }
        }
    @endphp
    <nav class="py-2 mb-4 md:flex justify-between w-full  transition-all" id='nav'>
     <header class="md:pl-5 uppercase flex justify-between pl-2 ">
        <h2 class="text-gray-400"><a href="/">Beyond</a></h2>
        <button class="block sm:hidden mr-5" id="navBtn">menuBtn</button>
    </header>
     <ul class="sm:ml-10 md:flex sm:mr-10 capitalize text-sm transition shadow-md md:shadow-none h-0 overflow-hidden md:h-auto">
        <li class=" hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
            <a href="/" class="sm:ml-4 sm:mb-3">menu</a>
        </li>
        <li class="md:mr-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
            <a href="/order.index" class="sm:ml-4 sm:mb-3">Order <span class="text-sm text-green-600">{{$orderQuatity<=0?'':$orderQuatity}}</span></a>
        </li>
        @if(!$adminName)
        @auth
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="md:mr-3 cursor-pointer text-red-600 pl-3 mb-2">Logout</button>
        </form>
        <li><a href="/" class="">Customer Service</a></li>
        
         @if ($checkoutBtn == 1)
          <li>
             <a href="/checkout"
             class="md:mr-3 md:ml-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
               Checkout Page
             </a>
          </li>
         @endif

        @else
        <li class="md:mr-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
            <a href="/login" class="">login</a>
        </li>
        @endauth
        @endif
        @if($adminName !=='')
            @if (auth()->guard('admin')->user()->role == 'management')
            <li class="md:mr-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
                <a href="/admin/register" class="sm:ml-4 sm:mb-3">Register</a>
            </li>
            <li class="md:mr-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
                <a href="/admin/admins" class="sm:ml-4 sm:mb-3">Admins Users</a>
            </li>
            @endif
        
        <li class="md:mr-3 hover:bg-gray-200 hover:translate-x-2 transition-all pl-3 md:p-0 md:hover:translate-x-0 md:hover:bg-transparent py-1">
            <a href="/admin/dashboard" class="sm:ml-4 sm:mb-3">admin</a>
        </li>
        @endif
     </ul>
    </nav>
    
</body>
</html>