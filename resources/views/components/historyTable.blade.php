<div class="container mt-5">
    <h1 class="text-center mb-4">History Table</h1>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th style="background-color: #159d83">No</th>
                <th style="background-color: #159d83">Price</th>
                <th style="background-color: #159d83">Payment Type</th>
                <th style="background-color: #159d83">Payment Date</th>
                <th style="background-color: #159d83">Appointment Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($histories as $history)
            <tr>
                <td>{{$loop -> iteration}}</td>
                <td>{{ $history->finalPrice }}</td>
                <td>{{ $history->paymentType }}</td>
                <td>{{ $history->paymentDate }}</td>
                <td>{{ $history->appointmentDate }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No history data found</td>
            </tr>
            @endforelse
            {{$histories->links()}}
        </tbody>
    </table>
</div>