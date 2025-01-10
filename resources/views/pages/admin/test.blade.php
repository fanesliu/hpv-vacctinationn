<!-- resources/views/insert.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Insert Data</h2>

    <!-- Display success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <form method="POST" action="{{ route('data.store') }}">
        @csrf
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                </tr>
            @endforeach

            <!-- New Row -->
            @if (session('add_row'))
                <tr>
                    <td>New</td>
                    <td><input type="text" class="form-control" name="name" placeholder="Enter name" required></td>
                    <td><input type="email" class="form-control" name="email" placeholder="Enter email" required></td>
                </tr>
            @endif
            </tbody>
        </table>

        <!-- Buttons -->
        <div class="d-flex">
            <a href="{{ route('data.addRow') }}" class="btn btn-secondary me-2">Add New Row</a>
            @if (session('add_row'))
                <button type="submit" class="btn btn-primary">Save</button>
            @endif
        </div>
    </form>
</div>
</body>
</html>