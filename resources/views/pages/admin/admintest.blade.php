<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <style>
        .table-container {
            background-color: #d3d3d3;
            padding: 15px;
            border-radius: 5px;
        }

        #actionContainer {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }


        .header {
            font-weight: bold;
        }

        .action-buttons button {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">

        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <a href="{{route('login')}}" class="btn btn-danger">Logout</a>
            </div>
            <h1 class="ms-3 m-0">Admin</h1>

            <button id="add-row-btn" class="btn btn-primary">Add New Row</button>

        </header>


        <div class="row">

            <div class="col-lg-8">
                <div class="table-container">
                    <table id="data-table" class="table table-bordered text-center">
                        <thead class="table-success text-white">
                            <tr>
                                <th>Vaccine Dose</th>
                                <th>Place</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0 ; $i < 100 ; $i++)

                                @csrf
                                <tr>
                                <td>1</td>
                                <td>City Hospital</td>
                                <td>2024-12-01</td>
                                <td>2024-12-10</td>
                                <td class="action-buttons" id="actionContainer">
                                    <form action="{{ route('updateAppointment') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success btn-sm" type="submit">Update</button>
                                    </form>
                                    <form action="{{ route('deleteAppointment') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                    </form>
                                </td>
                                </tr>
                                @endfor

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                @foreach ($vaccine as $v)
                <div class="mb-3 bg-secondary" style="height: 100px; border-radius: 5px;">
                    <div class="row">
                        <div class="col-4">
                            <small>Dose</small>
                        </div>
                        <div class="col-8">
                            <input type="text" disabled value="{{ $v->dose }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <small>Price</small>
                        </div>
                        <div class="col-6">
                            <form action="{{route('updateVaccinePrice')}}" method="POST">
                                @csrf
                                <input type="hidden" name="vaccine_id" value="{{$v->vaccineId}}">
                                <input type="text" name="new_price" value="{{ $v->price }}">
                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <small>Description</small>
                        </div>
                        <div class="col-8">
                            <input type="text" disabled value="{{ $v->description }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.getElementById('add-row-btn').addEventListener('click', function() {

            const tableBody = document.querySelector('#data-table tbody');


            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <form action="{{ route('createNewAppointment') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <td><input type="text" name="vaccine_id" class="form-control" placeholder="Enter Vaccine Id"></td>
                    <td><input type="text" name="place" class="form-control" placeholder="Enter Place"></td>
                    <td><input type="text" name="date_start" placeholder="Enter Date Start" class="form-control"></td>
                    <td><input type="text" name="date_end" placeholder="Enter Date End" class="form-control"></td>
                    <td class="action-buttons">
                        <button class="btn btn-success btn-sm">Save</button>
                    </td>
                </form>
            `;


            tableBody.appendChild(newRow);

            newRow.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });

            newRow.querySelector('input').focus();
        });
    </script>
</body>

</html>