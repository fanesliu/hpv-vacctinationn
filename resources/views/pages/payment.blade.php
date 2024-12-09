<style>
    body {
    }
    
    .sizing {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #FCF8F4;
    }

    .green {
        background: linear-gradient(to right, #5EB47C, #007D6E);
    }

    .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .sizing {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
    }

    @media (max-width: 576px) {
        .sizing {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    }
</style>

@extends('components.userLayout')
@section('content')
    <div class="py-5 sizing">
        <div class="container">
            <div class="row">
                <!-- Payment Form -->
                <div class="col-md-6">
                    <h3>Payment Information</h3>
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="userName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="userName" name="user_name"
                                placeholder="Enter your name" required>
                        </div>

                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail" name="user_email"
                                placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label for="userPhone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="userPhone" name="user_phone"
                                placeholder="Enter your phone number" required>
                        </div>

                        <div class="mb-3">
                            <label for="paymentMethod" class="form-label">Payment Method</label>
                            <select class="form-select" id="paymentMethod" name="payment_method" required>
                                <option value="" disabled selected>Select a payment method</option>
                                <option value="e-wallet">E-Wallet</option>
                                <option value="virtual-account">Virtual Account</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 green fw-bold">Pay Now</button>
                    </form>
                </div>

                <!-- Invoice -->
                <div class="col-md-6">
                    <h3>Invoice</h3>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Booking Summary</h5>
                            <p class="card-text">
                                <strong>Vaccine Type:</strong> HPV Vaccine<br>
                                <strong>Date:</strong> {{ $booking_date ?? 'Not Set' }}<br>
                                <strong>Time:</strong> {{ $booking_time ?? 'Not Set' }}<br>
                                <strong>Price:</strong> IDR {{ number_format($booking_price ?? 0, 0, ',', '.') }}
                            </p>
                            <hr>
                            <h5>Total: IDR {{ number_format($booking_price ?? 0, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
