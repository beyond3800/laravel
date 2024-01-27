<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Each data</title>
</head>
<body>
    @php
        $admin = auth()->guard('admin')->user();
        if($admin)
        {
            $adminName = $admin->name;
        }
        else
        {
            $adminName = '';
        }
        $user = auth()->user()?auth()->user()->id:'';
        $updateOrder = false;
        $allOrder = auth()->user()?auth()->user()->usersOrders()->latest()->get():[];
        foreach ($allOrder as $order) 
        {
            if($order->menu_id === $data->id)
            {
               $updateOrder = true;
            }
        }
        $quatity=1;

    @endphp
    <div class="flex bg-white mt-2 mb-10 md:mr-20 md: ml-10 shadow-lg border-t">
        <div class="h-40 w-72 rounded py-2  ">
           <img 
           class="w-full h-full rounded border-4 border-yellow-500" 
           src="{{ $data->image ? asset('storage/' . $data->image) : asset('image/IMG_1061.jpeg')}}" alt=""> 
        </div>
        <div class="grid-cols-4 mt-3 ml-5">
            <div class="flex w-full justify-between items-center pr-2">
               <p class="border-b border-dashed border-b-gray-600">
                <span class="text-gray-500 text-sm">{{$data->product_name}}</span></p> 
               <p class="text-sm ml-2">${{$data->price}}</p> 
            </div>
            <p class="mt-2">{{$data->category}}</p>
            <div class=" flex">
                <form method="GET" action="show/index/{{$data->id}}" class="mt-2" >
                    @csrf
                    <button
                    class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-gray-100 hover:bg-gold"
                    id="orderBtn">view</button>
                </form>
            @if (!$adminName)
               @if ($updateOrder === true)
                    <form action="adding_order" method="POST" class="mt-2 ml-3">
                       @csrf
                       @method('PUT')
                       <input type="hidden" name="order_id" value="{{$data->id}}">
                       <button
                       class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-gray-100 hover:bg-gold"
                       id="orderBtn">AddOrder</button>
                    </form>
                @else
                <form method="POST" action="order/{{$data->id}}" class="mt-2 ml-3" enctype="multipart/form-data">
                    @csrf
                   <input type="hidden" name="user_id" value="{{$user}}">
                   <input type="hidden" name="price" value="{{$data->price}}">
                   <input type="hidden" name="product_name" value="{{$data->product_name}}">
                   <input type="hidden" name="image" value="{{$data->image}}">
                   <input type="hidden" name="description" value="{{$data->short_desc}}">
                   <input type="hidden" name="quatity" value="{{$quatity}}">
                   <input type="hidden" name="menu_id" value="{{$data->id}}">
                   <button
                   class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-gray-100 hover:bg-gold"
                   id="orderBtn">order</button>
               </form>
               @endif 
               @else
               <form action="admin/update-menu/{{$data->id}}" method="post">
                <button type="submit" class=" btn mt-3 ml-2 border-gold hover:bg-green-400">Edit</button>
            </form>
            @endif
            </div>
    </div>
</body>
</html>