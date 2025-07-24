<x-app>
    <!-- Hero Section -->
    <div class="relative isolate min-h-screen flex items-center justify-center">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#50C9CE] to-[#2E382E] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-bold tracking-tight text-balance text-[#2E382E] font-playfair leading-tight mb-8">Create Professional Certificates in Minutes</h1>
                <p class="mt-6 text-lg sm:text-xl text-gray-600 max-w-3xl mx-auto">Generate beautiful, customizable certificates for your courses, workshops, and events with our easy-to-use certificate generator.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="{{ route('certificate.form') }}" class="rounded-lg bg-[#2E382E] px-6 py-3 text-base sm:text-lg font-semibold text-[#50C9CE] shadow-lg hover:bg-white transition-all duration-300 hover:scale-105">Generate Certificate</a>
                    <a href="#features" class="text-base sm:text-lg font-semibold text-gray-700 hover:text-white transition-colors duration-300 group">
                        Learn more
                        <span aria-hidden="true" class="inline-block transition-transform group-hover:translate-x-1">→</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#50C9CE] to-[#2E382E] opacity-20 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"></div>
        </div>
    </div>

    <!-- Features Section -->
    <section id="features" class="bg-white">
        <div class="max-w-7xl py-16 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16 lg:mb-20">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-[#2E382E] font-playfair mb-6">Features</h2>
                <p class="text-lg sm:text-xl text-gray-600">Everything you need to create professional certificates</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                <!-- Feature 1 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 01-8 0m8 0a4 4 0 00-8 0m8 0V5a2 2 0 00-2-2H8a2 2 0 00-2 2v2m12 10a2 2 0 01-2 2H6a2 2 0 01-2-2V7"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2E382E] mb-4">Language Selection</h3>
                    <p class="text-gray-600">Choose the language of your certificate form English or Arabic for a personalized experience.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2E382E] mb-4">Instant Download</h3>
                    <p class="text-gray-600">Generate and download your certificates instantly in high-quality PDF format.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-[#2E382E] mb-4">Easy Customization</h3>
                    <p class="text-gray-600">Customize your certificates with names, dates, courses, and other details in just a few clicks.</p>
                </div>
            </div>
        </div>
    </section>
</x-app>
