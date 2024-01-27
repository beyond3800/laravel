<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<x-layout>
  <x-formCard>
    <form action="/user" method="POST" class=" items-center">
      @csrf
      <header class="  text-lg underline font-mono text-center">signup</header>
      <div class="mt-4 ">
        <label class=" ml-2 inline-block capitalize font-light" for="name">name</label>
        <input type="text" name="name" class="placeholder:pl-2  w-11/12 ml-1 border border-gray-200 pl-3 capitalize" id="name" placeholder="name" value="{{old('name')}}">
        @error('name')
          <p class=" text-sm text-red-500 text-center">{{$message}}</p>
        @enderror
    </div>
    <div class="  mt-4">
      <label class=" ml-2 capitalize font-light" for="name">username</label>
          <input type="text" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200 pl-3 capitalize" name="username" id="username" placeholder="username" value="{{old('username')}}">
      @error('username')
      <p class="text-sm text-red-500 text-center">{{$message}}</p>
      @enderror
   </div>
   <div class="  mt-4">
    <label class=" ml-2 capitalize font-light" for="email">email</label>
      <input type="" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200 pl-3 capitalize" name="email" id="email" placeholder="email" value="{{old('email')}}">
      @error('email')
      <p class="text-sm text-red-500 text-center">{{$message}}</p>
      @enderror
    </div>
   <div class=" mt-4">
      <label class=" ml-2 capitalize font-light" for="password">password</label>
      <input type="password" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200 pl-3 capitalize" name="password" id="password" placeholder="password">
      @error('password')
      <p class="text-sm text-red-500 text-center">{{$message}}</p>
      @enderror
    </div>
  <div class=" mt-4 ">
    <label class=" ml-2 capitalize font-light" for="address">address</label>
    <input type="address" class="placeholder:pl-2 w-11/12 ml-2 border border-gray-200 pl-3 capitalize" name="address" id="address" placeholder="address">
    @error('address')
    <p class="text-sm text-red-500 text-center">{{$message}}</p>
    @enderror
  </div>
  <div class=" mt-3 mb-4">
      <button class=" bg-blue-400 text-white px-3 cursor-pointer rounded-lg hover:bg-white hover:text-blue-400 text-lg">Register</button>
      <div class=""> 
        <a href="/login" class="">
          <span class="text-xs font-mono text-red-300 underline">Already have an account Login</span> 
          </a></div>
  </div>
 </div>
  </form>
</x-formCard>
</x-layout>

</body>
</html>