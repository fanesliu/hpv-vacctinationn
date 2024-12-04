<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .profile-card{
            background: linear-gradient(to right, #2ba84a, #159d83);
            margin: 10%;
            display: flex;
            flex-direction: column;
        }

    </style> 
</head>
<body>

    <nav class="navbar navbar-nav">
        <ul>
            Navbar
        </ul>
    </nav>

    <div class="profile-card p-4 text-white">
        <div class="row align-items-center">
            <div class="col text-center">
                <img src="{{asset('profile_bg.png')}}" class="rounded-circle" alt="">
            </div> 
            
            <div class="col-9">
                <form action="{{route('profile')}}" action="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label" style="font-family :'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="col">
                            <label for="email" class="form-label" style="font-family :'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-family :'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>