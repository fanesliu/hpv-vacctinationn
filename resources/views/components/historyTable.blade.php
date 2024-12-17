<div class="container mt-5">
    <h1 class="text-center mb-4">@lang('messages.history_table')</h1>

    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr>
                <th style="background-color: #159d83">No</th>
                <th style="background-color: #159d83">@lang('messages.price')</th>
                <th style="background-color: #159d83">@lang('messages.payment_type')</th>
                <th style="background-color: #159d83">@lang('messages.payment_date')</th>
                <th style="background-color: #159d83">@lang('messages.appointment_date')</th>
                <th style="background-color: #159d83">@lang('messages.status')</th>
                
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
                <td>{{ $history->status}}</td>
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