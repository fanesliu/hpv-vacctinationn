<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Password</title>
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .update-card {
            background: linear-gradient(to right, #2ba84a, #159d83);
            margin: 10%;
            margin-top: 10px;
            border-radius: 20px;
        }
        .small-arrow{
            width: 10%;
            height: 10%;
        }
    </style>
</head>
<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center">
            <div class="p-5">
                <a href="{{route('homepage')}}">
                    <img src="{{asset('assets/backward-arrow.png')}}" alt=""  class="small-arrow">
                </a>
            </div>
            <h1 class="mb-4">Update Password</h1>
            <div class="update-card card p-4">
                <form method="POST" action="{{ route('updatePassword') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="old_password" class="form-label text-white">Old Password</label>
                        <input type="password" name="old_password" id="old_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label text-white">New Password</label>
                        <input type="password" name="new_password" id="new_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label text-white">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>=
