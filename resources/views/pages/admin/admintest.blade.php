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
        .header {
            font-weight: bold;
        }
        .action-buttons button {
            justify-content: space-between;
        }
        
        .dose-container{
            background-color: #5DB996;
        }
    </style>
</head>
<body class="container-fluid">

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mt-4">
        
        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <a href="{{ route('login') }}" class="btn btn-danger">Logout</a>
            </div>
            <h1 class="ms-3 m-0">Admin</h1> 
            <a href="{{route('addRow')}}" class="btn btn-primary">Add New Row</a>
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
                            {{-- @foreach($appointments as $app)
                                    <tr>
                                        <form action="{{route('updateSelectedSchedule',$app->appointmentId)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <td><input type="text" name="vaccine_id" value="{{ $app->vaccineId }}" class="form-control"></td>
                                        <td><input type="text" name="place" value="{{ $app->place }}" class="form-control"></td>
                                        <td><input type="text" name="date_start" value="{{ $app->dateAvailibilityStart }}" class="form-control"></td>
                                        <td><input type="text" name="date_end" value="{{ $app->dateAvailibilityEnd }}" class="form-control"></td>
                                        <td class="action-buttons d-flex flex-row justify-content-evenly">
                                            <button class="btn btn-success btn-sm">Update</button>
                                        </form>
                                            <form action="{{ route('deleteAppointment', $app->appointmentId) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                            @endforeach --}}

                            @foreach($appointments as $app)
                                <tr>
                                    <form action="{{ route('updateSelectedSchedule', $app->appointmentId) }}" method="POST">
                                        @csrf
                                        <td>
                                            <input type="text" name="vaccineId" value="{{ $app->vaccineId }}" class="form-control">
                                            @error('vaccine_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" name="place" value="{{ $app->place }}" class="form-control">
                                            @error('place')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" name="dateAvailibilityStart" value="{{ $app->dateAvailibilityStart }}" class="form-control">
                                            @error('date_start')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" name="dateAvailibilityEnd" value="{{ $app->dateAvailibilityEnd }}" class="form-control">
                                            @error('date_end')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="action-buttons d-flex flex-row justify-content-evenly">
                                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    </form>

                                    <form action="{{ route('deleteAppointment', $app->appointmentId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if (session('add_row'))
                                <form action="{{route('storeList')}}" method="POST" enctype="multipart/form-data" id="new-row">
                                    @csrf
                                    <tr>
                                        <td><input type="text" class="form-control" name="vaccineId" placeholder="Enter Vaccine Id" required></td>
                                        <td><input type="text" class="form-control" name="place" placeholder="Enter Place" required></td>
                                        <td><input type="text" class="form-control" name="dateAvailibilityStart" placeholder="Enter Date Start" required></td>
                                        <td><input type="text" class="form-control" name="dateAvailibilityEnd" placeholder="Enter Date End" required></td>
                                        <td><button type="submit" class="btn btn-success">Save</button></td>
                                    </tr>
                                </form>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4">
                @foreach ($vaccine as $v)
                    <div class="mb-4 dose-container p-3 rounded shadow-sm">
                        <div class="row mb-2">
                            <div class="col-4">
                                <small class="text-muted">Dose</small>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" disabled value="{{ $v->dose }}">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-4">
                                <small class="text-muted">Price</small>
                            </div>
                            <div class="col-8">
                                <form action="{{ route('updateVaccinePrice') }}" method="POST" class="d-flex">
                                    @csrf
                                    <input type="hidden" name="vaccine_id" value="{{ $v->vaccineId }}">
                                    <input type="text" name="new_price" class="form-control me-2" value="{{ $v->price }}">
                                    <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <small class="text-muted">Description</small>
                            </div>
                            <div class="col-8">
                                <input type="text" class="form-control-plaintext" disabled value="{{ $v->description }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>  
        </div>
    </div>
        

    <script>
        // document.getElementById('add-row-btn').addEventListener('click', function () {
            
        //     const tableBody = document.querySelector('#data-table tbody');

            
        //     const newRow = document.createElement('tr');
        //     newRow.innerHTML = `
        //         <form action="{{route('storeList')}}" method="POST" enctype="multipart/form-data">
        //             @csrf
        //             <td><input type="text" name="vaccineId" class="form-control" placeholder="Enter Vaccine Id"> </td>
        //             <td><input type="text" name="place" class="form-control" placeholder="Enter Place"></td>
        //             <td><input type="text" name="dateAvailibilityStart" placeholder="Enter Date Start" class="form-control"></td>
        //             <td><input type="text" name="" placeholder="Enter Date End" class="form-control"></td>
        //             <td class="action-buttons">
        //                 <button type="submit" class="btn btn-success btn-sm">Save</button>
        //             </td>
        //         </form>
        //     `;

        //     tableBody.appendChild(newRow);

        //     newRow.scrollIntoView({ behavior: 'smooth', block: 'center' });

        //     newRow.querySelector('input').focus();
        // });
        
    // document.getElementById('add-row-btn').addEventListener('click', function () {
    // const tableBody = document.querySelector('#data-table tbody');

    
    // const form = document.createElement('form');
    // form.action = "{{ route('storeList') }}"; 
    // form.method = "POST";
    // form.enctype = "multipart/form-data";

    // form.innerHTML = `
    //     @csrf
    //     <tr>
    //         <td>
    //             <input type="text" name="vaccineId" class="form-control" placeholder="Enter Vaccine Id">
    //         </td>
    //         <td>
    //             <input type="text" name="place" class="form-control" placeholder="Enter Place">
    //         </td>
    //         <td>
    //             <input type="text" name="dateAvailibilityStart" placeholder="Enter Date Start" class="form-control">
    //         </td>
    //         <td>
    //             <input type="text" name="dateAvailibilityEnd" placeholder="Enter Date End" class="form-control">
    //         </td>
    //         <td class="action-buttons">
    //             <button type="submit" class="btn btn-success btn-sm">Save</button>
    //         </td>
    //     </tr>
    // `;


    // tableBody.appendChild(form);

    // form.scrollIntoView({ behavior: 'smooth', block: 'center' });

    // form.querySelector('input').focus();
    // });
    </script>
</body>
</html>
