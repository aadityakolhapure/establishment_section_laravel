<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Establishment Section System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 text-gray-800 dark:text-gray-100">

    <!-- Hero Section -->
    <div class="">

        @if (Route::has('login'))
            <livewire:welcome.navigation />
        @endif

    </div>

    <header class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white h-fit">

        <div class="container mx-auto px-6 py-16 text-center">
            <h1 class="text-4xl md:text-6xl font-bold">Streamline Your Administrative Workflow</h1>
            <p class="mt-4 text-lg md:text-xl">Automate leave applications and document management with ease.</p>
            <a href="/register"
                class="mt-6 inline-block bg-white text-blue-600 font-medium px-8 py-4 rounded-lg shadow-lg hover:bg-blue-100 transition duration-300">
                Get Started
            </a>
        </div>
    </header>

    <!-- Features Section -->
    <section
        class="py-16 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 dark:from-gray-800 dark:via-gray-700 dark:to-gray-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Features That Make a Difference</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Explore our key functionalities designed for
                efficiency and security.</p>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <h3 class="text-xl font-semibold text-blue-600">Leave Management</h3>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">Submit, track, and approve leave requests in
                        real-time.</p>
                </div>
                <!-- Feature Card 2 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <h3 class="text-xl font-semibold text-blue-600">Document Management</h3>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">Organize employee details and maintain critical
                        documents securely.</p>
                </div>
                <!-- Feature Card 3 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <h3 class="text-xl font-semibold text-blue-600">Comprehensive Reporting</h3>
                    <p class="mt-4 text-gray-600 dark:text-gray-300">Generate detailed reports for audits and analysis.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section
        class="py-16 bg-gradient-to-r from-blue-50 via-indigo-50 to-purple-50 dark:from-blue-900 dark:via-indigo-900 dark:to-purple-900">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">How It Works</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Simplifying complex workflows into a seamless
                experience.</p>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Step 1 -->
                <div
                    class="flex flex-col items-center bg-white dark:bg-gray-700 shadow-xl p-6 hover:shadow-2xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                        1</div>
                    <h3 class="mt-4 text-xl font-semibold text-blue-600">Register</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Create an account to access the system.</p>
                </div>
                <!-- Step 2 -->
                <div
                    class="flex flex-col items-center bg-white dark:bg-gray-700 shadow-xl p-6 hover:shadow-2xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                        2</div>
                    <h3 class="mt-4 text-xl font-semibold text-blue-600">Manage</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Submit leave requests and upload/manage documents.
                    </p>
                </div>
                <!-- Step 3 -->
                <div
                    class="flex flex-col items-center bg-white dark:bg-gray-700 shadow-xl p-6 hover:shadow-2xl transition duration-300">
                    <div
                        class="w-16 h-16 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-full flex items-center justify-center text-2xl font-bold">
                        3</div>
                    <h3 class="mt-4 text-xl font-semibold text-blue-600">Analyze</h3>
                    <p class="mt-2 text-gray-600 dark:text-gray-300">Track progress and generate insightful reports.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section
        class="py-16 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 dark:from-gray-800 dark:via-gray-700 dark:to-gray-600">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold text-gray-800 dark:text-white">What Our Users Say</h2>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">Real feedback from those who have experienced the
                benefits.</p>
            <div class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <p class="text-gray-600 dark:text-gray-300">"This system has streamlined our entire workflow, making
                        leave management a breeze!"</p>
                    <h4 class="mt-4 font-semibold text-blue-600">- John Doe</h4>
                </div>
                <!-- Testimonial 2 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <p class="text-gray-600 dark:text-gray-300">"The document management module is a game-changer for
                        keeping everything organized."</p>
                    <h4 class="mt-4 font-semibold text-blue-600">- Jane Smith</h4>
                </div>
                <!-- Testimonial 3 -->
                <div
                    class="bg-white dark:bg-gray-700 shadow-xl rounded-lg p-6 hover:shadow-2xl transition duration-300">
                    <p class="text-gray-600 dark:text-gray-300">"A perfect solution for institutions aiming for a
                        paperless environment."</p>
                    <h4 class="mt-4 font-semibold text-blue-600">- Michael Johnson</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="py-8 bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <p>© 2024 Establishment Section System. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
