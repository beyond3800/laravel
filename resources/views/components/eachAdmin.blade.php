<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- <div class=" grid grid-cols-4 items-center justify-around w-full capitalize bg-red-400 mt-3">
        <div class=""><h3>{{$admin->username}}</h3></div>
        <div class=""><h3>{{$admin->gmail}}</h3></div> --}}
        {{-- <div class=""><h3>{{$admin->username}}</h3></div> --}}
        {{-- <div class=""><h3>{{$admin->role}}</h3></div>
        <div class=" ">
            <button class="">Edit Admin</button>
            <button class="">Delete Admin</button>
        </div>
    </div> --}}
    <tr class=" text-center capitalize  border-b">
        <td>{{$admin->username}}</td>
        <td>{{$admin->email}}</td>
        <td><address>empty</address></td>
        <td> empty</td>
        <td>{{$admin->role}}</td>
        <td class=" capitalize flex"> 
            <a href="/admin/edit-admin/{{$admin->id}}" class="mr-2 capitalize border rounded-lg px-1 text-sm bg-green-400 hover:bg-green-600">edit</a>
            <form action="/admin/delete-admin/{{$admin->id}}" method="post">
                @csrf
                @method('DELETE')
                <button class="capitalize border rounded-lg px-1 text-sm bg-red-400 hover:bg-red-600">delete</button>
            </form>
        </td>
    </tr>
</body>
</html>