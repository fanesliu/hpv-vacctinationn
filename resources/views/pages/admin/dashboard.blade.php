<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Admin Dashboard</title>
</head>

<a>
    @if (!Auth::check())
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
    @else
    <a href="/profile" >{{ Auth::user()->name }}</a>
    <a href="{{ route('logout') }}">Logout</a>
    @endif

    <a href="/appointment"><button type="button" class="btn btn-primary">List Schedule</button></a>
    <a href="/vaccine"><button type="button" class="btn btn-primary">Update Price Vaccine</button></a>
</body>

</html>
