<x-layout>
    <x-formCard>
      <form action="/admin/authen" method="post">
        @csrf
        <div class="flex flex-col items-center">
            <header class=" capitalize text-lg font-sans"> login</header>
        <div class="w-10 h-1 bg-green-500"></div>
        </div>
        
        <div class="">            
            <label for="email" class="">Username</label>
            <input type="text" class=" w-11/12 pl-4 border border-gray-200 h-9" name="username" id="username" placeholder="username" value="{{old('username')}}">
            @error('username')
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
        </div>
      </form>
    </x-formCard>
  </x-layout>