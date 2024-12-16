<style>
    .mainContainer {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        align-items: center;

        height: 50vh;
        border: 2px solid black;
        border-radius: 10px;
        width: 50%;
        margin: auto;
        background-color: rgba(255, 255, 255, 0.819);
        color: black;

        font-family: "Roboto", sans-serif;
        font-weight: 100;
        font-style: normal;
    }

    .mainContainer p{
        font-weight: 400;
        font-size: 1.5vw;
    }

    .payButton{
        width: 30%;
        padding-top: 2vh;
        padding-bottom: 2vh;
        background-color: #027bff;
        margin: auto;
        color: white;
        border: transparent;
        font-size: 1.5vw;
        border-radius: 20px;
        margin: 0px;
        transition: 0.3s;
        cursor: pointer;
        margin-bottom:5vh;
    }

    .payButton:hover{
        background-color: #0056CC;
        transition: 0.3s;
        border-radius: 10px;
        width: 32%;

    }

    .mainContainer h1{
        font-size: 2vw;
        font-weight: 300;
        width: 100%;
        border-bottom: 2px solid black;
    }

    #dose{
        margin-bottom: 0;
        font-weight: 400;
    }

    #price{
        margin-top: 0.5vh;
    }

    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
        background: linear-gradient(to right, #5EB47C, #007D6E);
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@1,300..900&display=swap"
    rel="stylesheet">

<form id="payment-form" action="{{ route('updateTransaction') }}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="transaction_id" value="{{ $transaction->transactionId }}">
    <input type="hidden" name="status" value="success">
    <input type="hidden" name="payment_type" id="payment_type">
</form>
<div class="card border-0 shadow-sm h-100 main"
    style="border: 1px solid black; background-color: #0E8570; color: white; transition: background 0.3s, color 0.3s; text-align: center;">
    <div class="card-body mainContainer">
        <h1>Transaction Detail</h1>
        <p class="description">
            Vaccine: HPV Vaccine Dose {{ $appointment->vaccineId }}<br>
            Place: {{ $appointment->place }}<br>
            Appointment Date: {{ $transaction->appointmentDate }}
        </p>
        <div>
            <h3 id="dose">Dose {{ $appointment->vaccineId }}</h2>
            <h2 id="price" class="fw-bold price">Rp {{ number_format($transaction->finalPrice ?? 0, 0, ',', '.') }}</h2>        
        </div>
        
        <button id="pay-button" class="payButton">Pay Now</button>
    </div>
</div>


<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
        var snapToken = "{{ $transaction->snap_token }}"; // Ganti dengan token yang valid
        console.log("Snap Token: ", snapToken); // Debugging token

        if (!snapToken) {
            alert("Snap Token tidak valid!");
            return;
        }

        snap.pay(snapToken, {
            onSuccess: function(result) {
                document.getElementById('payment_type').value = result
                    .payment_type; // Set jenis pembayaran
                document.getElementById('payment-form').submit(); // Kirim formulir
            },
            onPending: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            onError: function(result) {
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>
