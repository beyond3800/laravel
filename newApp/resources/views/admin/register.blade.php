
<x-layout>   
  <x-formCard>
    <form action="/admin" method="POST" class=" items-center">
      @csrf
      <header class="text-lg underline font-mono text-center">Admin</header>

      <div class="mt-4 ">
        <label class=" ml-2 inline-block" for="name">username</label>
        <input type="text" name="username" class="placeholder:pl-2  w-11/12 ml-1 border border-gray-200" id="name" placeholder="username" value="{{old('username')}}">
        @error('username')
          <p class=" text-sm text-red-500 text-center">{{$message}}</p>
        @enderror
      </div>

      <div class="mt-4">
        <input type="hidden" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200" name="name" value="admin">
      </div>

      <div class="mt-4">
        <label class=" ml-2" for="email">email</label>
        <input type="email" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200" name="email" id="email" placeholder="email" value="{{old('email')}}">
        @error('email')
         <p class="text-sm text-red-500 text-center">{{$message}}</p>
        @enderror
      </div>

      <div class="mt-4">
         <label class=" ml-2" for="password">password</label>
         <input type="password" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200" name="password" id="password" placeholder="password">
         @error('password')
         <p class="text-sm text-red-500 text-center">{{$message}}</p>
         @enderror
      </div>

      <div class="mt-4">
        <label class=" ml-2" for="confirmpassword">Confirm Password</label>
        <input type="password" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200" name="password_confirmation" id="confirmpassword" placeholder="Confirm Password">
        @error('password_confirmation')
         <p class="text-sm text-red-500 text-center">{{$message}}</p>
        @enderror
     </div>

      <div class="mt-4">
        <label class=" ml-2" for="role">role</label>
        <input type="text" class="placeholder:pl-2 w-11/12 ml-1 border border-gray-200" name="role" id="role" placeholder="role" value="{{old('role')}}">
        @error('role')
         <p class="text-sm text-red-500 text-center">{{$message}}</p>
        @enderror
      </div>

      <div class="mt-3 mb-4">
         <button class=" bg-blue-400 text-white px-3 cursor-pointer rounded-lg hover:bg-white hover:text-blue-400 text-lg">Register</button>
          <div class=""> 
            <a href="/admin.login" class="">
             <span class="text-xs font-mono text-red-300 underline">Login Admin</span> 
            </a>
          </div>
      </div>

    </form>

  </x-formCard>

</x-layout>