<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .profile-card {
            background: linear-gradient(to right, #2ba84a, #159d83);
            margin: 10%;
            margin-top: 10px;
            border-radius: 20px;
        }

        .profile-picture {
            max-width: 150px;
            margin: auto;
        }

        label {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .curved-line {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 40%;
            height: 100%;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(20%, 50%);
        }

        .custom-table {
            background: linear-gradient(to right, #2ba84a, #159d83);
            height: 2px;
            color: white;
            border: none;
        }

        .custom-container {
            background-color: linear-gradient(to right, #159d83, #2ba84a);

        }

        .custom-table-header {
            background-color: #159d83;
        }

        .small-arrow {
            width: 5%;
            height: 5%;
        }
    </style>
</head>

<body>
    {{-- <hr class="custom-line"> --}}
    <div class="p-5">
        <a href="{{route('homepage')}}">
            <img src="{{asset('assets/backward-arrow.png')}}" alt="" class="small-arrow">
        </a>
    </div>

    <div class="container my-5">
        <h1 class="mb-4 text-center">Profile</h1>
        <div class="card p-4" style="background-color: #4caf50; border-radius: 15px;">
            <div class="row align-items-center">

                <div class="col-md-4 text-center">
                    <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <img src="{{ $users->image ? asset('storage/' . $users->image) : asset('profile_bg.png') }}" alt="{{asset('profile_bg.png')}}" class="rounded-circle mb-3" style="width: 150px; height: 150px;">

                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <input type="file" class="form-control w-50 me-3" id="image" name="image">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>


                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" disabled value="{{$users->name}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" disabled value="{{$users->email}}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <a href="{{ route('editPassword') }}"><button class="btn btn-primary">Update Password</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('components.historyTable')

</body>

</html>