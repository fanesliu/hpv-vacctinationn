<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Places</title>
</head>
<body>
    <h1>Available Places for vaccine dose</h1>
    @if (Auth::user()->role =='admin')
    
<a href="/create-appointment"><button type="button" class="btn btn-primary">Create Appointment</button></a>
    
    @endif
    <ul>
        @forelse ($places as $place)
            <li>
                {{ $place->place }}: Available from {{ $place->dateAvailibilityStart }} to {{ $place->dateAvailibilityEnd }}
                <br>
                for dose {{$place->vaccineId}}
            </li>
            <form action="{{ route('appointment.destroy', $place->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @empty
        @endforelse
    </ul>

</body>
</html>
