<style>
    .calendar-section {
        padding: 50px 0;
        background-color: #fafafa;
    }

    .calendar-container {
        max-width: 400px;
        margin: 0 auto;
    }

    .calendar-header {
        margin-bottom: 30px;
    }

    .calendar {
        background: linear-gradient(to bottom, #34b78f, #2a8e6f);
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .month-name {
        color: white;
        text-align: center;
        margin-bottom: 15px;
        font-weight: 500;
    }

    .calendar-grid {
        background-color: #e8f5f0;
        border-radius: 15px;
        padding: 15px;
    }

    .weekdays {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        text-align: center;
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 10px;
    }

    .days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        text-align: center;
    }

    .day {
        padding: 8px;
        font-size: 0.9rem;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .day:hover {
        background-color: #d4e9e2;
    }

    .check-btn {
        background-color: #ff7f50;
        color: white;
        border: none;
        padding: 8px 25px;
        border-radius: 25px;
        font-size: 0.9rem;
        margin-top: 30px;
        transition: background-color 0.3s;
    }

    .check-btn:hover {
        background-color: #ff6b3d;
    }
</style>

@extends('components.userLayout')
@section('content')
    <section class="hero-section">
        <div class="curved-line"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 mb-4">Book an Online Appointment</h1>
                    <p class="lead">Our services offer comprehensive screenings, consultations, and educational resources tailored to empower
                        individuals in their understanding and management of HPV.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="calendar-section">
        <div class="container">
            <div class="calendar-container">
                <div class="calendar-header">
                    <h2>Secure the date</h2>
                </div>

                <div class="calendar">
                    <div class="month-name">March</div>
                    <div class="calendar-grid">
                        <div class="weekdays">
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                            <div>Sun</div>
                        </div>
                        <div class="days">
                            <div class="day"></div>
                            <div class="day"></div>
                            <div class="day">1</div>
                            <div class="day">2</div>
                            <div class="day">3</div>
                            <div class="day">4</div>
                            <div class="day">5</div>
                            <div class="day">6</div>
                            <div class="day">7</div>
                            <div class="day">8</div>
                            <div class="day">9</div>
                            <div class="day">10</div>
                            <div class="day">11</div>
                            <div class="day">12</div>
                            <div class="day">13</div>
                            <div class="day">14</div>
                            <div class="day">15</div>
                            <div class="day">16</div>
                            <div class="day">17</div>
                            <div class="day">18</div>
                            <div class="day">19</div>
                            <div class="day">20</div>
                            <div class="day">21</div>
                            <div class="day">22</div>
                            <div class="day">23</div>
                            <div class="day">24</div>
                            <div class="day">25</div>
                            <div class="day">26</div>
                            <div class="day">27</div>
                            <div class="day">28</div>
                            <div class="day">29</div>
                            <div class="day">30</div>
                            <div class="day">31</div>
                        </div>
                    </div>
                </div>

                {{-- <form action="{{ route('appointment.view') }}" method="POST">
                    @csrf
                    <input type="hidden" name="selected_date" id="selected-date">
                    <div class="text-center">
                        <button type="submit" class="check-btn">Check availability</button>
                    </div>
                </form> --}}
            </div>
        </div>
    </section>

    <h1>Available Places for vaccine dose</h1>

    <!-- Tampilkan daftar tempat -->
    <ul>
        @forelse ($places as $place)
            <li>
                {{ $place->place }}: Available from {{ $place->dateAvailibilityStart }} to {{ $place->dateAvailibilityEnd }}
                <br>
                for dose {{ $place->vaccineId }}
            </li>
        @empty
            @if ($message)
                <li>{{ $message }}</li>
            @endif
        @endforelse
    </ul>

    <!-- Console log pesan jika ada -->
    @if ($message)
        <script>
            console.log("{{ $message }}");
        </script>
    @endif

    <script>
        document.querySelectorAll('.day').forEach(day => {
            day.addEventListener('click', function() {
                document.querySelectorAll('.day').forEach(d => d.style.backgroundColor = '');
                this.style.backgroundColor = '#d4e9e2';
                document.getElementById('selected-date').value = this.getAttribute('data-date');
            });
        });
    </script>
@endsection
