<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Admin Customers page </title>
</head>
<body>
    <x-layout>
        <h1 class=" text-center text-xl mb-6 font-extrabold">Customers</h1>
    <div class="grid md:grid-cols-4 grid-cols-1 font-serif">
        @foreach ($customer as $customers)
      <div class=' h-auto bg-blue-100 shadow-2xl mr-8 px-2'>
        <div class=' flex justify-between capitalize'><h3 class="">name</h3> <span>{{$customers->name}}</span></div>
        <div class=' flex border-t border-white justify-between capitalize'> <h3 class=" ">username</h3> <span>{{$customers->username}}</span></div>
        <div class=' flex border-t border-white justify-between capitalize'> <h3 class="">email</h3> <span >{{$customers->email}}</span></div>
        <address class=' flex border-t border-white justify-between capitalize'><h3 class="">address</h3> <span class="">{{$customers->address}}</span></address>
        <div class=' flex border-t border-white justify-between capitalize'> <h3 class="">Register date</h3> <span>{{$customers->created_at}}</span></div>
      </div>  
        @endforeach
    </div>
    </x-layout>

</body>
</html>