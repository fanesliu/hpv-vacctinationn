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

    .martop {
        margin-top: 15rem;
    }

    .hero {
        background: linear-gradient(to right, #5EB47C, #007D6E);
        padding: 1rem 0;
        color: white;
        position: relative;
    }

    .posisi {
        position: relative;
        top: -15rem;
    }

    .goals-section {
        max-width: 700px;
        padding: 40px;
    }

    .middle {
        align-items: center;
    }

    .goals-section h3 {
        font-size: 1.5rem;
        font-weight: normal;
        margin-bottom: 1.5rem;
    }

    .goals-section h1 {
        font-size: 3.5rem;
        font-weight: normal;
        margin-bottom: 30px;
    }

    .goal-item {
        display: flex;
        align-items: center;
        margin-top: 4rem;
        margin-bottom: 1.5rem;
    }

    .goal-item img {
        width: 50px;
        height: 50px;
        margin-right: 15px;
    }

    .goal-item h5 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .goal-item p {
        font-size: 1rem;
        font-weight: 100;
        margin: 0;
    }

    .gallery-section {
        margin: 10rem 0;
    }

    .overlay {
        position: absolute;
        /* Menjadikan layer menutupi gambar sepenuhnya */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Layer hitam dengan transparansi */
        z-index: 1;
        /* Pastikan layer berada di atas gambar */
    }

    .gallery-title {
        text-align: center;
        margin-bottom: 20px;
    }

    .gallery-description {
        text-align: center;
        margin-bottom: 40px;
        font-size: 1.1em;
        color: #6c757d;
    }

    .gallery-item {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .tengah {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .gallery-item:hover {
        transform: scale(1.05);
    }

    .cover {
        object-fit: cover;
    }

    .info-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: white;
        padding: 10px;
        border-radius: 10px;
        z-index: 2;
    }
</style>

@extends('components.userLayout')
@section('content')
{{-- Hero Section --}}
<section class="container py-5 mt-5">
    <div class="row align-items-center">
        {{-- Left Content --}}
        <div class="col-md-6 text-md-start text-center">
            <h1 class="fw-bold">
                @lang('messages.label_sub_judul1')
            </h1>
            <p class="fs-4 fw-semibold text-danger">@lang('messages.label_description1')</p>
            <p class="fs-6">@lang('messages.label_description2')</p>
            <a ondblclick="scrollToSection('data')" class="btn text-white fw-semibold smooth"
                style="background-color: #EC744A;" href="{{route('pricing.view')}}">@lang('messages.btn_get_started')</a>
        </div>

        {{-- Right Content --}}
        <div class="col-md-6 text-center">
            <img src="{{ asset('assets/cardiologist.png') }}" alt="Health Illustration" class="img-fluid">
        </div>
    </div>
</section>

{{-- Data Section --}}
<section class="py-5 gradasi" id="data">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-md-4">
                <h5>@lang('messages.label1')</h5>
                <h2 class="fw-bold">&gt;95%</h2>
            </div>
            <div class="col-md-4">
                <h5>@lang('messages.label2')</h5>
                <h2 class="fw-bold">88.3%</h2>
            </div>
            <div class="col-md-4">
                <h5>@lang('messages.label3')</h5>
                <h2 class="fw-bold">74%</h2>
            </div>
        </div>
    </div>
</section>

{{-- Mission Section --}}
<section class="py-5 martop">
    <div class="container text-center">
        <h6 class="text-uppercase text-muted">@lang('messages.label_section1')</h6>
        <h2 class="fw-bold">@lang('messages.label_subsection1')</h2>
        <div class="row mt-5 align-items-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="border border-2 border-dark rounded p-4 h-100">
                    <img src="{{ asset('assets/leftIcon.png') }}" alt="Icon" class="mb-3">
                    <h5 class="fw-semibold">@lang('messages.section1_mission1')</h5>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="border border-3 border-dark rounded p-4 h-100 w-auto text-white gradasi">
                    <img src="{{ asset('assets/middleIcon.png') }}" alt="Icon" class="mb-3">
                    <h5 class="fw-semibold">@lang('messages.section1_mission2')</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="border border-2 border-dark rounded p-4 h-100">
                    <img src="{{ asset('assets/rightIcon.png') }}" alt="Icon" class="mb-3">
                    <h5 class="fw-semibold">@lang('messages.section1_mission3')</h5>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Us Section --}}
<section id="about-us" class="martop">
    <div class="container">
        <div class="row align-items-center">
            {{-- Left Content --}}
            <div class="col-lg-6 text-center">
                <img src="{{ asset('assets/heroIcon2.png') }}" alt="Doctor Illustration" class="img-fluid"
                    style="max-height: 400px;">
            </div>
            {{-- Right Content --}}
            <div class="col-lg-6">
                <h5 class="text-muted">@lang('messages.label_section2')</h5>
                <h2 class="fw-bold">
                    @lang('messages.label_subsection2')
                </h2>
                <p class="mt-3">@lang('messages.label_question2')</p>
                <a href="{{ route('aboutus.view') }}" class="btn text-white fw-semibold"
                    style="background-color: #EC744A;">@lang('messages.btn_detail')</a>
            </div>
        </div>
    </div>
</section>

{{-- Goals Section --}}
<section class="py-5 martop">
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6 posisi z-10">
                    <img src="{{ asset('assets/suntikIcon.png') }}" alt="suntik icon" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex middle">
                    <div class="goals-section">
                        <h3>@lang('messages.goals')</h3>
                        <h1>@lang('messages.goals_description')</h1>
                        <div class="goal-item">
                            <img src="{{ asset('assets/tanamanVector.png') }}" alt="Easily Accessible Icon">
                            <div>
                                <h5>@lang('messages.goals_title1')</h5>
                                <p>@lang('messages.goals_title2')</p>
                            </div>
                        </div>
                        <div class="goal-item">
                            <img src="{{ asset('assets/orangVector.png') }}" alt="Increase Awareness Icon">
                            <div>
                                <h5>@lang('messages.goals_desc1')</h5>
                                <p>@lang('messages.goals_desc2')</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Gallery Section --}}
<div class="container gallery-section">
    <h1 class="gallery-title">@lang('messages.label_section3')</h1>
    <p class="gallery-description">@lang('messages.label_subsection3')</p>

    <div class="row">
        <div class="col-md-3">
            <div class="gallery-item">
                <img src="{{ asset('assets/photo4.png') }}" class="img-fluid cover" alt="Purple Ribbon"
                    style="height: 300px;">
                <div class="overlay"></div>
                <div class="info-text">
                    <h5>@lang('messages.section3_title1')</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="gallery-item">
                <img src="{{ asset('assets/photo2.png') }}" class="img-fluid cover" alt="HPV"
                    style="height: 300px;">
                <div class="overlay"></div>
                <div class="info-text">
                    <h3>HPV</h3>
                    <p>@lang('messages.section3_subtitle2')</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="gallery-item">
                <img src="{{ asset('assets/photo3.png') }}" class="img-fluid cover" alt="Vaccine"
                    style="height: 300px;">
                <div class="overlay"></div>
                <div class="info-text">
                    <h5>@lang('messages.section3_title3')</h5>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- FAQ Section --}}
<div class="d-flex justify-content-center align-items-center">
    <h1 class="w-full text-center mt-5">FAQ</h1>
</div>
<div class="container mt-3 mb" style="margin-bottom: 10rem;">
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    @lang('messages.heading1')
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @lang('messages.body1')
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    @lang('messages.heading2')
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @lang('messages.body2') </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    @lang('messages.heading3') </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    @lang('messages.body3')</div>
            </div>
        </div>
    </div>
</div>
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