<div class="container mt-5">
    <h1 class="text-center mb-4">History Table</h1>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th style="background-color: #159d83">No</th>
                <th style="background-color: #159d83">Name</th>
                <th style="background-color: #159d83">Place</th>
                <th style="background-color: #159d83">Price</th>
                <th style="background-color: #159d83">Dose</th>
                <th style="background-color: #159d83">Appointment Date</th>
                <th style="background-color: #159d83">Payment Type</th>
                <th style="background-color: #159d83">Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Winsen</td>
                <td>Jakarta</td>
                <td>Rp. 120000</td>
                <td>1</td>
                <td>14-Januari-2020</td>
                <td>QRIS</td>
                <td>10-Desember-2019</td>
            </tr>
        </tbody>
        {{-- <tbody>
            @forelse ($histories as $history)
            <tr>    
                <td>{{ $history->id }}</td>
                <td>{{ $history->user_id }}</td>
                <td>{{ $history->action }}</td>
                <td>{{ $history->description }}</td>
                <td>{{ $history->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">No history data found</td>
            </tr>
            @endforelse
        </tbody> --}}
    </table>
</div>