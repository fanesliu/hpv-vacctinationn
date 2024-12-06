<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background: linear-gradient(to right, #2ba84a, #159d83);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-card {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        /* .login-card img {
            width: 50px;
            margin-bottom: 1rem;
        } */
        .login-card h1 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .login-card .btn {
            background-color: #159d83;
            color: white;
            border-radius: 20px;
            padding: 0.5rem 2rem;
            margin-top: 1rem;
        }
        .login-card .btn:hover {
            background-color: #117a65;
        }
        .login-card .h3{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .btn_reg:hover{
            color: #2ba84a;
        }
    </style>
</head>
<body>
    {{-- perlu variable error dari be --}}
    @error('email')
    <div class="card text-danger bg-light">{{$error}}</div>
    @enderror

    @error('password')
    <div class="card text-danger bg-light">{{$error}}</div>
    @enderror
    
    <div class="login-card">
        <div class="row">
            <div class="img-fluid">
                <img src="{{asset('assets/logo.png')}}" alt="Logo">
            </div>
            <h1>Log In</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="d-flex"></div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
            <small style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Don't have account? <a href="{{route('register')}}">Register</a></small>
        </div>
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>