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
                <img src="{{ $users->image}}" class="rounded-circle" alt="">
            </div> 
            
            <div class="col-9">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label" style="font-family :'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Name :</label>
                            {{ $users->name }}
                        </div>
                        <div class="col">
                            <label for="email" class="form-label" style="font-family :'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Email :</label>
                            {{ $users->email }}
                       </div>
                    </div>
                    <a href="/editProfile" button type="button" class="btn btn-warning">Update Profile</button></a>
            </div>
        </div>
    </div>
</body>
</html>