<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Appointment Page</title>
    <style>
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
    </style>
</head>

<body>
    <nav class="bg-transparent py-5">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-lg font-bold" href="#">MSD</a>
            <button data-collapse-toggle="navbar-default" class="lg:hidden text-gray-500">
                <span class="material-icons">menu</span>
            </button>
            <ul class="flex space-x-6 mx-auto">
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ route('homepage') }}">Home</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ route('aboutus.view') }}">About</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ route('service.view') }}">Services</a></li>
                <li><a class="text-gray-700 hover:text-gray-900" href="{{ route('pricing.view') }}">Get Vaccine</a></li>

                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                    class="flex items-center justify-between w-full py-2 px-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-black md:p-0 md:w-auto dark:text-white md:dark:hover:text-black dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdownNavbar"
                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Indonesia</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">English</a>
                        </li>
                    </ul>
                </div>
            </ul>
            <div class="flex items-center space-x-4">
                <a class="bg-orange-400 text-white rounded-full px-6 py-2 hover:bg-white hover:text-orange-400 border border-orange-400"
                    href="{{ route('profile') }}">Profile</a>
                <a class="bg-orange-400 text-white rounded-full px-6 py-2 hover:bg-white hover:text-orange-400 border border-orange-400"
                    href="#">Logout</a>
            </div>
        </div>
    </nav>
    <section class="relative bg-gradient-to-r from-green-400 to-green-600 text-white py-20 overflow-hidden">
        <div class="curved-line"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-xl">
                <h1 class="text-4xl font-bold mb-6">Book an Online Appointment</h1>
                <p class="text-lg leading-relaxed">
                    @lang('test.appointmentDesc')
                </p>
            </div>
        </div>
    </section>

    <section class="bg-gray-50 py-32 min-h-screen">
        <div class="container mx-auto flex flex-col lg:flex-row items-start justify-between gap-8">
            <!-- Left Column -->
            <div class="lg:w-1/2 space-y-6 sticky top-0 pt-4 z-10">
                <h1 class="text-4xl font-bold">Book an Online Appointment</h1>
                <div>
                    <label for="datepicker" class="block text-lg font-medium text-gray-700">Select a date</label>
                    <div id="datepicker-inline" name="appointment_date" inline-datepicker datepicker-format="dd-mm-yyyy"
                        data-date="{{ $dateSekarang }}-{{ $monthSekarang }}-{{ $yearSekarang }}"></div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="lg:w-1/2 space-y-6">
                <h1 class="text-4xl font-bold">Available Places for Vaccine Dose</h1>
                <ul class="space-y-4 listData" id="placesList">
                    @forelse ($places as $place)
                        <li
                            class="bg-orange-400 shadow-lg p-4 rounded-md border border-gray-200 text-white flex justify-between items-center">
                            <div>
                                <p>
                                    <span class="font-bold">{{ $place->place }}</span>: Available from
                                    <span class="font-bold">{{ $place->dateAvailibilityStart }}</span> to
                                    <span class="font-bold">{{ $place->dateAvailibilityEnd }}</span>
                                </p>
                                <p>For dose <span class="font-semibold">{{ $place->vaccineId }}</span></p>
                            </div>
                            <form method="POST" action="{{ route('createTransaction') }}">
                                @csrf
                                <input type="hidden" name="appointmentId" value="{{ $place->appointmentId }}">
                                <input type="hidden" name="finalPrice" value="{{ $place->vaccine->price }}">
                                <input type="hidden" name="paymentType" value="credit_card">
                                <input type="hidden" name="appointmentDate" value="{{ $date }}"
                                    id="appointmentDateInput"> <!-- Tanggal janji temu statis -->
                                <input type="hidden" name="paymentDate" value="{{ $today }}"
                                    id="paymentDateInput">
                                <button type="submit">Book</button>
                            </form>
                        </li>
                    @empty
                        @if ($message)
                            <li class="text-red-500 font-medium">{{ $message }}</li>
                        @endif
                    @endforelse
                </ul>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {

                    const vaccineId = @json($vaccineId); // Menggunakan json_encode untuk mengeluarkan nilai

                    const datepicker = document.querySelector('[inline-datepicker]');

                    datepicker.addEventListener('changeDate', function(event) {
                        // Get the selected date
                        const selectedDate = event.detail.date; // Ambil tanggal yang dipilih
                        const selectedDay = selectedDate.getDate(); // Ambil hanya hari
                        const selectedMonth = selectedDate.getMonth() + 1; // Ambil bulan
                        const selectedYear = selectedDate.getFullYear();

                        const formattedDay = String(selectedDay);
                        const formattedMonth = String(selectedMonth);
                        const formattedYear = String(selectedYear);

                        // Construct the new URL
                        const newUrl =
                            `/appointment/${vaccineId}/${formattedDay}/${formattedMonth}/${formattedYear}`; // Hanya menggunakan hari
                        window.location.href = newUrl; // Redirect to the new URL
                    });
                });
            </script>
    </section>

    <footer class="bg-gradient-to-r from-green-400 to-teal-600 text-white py-20">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Service Section -->
            <div>
                <h5 class="font-bold text-lg mb-4">Service</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white hover:text-gray-300">Psychotherapy</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Mental Counselling</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Support Groups</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Case Management</a></li>
                </ul>
            </div>

            <!-- Contact Section -->
            <div>
                <h5 class="font-bold text-lg mb-4">Contact</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white hover:text-gray-300">+62 NOMOR FANES</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">MUSAWA@gmail.com</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">SOKIN POSISI</a></li>
                </ul>
            </div>

            <!-- Links Section -->
            <div>
                <h5 class="font-bold text-lg mb-4">Links</h5>
                <ul class="space-y-2">
                    <li><a href="#" class="text-white hover:text-gray-300">Privacy Policy</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Terms Of Use</a></li>
                </ul>
            </div>

            <!-- Newsletter Section -->
            <div class="md:col-span-2 lg:col-span-1">
                <h5 class="font-bold text-lg mb-4">Subscribe to our newsletter</h5>
                <p class="mb-4">Monthly digest of what's new and exciting from us.</p>
                <form class="flex flex-col sm:flex-row gap-2">
                    <input type="text" placeholder="Email address"
                        class="px-4 py-2 rounded-md text-gray-700 focus:ring focus:ring-green-300 outline-none">
                    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer Bottom Section -->
        <div class="mt-8 pt-8 border-t border-white flex flex-col sm:flex-row justify-center items-center gap-4">
            <p>© 2024 Company, Inc. All rights reserved.</p>
            <ul class="flex space-x-4 mt-4 sm:mt-0">
                <li>
                    <a href="#" class="text-white hover:text-gray-300">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M24 4.56c-.89.39-1.84.65-2.85.77a4.92 4.92 0 002.15-2.72 9.85 9.85 0 01-3.13 1.2 4.92 4.92 0 00-8.38 4.48 13.94 13.94 0 01-10.11-5.13 4.92 4.92 0 001.52 6.57 4.91 4.91 0 01-2.23-.61v.06a4.92 4.92 0 003.95 4.83 4.92 4.92 0 01-2.22.08 4.92 4.92 0 004.6 3.41 9.86 9.86 0 01-6.1 2.1A9.94 9.94 0 010 21.54a13.94 13.94 0 007.56 2.22c9.05 0 14-7.49 14-14 0-.21 0-.42-.01-.63a10.01 10.01 0 002.46-2.54z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white hover:text-gray-300">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M12 2.04c-5.5 0-10 4.49-10 10.02 0 4.41 3.66 8.62 8.24 10.02v-7.1h-2.5v-2.9h2.5v-2.18c0-2.43 1.44-3.77 3.63-3.77 1.05 0 2.14.18 2.14.18v2.4h-1.21c-1.2 0-1.57.74-1.57 1.5v1.86h2.7l-.43 2.9h-2.27v7.1c4.59-1.4 8.24-5.61 8.24-10.02 0-5.53-4.5-10.02-10-10.02z" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-white hover:text-gray-300">
                        <svg class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path
                                d="M22.54 6.42a8.07 8.07 0 01-2.35.64 4.11 4.11 0 001.8-2.27 8.09 8.09 0 01-2.57.98 4.08 4.08 0 00-7.05 3.72 11.57 11.57 0 01-8.4-4.26 4.08 4.08 0 001.26 5.44 4.07 4.07 0 01-1.84-.5v.05a4.08 4.08 0 003.27 4 4.09 4.09 0 01-1.83.07 4.09 4.09 0 003.81 2.83 8.17 8.17 0 01-5.05 1.74 8.27 8.27 0 01-.98-.06 11.57 11.57 0 006.29 1.84c7.54 0 11.67-6.24 11.67-11.67 0-.18-.01-.36-.02-.53a8.3 8.3 0 002.05-2.12z" />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </footer>

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
