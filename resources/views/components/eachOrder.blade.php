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
        if($admin){
            $adminName = $admin->name;
        }else{
            $adminName = '';
        }
        $user = auth()->user()?auth()->user()->id:'';

    @endphp
    @props(['data'])
<div class="flex bg-white mt-2 mb-10 md:mr-20 md: ml-10 shadow-lg border-t">
        <div class="h-40 w-72 rounded py-2  ">
           <img 
           class="w-full h-full rounded border-4 border-yellow-500" 
           src="{{ $data->image ? asset('storage/' . $data->image) : asset('image/IMG_1061.jpeg')}}" alt=""> 
        </div>
    <div class="grid-cols-4 mt-3 ml-5 md:w-40">
        <div class="flex w-full justify-between items-center pr-2 ">
            <p class="border-b border-dashed border-b-gray-600">
            <span class="text-gray-500 text-sm">{{$data->product_name}}</span></p> 
            <p class="text-sm">${{$data->price}}</p> 
        </div>
            <p class="mt-2">{{$data->category}}</p>
            {{-- <p>{{$data->quatity}}</p> --}}
        <div class=" flex justify-between items-center">
            <form method="GET" action="show/index/{{$data->menu_id}}" class="mt-2" >
                @csrf
                <button
                class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-gray-100 hover:bg-gold"
                id="orderBtn">view</button>
            </form>
        @if (!$adminName)
        <div class=" flex items-center justify-center mt-3">
            <form method="POST" action="add_order/{{$data->id}}" class="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
             <input type="hidden" name="order_id" value="{{$data->menu_id}}">
                <button
                class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-white hover:bg-green-600 mb-1"
                id="orderBtn">+</button>
            </form>
                <input type="text" name="" id="" class=" w-10 border h-4 border-l-0 border-r-0 text-center text-sm" value="{{$data->quatity}}">
            @if ($data->quatity<=1)
                <form method="POST" action="/order_deleted/{{$data->id}}}" class="" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <button
                    class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono bg-red-400 mb-1"
                    id="orderBtn">-</button>
                </form>
             @else
                <form method="POST" action="remove_order/{{$data->id}}" class="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="order_id" value="{{$data->menu_id}}">
                    <button class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono hover:text-black-100 hover:bg-red-600 mb-1 text-black "
                     id="orderBtn">-</button>
                </form>
            @endif
        </div>
        @endif
    </div>
    <form method="POST" action="/order_deleted/{{$data->id}}}" class="" enctype="multipart/form-data">
        @csrf
        @method('DELETE')
        <button
        class=" border-2 rounded-md border-gold px-1 capitalize text-xs font-mono bg-red-100 mt-5 hover:bg-red-300"
        id="orderBtn">deleteOrder</button>
    </form>
</div>
</body>
</html>