<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Admin</title>
</head>
<body>
    <x-layout>
        <div class=" w-full">
            <div class=" mt-5 mb-5 flex flex-col justify-center items-center">
                <header class=" text-center mb-1">All Admin Users</header>
                <div class=" w-10 h-1 bg-red-600 "></div>
            </div>
            <table class=" w-full">
                <thead>
                    <tr class=" capitalize border-b">
                        <th>username</th>
                        <th>email</th>
                        <th><address>address</address></th>
                        <th>number</th>
                        <th>role</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($allAdmin as $admin)
                      <x-eachAdmin :admin="$admin"/>
                   @endforeach
                </tbody>

            </table>
        </div>
    </x-layout>
    
</body>
</html>