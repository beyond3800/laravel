<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-layout>
        {{-- {{ $viewed['image'] }} --}}
        <div class=" mt-3 py-2 bg-red-300">
            <div class=" w-full h-auto flex justify-center">
                <div class=" md:w-5/12 h-52">
                    <img 
                    src="{{ $viewed['image'] ? asset('storage/' . $viewed['image']) : asset('image/IMG_1061.jpeg')}}" alt="" class="w-full h-full">
                </div>
            </div>
            <div class=" text-center mt-5 md:px-80">
                <p class=" uppercase font-serif border-b">{{$viewed->product_name}}</p>
                <p class="border-b">{{$viewed->description}}</p>
                <p class="border-b">{{$viewed->short_desc}}</p>
                <p class="border-b ">#{{$viewed->price}}</p>
            </div>
        </div>
    </x-layout>
     
</body>
</html>