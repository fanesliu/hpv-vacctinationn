@extends('components.userLayout')
@section('content')
<section class="hero-section">
    <div class="curved-line"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4 mb-4">@lang('messages.title_service')</h1>
                <p class="lead">@lang('messages.subtitle_service')</p>
            </div>
        </div>
    </div>
</section>

{{-- Services Section --}}
<section class="services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h1>@lang('messages.section1_service')</h1>
            <h2 class="display-5">@lang('messages.subsection1_service')</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex flex-column service-card">
                    <h3>@lang('messages.section1_a')</h3>
                    <a href="{{route('pricing.view')}}" class="btn contact-btn text-white me-3 mt-3">@lang('messages.buttonServices')</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-column service-card">
                    <h3>@lang('messages.section1_b')</h3>
                    <a href="{{route('aboutus.view')}}" class="btn contact-btn text-white me-3 mt-3">@lang('messages.buttonServices')</a>
                </div>
            </div>
            <div class="col-12 col-md-6 mx-auto mt-3">
                <div class="d-flex flex-column service-card">
                    <h3>@lang('messages.section1_c')</h3>
                    <a href="{{route('aboutus.view')}}" class="btn contact-btn text-white me-3 mt-3">@lang('messages.buttonServices')</a>
                </div>
            </div>
        </div>
    </div>
</section>

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

@include('components.testimoni')
@endsection