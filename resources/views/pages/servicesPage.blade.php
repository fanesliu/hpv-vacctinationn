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

    <div class="d-flex justify-content-center align-items-center">
        <h1 class="w-full text-center mt-5">FAQ</h1>
    </div>
    <div class="container mt-3 mb" style="margin-bottom: 10rem;">
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate
                        classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just
                        about
                        any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                        aria-expanded="false" aria-controls="collapseTwo">
                        Accordion Item #2
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate
                        classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just
                        about
                        any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                        aria-expanded="false" aria-controls="collapseThree">
                        Accordion Item #3
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate
                        classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS
                        transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just
                        about
                        any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section style="padding: 80px 0; background-color: #fafafa; padding-bottom: 5rem;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <div style="font-size: 1rem; color: #666; margin-bottom: 15px;">Testimonials</div>
                    <h2 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 40px;">Hearing the words from protected women</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div
                        style="border-radius: 20px; padding: 30px; height: 100%; transition: transform 0.3s ease; background-color: #34b78f; color: white;">
                        <img src="profile-placeholder.jpg" alt="Client"
                            style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-bottom: 20px;">
                        <p style="font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">Affordable and easy HPV vaccination at this clinic was a
                            great experience. I feel informed and protected.</p>
                        <div class="client-info">
                            <div style="font-weight: 600; margin-bottom: 5px;">Samantha</div>
                            <div style="font-size: 0.85rem; opacity: 0.8;">Client</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div
                        style="border-radius: 20px; padding: 30px; height: 100%; transition: transform 0.3s ease; background-color: white; border: 1px solid #eee;">
                        <img src="profile-placeholder.jpg" alt="Client"
                            style="width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin-bottom: 20px;">
                        <p style="font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">Convenient and cheap HPV vaccination service. I'm glad I
                            made the decision and learned about protection.</p>
                        <div class="client-info">
                            <div style="font-weight: 600; margin-bottom: 5px;">George J</div>
                            <div style="font-size: 0.85rem; opacity: 0.8;">Client</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection