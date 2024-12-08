@extends('components.userLayout')
@section('content')
    <section class="hero-section">
        <div class="curved-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">Pricing</h1>
                    <p class="lead">Our services offer comprehensive screenings, consultations, and educational resources tailored to empower
                        individuals in their understanding and management of HPV.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="text-center mb-4">
            <small class="text-uppercase text-muted">Pricing</small>
            <h2 class="fw-bold">Choose Mental Health Consultation Packages for Your Needs</h2>
        </div>
        <div class="row g-4">
            <!-- First Dose -->
            @foreach ($vaccines as $item)
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <h5>Dosis ke {{ $item->dose }}</h5>
                        <h2 class="fw-bold text-primary">{{ $item->price }}</h2>
                        <p class="text-muted">
                            {{ $item->description }}
                        </p>
                        <button class="btn btn-primary px-4">Choose now</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
