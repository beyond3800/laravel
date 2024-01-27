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
    <x-formCard>
      <form action="/user/authen" method="post">
        @csrf
        <div class="flex flex-col items-center">
            <header class=" capitalize text-lg font-sans">login</header>
        <div class="w-10 h-1 bg-green-500"></div>
        </div>
        
        <div class="">            
            <label for="email" class="">Email</label>
            <input type="text" class=" w-11/12 pl-4 border border-gray-200 h-9" name="email" id="email" placeholder="Email">
            @error('email')
            <p class="text-red-500 mt-2 text-xs">{{$message}}</p>
            @enderror
        </div>
        
        <div class="mt-4">
            <label for="password" class="">Password</label>
            <input type="password" class=" w-11/12 pl-4 border border-gray-200 h-9" name="password" id="password" placeholder="Password">
            @error('password')
            <p class="text-red-500 mt-2 text-xs">{{$message}}</p>
            @enderror
        </div>
        <div class="mt-5">
            <button class=" bg-green-500 px-3 rounded-md text-white">Login</button>
            <p><span class="text-xs">Don't have an account</span>  <a href="/register" class=" text-red-600 text-sm font-mono">Register</a></p>
        </div>
      </form>
    </x-formCard>
  </x-layout>
</body>
</html>