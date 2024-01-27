<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (session()->has('error'))
        <div class="fixed top-0 w-full bg-red-600 text-yellow-50 text-center h-11 py-2 shadow capitalize text-lg font-thin" id="flash_message">{{session('error')}}</div>
    @endif
</body>
</html>