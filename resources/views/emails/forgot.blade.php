<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Me In</title>
    @vite('resources/scss/stylesheet.scss')
</head>
<body>
<div class="text-center">
    <div>Hello, <strong>{{$userInfo->name}}</strong></div>
    <h5></h5>
    Your Reset code is:
    <h1>{{$userInfo->reset_code}}</h1>
</div>
</body>
</html>

