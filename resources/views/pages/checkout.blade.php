<div class="card border-0 shadow-sm h-100"
     style="border: 1px solid black; background-color: #0E8570; color: white; transition: background 0.3s, color 0.3s; text-align: center;">
    <div class="card-body">
        <h1>Transaction Detail</h1>
        <h2>Dose {{ $appointment->vaccineId }}</h2>
        <h2 class="fw-bold price">Rp
            {{ number_format($transaction->finalPrice ?? 0, 0, ',', '.') }}</h2>
        <p class="description">
            Vaccine: HPV Vaccine Dose {{ $appointment->vaccineId }}<br>
            Place: {{ $appointment->place }}<br>
            Appointment Date: {{$transaction->appointmentDate}}
        </p>
        <button id="pay-button" class="btn btn-primary px-4"
                style="background-color: #EC744A; border: none; text-decoration: none; display: inline-block; padding: 10px 20px; font-size: 16px; border-radius: 5px;"
                onmouseover="this.style.backgroundColor='#D86A3A';"
                onmouseout="this.style.backgroundColor='#EC744A';">Pay Now</button>
    </div>
</div>

<pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{env('MIDTRANS_CLIENT_KEY')}}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        // Pastikan snap_token valid
        var snapToken = "{{$transaction->snap_token}}"; // Ganti dengan token yang valid
        console.log("Snap Token: ", snapToken); // Debugging token

        if (!snapToken) {
            alert("Snap Token tidak valid!");
            return;
        }

        snap.pay(snapToken, {
            // Optional
            onSuccess: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>