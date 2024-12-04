<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Places</title>
</head>
<body>
    <h1>Available Places for vaccine dose</h1>

    <!-- Tampilkan daftar tempat -->
    <ul>
        @forelse ($places as $place)
            <li>
                {{ $place->place }}: Available from {{ $place->dateAvailibilityStart }} to {{ $place->dateAvailibilityEnd }}
                <br>
                for dose {{$place->vaccineId}}
            </li>
        @empty
            @if ($message)
            <li>{{$message}}</li>
            @endif
        @endforelse
    </ul>

    <!-- Console log pesan jika ada -->
    @if ($message)
        <script>
            console.log("{{ $message }}");
        </script>
    @endif
</body>
</html>
