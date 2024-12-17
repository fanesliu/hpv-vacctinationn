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
                    <h1 class="display-4 mb-4">@lang('messages.title_aboutUs')</h1>
                    <p class="lead">@lang('messages.subtitle_aboutUs')</p>
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
                        <h2>@lang('messages.section1_aboutUs')</h2>
                        <h2 class="display-5 text-black">@lang('messages.subsection1_aboutUs')</h2>
                        <p>@lang('messages.subsection2_aboutUs')</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Card Section --}}
    <section class="campaign-section martop" style="padding: 40px 0; margin-bottom: 15rem">
        <div class="container">
            <h5 class="text-center">@lang('messages.section2_aboutUs')</h5>
            <h3 class="text-center">@lang('messages.titleSection2_aboutUs')</h3>
        </div>

        {{-- Card --}}
        <div class="card-deck" style="display: flex; justify-content: center; gap: 20px; margin-top: 3%">
            <div class="card border border-dark"
                style="background-color: transparent; color: black; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 4vh; padding-bottom: 4vh; font-size: 1vw;">
                <img src="assets\aboutUs\1.png" alt="Image 1" 
                    style="width: 150px; height: 150px; object-fit: cover;width:5vw;height:auto; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-user-shield"></i>
                    <h5 class="card-title" style="font-size: 1.2vw;">@lang('messages.section2_a')</h5>
                    <p class="card-text" style="font-size:1vw;">@lang('messages.section2_aDescription')</p>
                </div>
            </div>
            <div class="card border border-dark"
                style="background-color: #e8e8e8; color: white; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 4vh; padding-bottom: 4vh; font-size: 1vw; background: linear-gradient(to right, #5EB47C, #007D6E);">
                <img src="assets\aboutUs\2.png" alt="Image 2"
                    style="width: 150px; height: 150px; object-fit: cover; width:5vw;height:auto; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-user-md"></i>
                    <h5 class="card-title" style="font-size: 1.2vw;">@lang('messages.section2_b')</h5>
                    <p class="card-text" style="font-size:1vw;">@lang('messages.section2_bDescription')</p>
                </div>
            </div>
            <div class="card border border-dark"
                style="background-color: transparent; color: black; border: none; border-radius: 8px; width: 350px; height: 350px; display: flex; flex-direction: column; justify-content: center; align-items: center; padding-top: 4vh; padding-bottom: 4vh; font-size: 1vw;">
                <img src="assets\aboutUs\3.png" alt="Image 3"
                    style="width: 150px; height: 150px; object-fit: cover; width:5vw;height:auto; border-radius: 8px; margin-bottom: 10px;">
                <div class="card-body" style="text-align: center;">
                    <i class="fas fa-atom" ></i>
                    <h5 class="card-title" style="font-size: 1.2vw;">@lang('messages.section2_c')</h5>
                    <p class="card-text" style="font-size:1vw;">@lang('messages.section2_cDescription')</p>
                </div>
            </div>
        </div>
    </section>
@endsection
