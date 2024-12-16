<style>
    .martop {
        margin-top: 15rem;
    }
</style>

@extends('components.userLayout')
@section('content')
    <section class="hero-section">
        <div class="curved-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">About Us</h1>
                    <p class="lead">For more than 130 years, we have brought hope to humanity through the development of
                        important medicines and vaccines. We foster a diverse and inclusive global workforce and operate
                        responsibly every day to enable a safe, sustainable and healthy future for all people and
                        communities.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- About Us Section --}}
    <section class="aboutus-section martop">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="assets/aboutUs/aboutus.png" alt="HPV Vaccination" class="img-fluid"
                        style="max-width: 70%; height: auto;" /> <!-- Perbaiki penutupan tag img -->
                </div>
                <div class="col-md-6">
                    <div class="text-left mb-5" style="margin-top: 20px;"> <!-- Menambahkan margin atas -->
                        <h2>About Us</h2>
                        <h2 class="display-5 text-black">We are helping women in 27-45 years old to access affordable HPV
                            Vaccination</h2>
                        <p>At MSD, we specialize in affordable HPV vaccinations for women aged 27-45, fostering health
                            awareness and protection against HPV-related conditions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Card Section --}}
    <section class="campaign-section martop" style="padding: 40px 0; margin-bottom: 15rem">
        <div class="container">
            <h5 class="text-center">Why?</h5>
            <h3 class="text-center">Why Our HPV Awareness Campaign Stands Out</h3>
        </div>

        {{-- Card --}}
        <div class="card-deck" style="display: flex; justify-content: center; gap: 20px; margin-top: 3%">
            <div class="card border border-dark"
                style="background-color: #e8e8e8; color: black; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;"
                onmouseover="this.style.background='linear-gradient(to right, #5EB47C, #007D6E)'; this.style.color='white';"
                onmouseout="this.style.background='#e8e8e8'; this.style.color='black';">
                <img src="assets\aboutUs\1.png" alt="Image 1"
                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-user-shield"></i>
                    <h5 class="card-title">Comprehensive Information</h5>
                    <p class="card-text">We provide detailed insights into HPV, covering everything from symptoms to
                        prevention methods, ensuring a thorough understanding.</p>
                </div>
            </div>
            <div class="card border border-dark"
                style="background-color: #e8e8e8; color: black; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;"
                onmouseover="this.style.background='linear-gradient(to right, #5EB47C, #007D6E)'; this.style.color='white';"
                onmouseout="this.style.background='#e8e8e8'; this.style.color='black';">
                <img src="assets\aboutUs\2.png" alt="Image 2"
                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-user-md"></i>
                    <h5 class="card-title">Trusted Expertise</h5>
                    <p class="card-text">Our team consists of medical professionals and educators dedicated to raising
                        awareness about HPV, offering reliable guidance and support.</p>
                </div>
            </div>
            <div class="card border border-dark"
                style="background-color: #e8e8e8; color: black; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 20px;"
                onmouseover="this.style.background='linear-gradient(to right, #5EB47C, #007D6E)'; this.style.color='white';"
                onmouseout="this.style.background='#e8e8e8'; this.style.color='black'">
                <img src="assets\aboutUs\3.png" alt="Image 3"
                    style="width: 150px; height: 150px; object-fit: cover; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-atom"></i>
                    <h5 class="card-title">Interactive Resources</h5>
                    <p class="card-text">Engaging galleries and interactive tools make learning about HPV an immersive
                        experience, empowering individuals to take proactive steps towards prevention.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
