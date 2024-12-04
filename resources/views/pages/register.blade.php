<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body{
            background: linear-gradient(to right, #2ba84a, #159d83);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card{
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .text-con{
            display: flex;
            justify-content: center;
        }
        .input-con{
            display: flex;
            justify-content: center;
        }

        .register-card .btn{
            background-color: #159d83;
            color: white;
            border-radius: 20px;
            padding: 0.5rem 2rem;
            margin-top: 1rem;
        }

        .register-card .btn:hover{
            background-color: #117a65;
        }
    </style>
</head>
<body>
    <div class="register-card">
        <div class="row">
            <div class="img-fluid">
                <img src="{{asset('assets/logo.png')}}" alt="">
            </div>

            <div>
                <h1 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Register</h1>
            </div>
            <form action="{{route('register')}}" method="POST">
                @csrf
                <div class="text-con">
                    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Name</h3>
                </div>

                <div class="input-con">
                    <input type="text" name="name" class="form-control" placeholder="Name" required>
                </div>

                <div class="text-con">
                    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Email</h3>
                </div>

                <div class="input-con">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                
                
                <div class="text-con">
                    <h3 style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Password</h3>
                </div>

                <div class="input-con">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>