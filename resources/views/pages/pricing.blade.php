<style>
    .sizing {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
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
    <section class="hero-section">
        <div class="curved-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">Pricing</h1>
                    <p class="lead">Our services offer comprehensive screenings, consultations, and educational resources
                        tailored to empower
                        individuals in their understanding and management of HPV.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5 sizing">
        <div class="text-center mb-4">
            <small class="text-uppercase text-muted">Pricing</small>
            <h2 class="fw-bold">Choose Mental Health Consultation Packages for Your Needs</h2>
        </div>
        <div class="row g-4">
            <!-- First Dose -->
            @foreach ($vaccines as $item)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100"
                        style="border: 1px solid black; transition: background 0.3s, color 0.3s;"
                        onmouseover="this.style.background='linear-gradient(to bottom, #0E8570, #5DB37C)'; this.style.color='white'; 
                                 this.querySelector('.price').style.color='white'; 
                                 this.querySelector('.description').style.color='white';"
                        onmouseout="this.style.background=''; this.style.color=''; 
                                this.querySelector('.price').style.color=''; 
                                this.querySelector('.description').style.color='';">
                        <div class="card-body text-center">
                            <h5>Dosis ke {{ $item->dose }}</h5>
                            <h2 class="fw-bold price" style="color: black;">Rp
                                {{ number_format($item->price ?? 0, 0, ',', '.') }}</h2>
                            <p class="description" style="color: black;">
                                {{ $item->description }}
                            </p>
                            <a href="{{ route('appointment.view', ['userID' => $userID, 'vaccineID' => $item->vaccineId, 'date' => 0]) }}"
                                class="btn btn-primary px-4"
                                style="background-color: #EC744A; border: none; text-decoration: none; display: inline-block;"
                                onmouseover="this.style.backgroundColor='#D86A3A';"
                                onmouseout="this.style.backgroundColor='#EC744A';">Choose now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
