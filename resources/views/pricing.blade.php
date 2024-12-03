<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pricing</title>
</head>
<body>
    @foreach ($vaccines as $item)
        <h1>dosis ke {{$item->dose}} dengan harga {{$item->price}}</h1>
    @endforeach
</body>
</html>