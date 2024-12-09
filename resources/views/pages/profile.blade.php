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
            transform: translate(20%, 50%);
        }

        .custom-table {
            background: linear-gradient(to right, #2ba84a, #159d83);
            height: 2px;
            color: white;
            border: none;
        }

        .custom-container{
            justify-content: space-evenly
        }

        .custom-table-header{
            background-color: #159d83;
        }

        .small-arrow{
            width: 5%;
            height: 5%;
        }
    </style>
</head>
<body>
    {{-- <hr class="custom-line"> --}}
    <div class="p-5">
        <a href="{{route('homepage')}}">
            <img src="{{asset('assets/backward-arrow.png')}}" alt=""  class="small-arrow">
        </a>

    </div>

    <div class="text-center custom-container">
        <div class="d-flex flex-column justify-content-evenly">
            <div>
                <h1 class="text-center mb-2">Profile</h1>
            </div>
            <div>
                <a href="{{route('login')}}" class="btn btn-primary">Logout</a>

    <div class="profile-card p-4 text-white">
        <div class="text-white">
            <div class="row profile-card p-4">
                <div class="col-4">
                    <img src="{{ $users->image}}" class="profile-picture rounded-circle"  style="width:100%;height :100%"alt="{{asset('profile_bg.png')}}">
                </div>

                <div class="col-8  ">
                    <form action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label text-end">Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control w-50" id="name" name="name" value="{{ $users->name }}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label text-end">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control w-50" id="email" name="email" value="{{ $users->email }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="uploadimg" class="col-sm-3 col-form-label text-end">Upload Images</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control w-50" id="profile_picture" name="profile_picture">
                            </div>
                        </div>
                        <div class="text-end d-flex flex-row justify-content-evenly"  style="width: 80%; margin: 0 auto;">
                            <a href="{{route('updatePassword')}}"><button class="btn btn-primary">Update Password</button></a>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    @include('components.historyTable')

</body>
</html>
