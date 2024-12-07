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

    @foreach ($vaccines as $item)
        <h1>dosis ke {{ $item->dose }} dengan harga {{ $item->price }}</h1>
    @endforeach
@endsection
