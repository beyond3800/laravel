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
        <div class=" flex justify-center mt-10">
            
            <div class="bg-slate-200 shadow-xl">
               <header class=" w-full text-center my-3 text-xl border-b-2 border-white">Admin Menu Post</header> 
                <form action="/product" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="product mb-5">
                        <label class="productLable" for="title">product name</label>
                        <input type="text" name="product_name" id="title">
                        @error('product_name')
                            <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="product mb-5">
                        <label class="productLable" for="category">category</label>
                        <input type="text" name="category" id="category" placeholder="category">
                        @error('category')
                        <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="product mb-5">
                        <label class="productLable" for="price">price</label>
                        <input type="text" name="price" id="price" placeholder="price">
                        @error('price')
                        <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="product mb-5">
                        <label class="productLable" for="description" class="">description</label>
                        <textarea class=" placeholder:text-center capitalize placeholder:capitalize" name="description" id="description" cols="30" rows="1" placeholder="description"></textarea>
                        @error('description')
                        <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="product mb-5">
                        <label class="productLable" for="quatity">short_desc</label>
                        <input type="text" name="short_desc" id="short_desc" placeholder="short_desc">
                        @error('short_desc')
                        <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="product mb-5">
                        <label class="productLable" for="image">Image</label>
                        <input type="file" name="image" id="image" placeholder="image">
                        @error('image')
                        <p class=" text-red-600 text-sm font-mono">{{$message}}</p>
                        @enderror
                    </div>
                    <div class=" text-center"><button class="bg-blue-400 rounded-md my-3 px-2">create menu</button></div>
                </form>
           </div>
        </div>
    </x-layout>
</body>
</html>