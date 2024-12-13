<style>
    .gradasi {
        background: linear-gradient(to right, #5EB47C, #007D6E);
    }

    .smooth {
        scroll-behavior: smooth;
    }

    .orange {
        color: #EC744A;
    }
</style>

@extends('components.userLayout')
@section('content')
    <section class="container py-5 mt-5">
        <div class="row align-items-center">
            {{-- Left Content --}}
            <div class="col-md-6 text-md-start text-center">
                <h1 class="fw-bold">Empowering Health:</h1>
                <p class="fs-4 fw-semibold text-danger">Why Just Survive, When You Can Live Happily.</p>
                <p class="fs-6">Ready to start the journey?</p>
                <a ondblclick="scrollToSection('data')" class="btn text-white fw-semibold smooth"
                    style="background-color: #EC744A;">Get started</a>
            </div>

            {{-- Right Content --}}
            <div class="col-md-6 text-center">
                <img src="{{ asset('assets/cardiologist.png') }}" alt="Health Illustration" class="img-fluid">
            </div>
        </div>
    </section>

    <section class="py-5 gradasi" id="data">
        <div class="container">
            <div class="row text-center text-white">
                <div class="col-md-4">
                    <h5>Cervical Cancer</h5>
                    <h2 class="fw-bold">&gt;95%</h2>
                </div>
                <div class="col-md-4">
                    <h5>Invasive Anal Cancer</h5>
                    <h2 class="fw-bold">88.3%</h2>
                </div>
                <div class="col-md-4">
                    <h5>Vaginal Cancer</h5>
                    <h2 class="fw-bold">74%</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 my-5">
        <div class="container text-center">
            <h6 class="text-uppercase text-muted">Our Mission</h6>
            <h2 class="fw-bold">To make HPV vaccinations accessible and affordable, ensuring that no one faces preventable
                cervical cancer.</h2>
            <div class="row mt-5 align-items-center">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="border rounded p-4 h-100">
                        <img src="{{ asset('assets/leftIcon.png') }}" alt="Icon" class="mb-3">
                        <h5 class="fw-semibold">Improve Accessibility</h5>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="rounded p-4 h-100 text-white gradasi">
                        <img src="{{ asset('assets/middleIcon.png') }}" alt="Icon" class="mb-3">
                        <h5 class="fw-semibold">Increase Awareness</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border rounded p-4 h-100">
                        <img src="{{ asset('assets/rightIcon.png') }}" alt="Icon" class="mb-3">
                        <h5 class="fw-semibold">Reduce Cost Barriers</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about-us" class="py-5 my-5">
        <div class="container">
            <div class="row align-items-center">
                {{-- Left Content --}}
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/heroIcon2.png') }}" alt="Doctor Illustration" class="img-fluid"
                        style="max-height: 400px;">
                </div>
                {{-- Right Content --}}
                <div class="col-lg-6">
                    <h5 class="text-muted">About Us</h5>
                    <h2 class="fw-bold">
                        We are helping women in <br>
                        <span class="orange">27-45 years old</span> to access <br>
                        affordable HPV Vaccination
                    </h2>
                    <p class="mt-3">Want to know more about us?</p>
                    <a href="{{ route('aboutus.view') }}" class="btn text-white fw-semibold"
                        style="background-color: #EC744A;">See
                        detail</a>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    function scrollToSection(sectionId) {
        const targetSection = document.getElementById(sectionId);
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }
</script>
