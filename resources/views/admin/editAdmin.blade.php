<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Admin</title>
</head>
<body>
    <x-layout>
        <div class="">
            <div class="">Edit Admin</div>
            <div class="">
                <form action="/admin/edit/{{$admin->id}}" method="post">
                    @csrf
                    @method('PUT')
                    <x-formCard>
                        {{-- {{$admin->id}} --}}
                        <header class="text-center capitalize mt-3 font-serif"> Change admin details</header>
                        <div class=" mt-4">
                            <label for="username"> Username</label>
                            <input type="text" name="username" class=" pl-2" id="username" placeholder="Username" value="{{$admin->username}}">
                        </div>
                        <div class="mt-4">
                            <label for="email">Email</label>
                            <input type="text" name="email" class=" pl-2" id="email" placeholder="Email" value="{{$admin->email}}">
                        </div>
                        <div class="mt-4">
                            {{-- <input type="hidden" name="name" class=" pl-2" id="" placeholder="" value="{{}}"> --}}
                            <label for="role">Role</label>
                            <input type="text" name="role" class=" pl-2" id="role" placeholder="Role" value="{{$admin->role}}">
                        </div>
                        {{-- <label for=""></label> --}}
                        {{-- <label for=""></label>
                        <input type="text" name="" class=" pl-2" id="" placeholder=""> --}}
                        <div class=" text-center mt-5 mb-5 ">
                            <button type="submit" class=" border rounded-md px-1 hover:bg-green-400 shadow-lg">Update</button>
                        </div>
                    </x-formCard>
                </form>
            </div>
        </div>
    </x-layout>
</body>
</html>