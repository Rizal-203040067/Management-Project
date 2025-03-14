<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Management Project</title>
</head>

{{-- Sinkronasi dark mode --}}
<script>
    (function() {
        var filamentTheme = localStorage.getItem("theme") || "light";
        if (filamentTheme === "dark") {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    })();
</script>

<body>

    <nav
        class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600 shadow-md">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-3">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://img.icons8.com/?size=100&id=106592&format=png&color=6B21A8" class="h-8"
                    alt="Logo">
                <span
                    class="self-center text-2xl font-bold whitespace-nowrap dark:text-white text-purple-700">OnProject</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="mr-2">
                    <button id="theme-toggle" type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                {{-- Authentication for admin --}}
                @if (Route::has('login'))
                    @auth
                        <a href="/admin">
                            <button type="button"
                                class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                Dashboard
                            </button>
                        </a>
                    @else
                        <div>
                            <a href="/admin/login">
                                <button type="button"
                                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                    Log in
                                </button>
                            </a>

                            <!-- Register untuk saat ini tidak dibutuhkan, karena akun akan dibuatkan oleh admin. Namun bisa dijalankan jika sewaktu-waktu dibutuhkan  -->
                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}">
                                    <button type="button"
                                        class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                        Register
                                    </button>
                                </a>
                            @endif --}}
                        </div>
                    @endauth
                @endif
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                    id="navbar">
                    <li>
                        <a href="#home"
                            class="nav-link block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="#about"
                            class="nav-link block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#services"
                            class="nav-link block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#projects"
                            class="nav-link block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Projects</a>
                    </li>
                    <li>
                        <a href="#contact"
                            class="nav-link block py-2 px-3 text-gray-900 rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-purple-700 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <main class="pt-16">
        <!-- Home Section -->
        <section
            class="bg-gradient-to-r from-purple-700 to-indigo-700 dark:from-indigo-900 dark:to-gray-900 min-h-screen flex items-center"
            id="home">
            <div class="max-w-screen-xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between">
                <!-- Left Section -->
                <div class="text-white text-center md:text-left md:w-1/2">
                    <h1 class="text-6xl md:text-7xl font-extrabold leading-tight">
                        On Project
                    </h1>
                    <h2 class="text-2xl md:text-3xl mt-4 font-light">
                        From Concept to Reality, We Build Websites and Apps that Elevate Your Business!
                    </h2>
                    <button
                        class="mt-6 px-6 py-3 bg-white text-purple-700 font-semibold text-lg rounded-lg shadow-lg transition-transform transform hover:scale-105 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
                        Get Started 🚀
                    </button>
                </div>

                <!-- Right Section -->
                <div class="mt-12 md:mt-0 md:w-1/2 flex justify-center">
                    <img class="h-80 md:h-96 shadow-2xl rounded-full transform hover:scale-105 transition-transform duration-300 dark:shadow-gray-700"
                        src="https://img.freepik.com/free-vector/man-shows-gesture-great-idea_10045-637.jpg?t=st=1740373087~exp=1740376687~hmac=4c4f432eaf022dfe9d64e35a6d87280a081bc3008a0be12ba4e5a6f92682afcd&w=740"
                        alt="Great Idea">
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="bg-gray-100 dark:bg-gray-900 py-16" id="about">
            <div class="max-w-screen-xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-800 dark:text-white">Why Choose On Project?</h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">We turn ideas into reality with the best
                        solutions.</p>
                </div>
                <div class="flex flex-wrap items-center justify-center space-y-6 md:space-y-0 md:space-x-12">
                    <!-- Left Section -->
                    <div class="flex-1 max-w-lg space-y-4">
                        <div
                            class="flex items-start space-x-4 bg-white p-4 rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-300">
                            <div class="text-blue-600 dark:text-blue-400 text-2xl">🔥</div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Modern Design</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">We ensure an aesthetic and
                                    responsive interface.</p>
                            </div>
                        </div>
                        <div
                            class="flex items-start space-x-4 bg-white p-4 rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-300">
                            <div class="text-green-600 dark:text-green-400 text-2xl">⚙️</div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Latest Technology</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Utilizing cutting-edge frameworks
                                    and tools for optimal results.</p>
                            </div>
                        </div>
                        <div
                            class="flex items-start space-x-4 bg-white p-4 rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-300">
                            <div class="text-purple-600 dark:text-purple-400 text-2xl">🎯</div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Custom Solutions</h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">Every project is tailored to meet
                                    your unique needs.</p>
                            </div>
                        </div>
                        <div
                            class="flex items-start space-x-4 bg-white p-4 rounded-lg shadow-md dark:bg-gray-800 dark:text-gray-300">
                            <div class="text-purple-600 dark:text-purple-400 text-2xl">🤝</div>
                            <div>
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white">Professional Support
                                </h3>
                                <p class="text-gray-600 dark:text-gray-400 text-sm">We are always ready to assist and
                                    provide the best solutions.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Right Section -->
                    <div class="flex-1 max-w-lg">
                        <div
                            class="bg-white p-6 rounded-lg shadow-lg text-gray-800 dark:bg-gray-800 dark:text-gray-300 text-lg space-y-4">
                            <p>
                                <strong>On Project</strong> is your best solution to turn ideas into reality! We
                                specialize in digital projects,
                                including professional website development, custom app creation, and innovative
                                technology solutions.
                            </p>
                            <p>
                                With an experienced and dedicated team, we are committed to delivering products that are
                                not only functional
                                but also modern, user-friendly, and impactful.
                            </p>
                            <p class="font-semibold">At On Project, we bring your ideas and innovations to life! 💡✨
                            </p>
                            <p class="text-blue-600 dark:text-blue-400 font-semibold">📩 Contact us today and start
                                building your dream project!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        {{-- Our Services --}}
        <section class="bg-gradient-to-r from-purple-700 to-indigo-700 dark:from-indigo-900 dark:to-gray-900"
            id="services">
            <div class="flex flex-wrap max-w-screen-xl items-center justify-between mx-auto py-16 px-3">
                <div class="text-white text-center">
                    <h2 class="text-4xl font-bold mb-6">Our Services</h2>
                    <p class="text-lg mb-10">We provide high-quality digital solutions to help businesses grow and
                        succeed.</p>
                    <div class="grid md:grid-cols-3 gap-8">
                        <div
                            class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-6 rounded-lg shadow-lg text-center">
                            <img src="https://img.icons8.com/?size=100&id=o61mbb0KJS0f&format=png&color=000000"
                                class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-2xl font-bold mb-3">Website Development</h3>
                            <p>Modern, responsive, and high-performance websites tailored to your needs.</p>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-6 rounded-lg shadow-lg text-center">
                            <img src="https://img.icons8.com/?size=100&id=AdFwQQh2ivkP&format=png&color=000000"
                                class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-2xl font-bold mb-3">Mobile & Web Apps</h3>
                            <p>We build custom mobile and web applications with cutting-edge technology.</p>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-800 text-gray-900 dark:text-white p-6 rounded-lg shadow-lg text-center">
                            <img src="https://img.icons8.com/?size=100&id=5thC4pszf5Bn&format=png&color=000000"
                                class="w-24 h-24 mx-auto mb-4">
                            <h3 class="text-2xl font-bold mb-3">UI/UX Design</h3>
                            <p>Creating intuitive and visually appealing designs for the best user experience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-100 dark:bg-gray-900 py-16" id="projects">
            <div class="max-w-screen-xl mx-auto px-6 text-center">
                <h2 class="text-4xl font-bold text-gray-800 dark:text-white">Our Projects</h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 mt-2">Explore some of our latest and innovative
                    projects.</p>

                <!-- Grid Project -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Project 1 -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                        <img src="https://themewagon.com/wp-content/uploads/2020/12/eflyer.jpg" alt="Project 1"
                            class="w-full h-56 object-cover">
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">E-Commerce Website</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                A modern online store with a seamless shopping experience.
                            </p>
                            <a href="#"
                                class="text-purple-600 dark:text-purple-400 font-semibold mt-3 inline-block">View
                                Details
                                →</a>
                        </div>
                    </div>

                    <!-- Project 2 -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                        <img src="https://s3-alpha.figma.com/hub/file/4210100113/701f36a5-4b41-42b2-8e5f-e5b2039f6c73-cover.png"
                            alt="Project 2" class="w-full h-56 object-cover">
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Mobile App Development</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                A powerful mobile app designed for productivity and efficiency.
                            </p>
                            <a href="#"
                                class="text-purple-600 dark:text-purple-400 font-semibold mt-3 inline-block">View
                                Details
                                →</a>
                        </div>
                    </div>

                    <!-- Project 3 -->
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                        <img src="https://www.jagoanhosting.com/blog/wp-content/uploads/2024/04/image-115.png"
                            alt="Project 3" class="w-full h-56 object-cover">
                        <div class="p-5">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-white">Admin Dashboard</h3>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">
                                A custom-built dashboard for business insights and analytics.
                            </p>
                            <a href="#"
                                class="text-purple-600 dark:text-purple-400 font-semibold mt-3 inline-block">View
                                Details
                                →</a>
                        </div>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="#"
                        class="px-6 py-3 bg-purple-700 dark:bg-purple-800 text-white font-semibold text-lg rounded-lg shadow-lg hover:bg-purple-800 dark:hover:bg-purple-900 transition">View
                        More Projects</a>
                </div>
            </div>
        </section>


        <section
            class="bg-gradient-to-r from-purple-700 to-indigo-700 dark:from-indigo-900 dark:to-gray-900 py-16 text-white"
            id="contact">
            <div class="max-w-screen-xl mx-auto px-6">
                <h2 class="text-4xl font-bold text-center">Get in Touch</h2>
                <p class="text-lg text-center text-gray-200 dark:text-gray-300 mt-2">
                    We'd love to hear from you! Reach out to us for any inquiries.
                </p>
                <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-10">
                    <div class="bg-purple-800 dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold mb-6">Contact Information</h3>
                        <p class="text-gray-300 dark:text-gray-400 mb-6 text-lg">
                            Feel free to reach out to us anytime. We are happy to assist you.
                        </p>
                        <div class="space-y-6">
                            <p class="flex items-center text-xl font-semibold">
                                <span class="text-2xl mr-6">📍</span> Kaliwulu, Plered District, Cirebon Regency, West
                                Java 45154, Indonesia.
                            </p>
                            <p class="flex items-center text-xl font-semibold">
                                <span class="text-2xl mr-4">📞</span> (+62)899-548-8333
                            </p>
                            <p class="flex items-center text-xl font-semibold">
                                <span class="text-2xl mr-4">✉️</span> Rizal.baihaqi007@gmail.com
                            </p>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 text-gray-800 dark:text-white">
                        <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Send Us a Message</h3>
                        <form action="#" method="POST" class="space-y-5">
                            <div>
                                <label class="block font-medium text-lg text-gray-700 dark:text-gray-300">Your
                                    Name</label>
                                <input type="text"
                                    class="w-full px-4 py-3 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-800"
                                    placeholder="Enter your name">
                            </div>
                            <div>
                                <label class="block font-medium text-lg text-gray-700 dark:text-gray-300">Your
                                    Email</label>
                                <input type="email"
                                    class="w-full px-4 py-3 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-800"
                                    placeholder="Enter your email">
                            </div>
                            <div>
                                <label
                                    class="block font-medium text-lg text-gray-700 dark:text-gray-300">Message</label>
                                <textarea
                                    class="w-full px-4 py-3 border dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:bg-gray-800"
                                    rows="4" placeholder="Write your message"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-purple-700 dark:bg-purple-800 text-white font-semibold py-3 rounded-lg hover:bg-purple-800 dark:hover:bg-purple-900 transition">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-white dark:text-white dark:bg-gray-900 border-t border-gray-200 sm:mx-auto dark:border-gray-700">
        <div class="w-full py-4">
            <span class="block text-sm text-gray-900 dark:text-white text-center">© 2025 OnProject™. All Rights
                Reserved.</span>
        </div>
    </footer>

    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <script src="{{ asset('js/darkmode.js') }}" defer></script>

</body>

</html>
