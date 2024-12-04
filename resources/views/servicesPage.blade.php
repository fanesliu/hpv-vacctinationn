@extends('components.userLayout')
@section('content')
    <section class="hero-section">
        <div class="curved-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">Services</h1>
                    <p class="lead">Our services offer comprehensive screenings, consultations, and educational resources tailored to empower
                        individuals in their understanding and management of HPV.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <div class="text-center mb-5">
                <h1>Services</h1>
                <h2 class="display-5">Use our services to protect our beloved one</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-flex flex-column service-card">
                        <h3>Book an online appointment to get your HPV Vaccine</h3>
                        <a class="btn contact-btn text-white me-3 mt-3">See Detail</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column service-card">
                        <h3>Get the information about HPV</h3>
                        <a class="btn contact-btn text-white me-3 mt-3">See Detail</a>
                    </div>
                </div>
                <div class="col-12 col-md-6 mx-auto mt-3">
                    <div class="d-flex flex-column service-card">
                        <h3>Assess your knowledge about HPV</h3>
                        <a class="btn contact-btn text-white me-3 mt-3">See Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
