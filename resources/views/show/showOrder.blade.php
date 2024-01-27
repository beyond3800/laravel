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
        <div class=" h-5/6 pt-4 bg-red-600">
            <div class="mt-3 w-full h-auto">
                <div class=" md:h-48">
                    addkvmmv
                    <img 
                    src="{{ $viewed['image'] ? asset('storage/' . $viewed['image']) : asset('image/IMG_1061.jpeg')}}" alt="" class="w-full h-full">
                </div>
            </div>
        </div>
    </x-layout>
     
</body>
</html>