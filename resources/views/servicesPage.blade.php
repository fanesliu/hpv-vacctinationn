<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <style>
        .navbar {
            background-color: transparent;
            padding: 20px 0;
        }

        .navbar-brand img {
            height: 40px;
        }

        .contact-btn {
            background-color: #FF7F50;
            color: white !important;
            border-radius: 25px;
            padding: 8px 25px;
        }

        .contact-btn:hover {
            background-color: #ffff;
            border: #FF7F50 1px solid;
            color: #FF7F50 !important;
        }

        .hero-section {
            background: linear-gradient(to right, #5EB47C, #007D6E);
            padding: 100px 0;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .curved-line {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 40%;
            height: 100%;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transform: translate(20%, 50%);
        }

        .services-section {
            padding: 80px 0;
        }

        .service-card {
            background: linear-gradient(to bottom, #32EBA9 -50%, #000000 150%);
            color: white;
            padding: 30px;
            border-radius: 15px;
            height: 450px;
            width: 550px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 20px;
        }

        .footer-bg {
            background: linear-gradient(to right, #5EB47C, #007D6E);
            color: white;
            padding: 80px 0;
        }

        .text-body-secondary {
            color: white !important;
        }
    </style>
    <title>Serices - HPV Vaccination</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- <img src="msd-logo.png" alt="MSD Logo"> --}}
                MSD
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Information</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center">
                    <a class="btn contact-btn text-white me-3" href="#">Contact Us</a>
                    <a href="#" class="d-flex align-items-center">
                        <i class="fas fa-user-circle fa-lg">Profile</i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

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

    <footer class="p-5 footer-bg">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Service</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Psychotherapy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Mental Counselling</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Support Groups</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Case Management</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Contact</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">+62 NOMOR FANES</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">MUSAWA@gmail.com</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">SOKIN POSISI</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
                <h5>Links</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Privacy Policy</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Terms Of Use</a></li>
                </ul>
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-primary" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center py-4 my-4 border-top">
            <p>© 2024 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#twitter"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#instagram"></use>
                        </svg></a></li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24">
                            <use xlink:href="#facebook"></use>
                        </svg></a></li>
            </ul>
        </div>
    </footer>

    <script src="{{ asset('bootstrap/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}" defer></script>
</body>

</html>
