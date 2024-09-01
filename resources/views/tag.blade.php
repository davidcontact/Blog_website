<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h4>Hello This is view point from controller!</h4>
    <ul>
        @foreach ($tags as $tag)
            <li>{{ $tag }}</li>
        @endforeach
    </ul>
</body>
</html>