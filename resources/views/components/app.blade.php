<!DOCTYPE html>
<html lang="en" class="h-full bg-[#50C9CE] scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Generator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="h-full">
<div class="min-h-full">

    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-5 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <h2 class="ImperialScript font-bold text-xl">Certificate Generater</h2>
                </a>
            </div>
            <div class="flex lg:hidden">
                <button id="open-menu" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open menu</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/generate" :active="request()->is('generate')">Generate</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="#" class="text-sm/6 font-semibold text-gray-900">
                    <img src="{{ asset('images/github.png') }}" alt="" class="size-8">
                </a>
            </div>
        </nav>
        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="fixed inset-0 z-50 bg-white p-6 lg:hidden hidden">
            <div class="flex items-center justify-between mb-6">
            <div class="text-xl font-bold">Menu</div>
            <button id="close-menu" class="p-2 text-gray-700">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
            </div>

            <nav class="space-y-4">
            <a href="#" class="block text-lg font-semibold hover:text-indigo-600">Home</a>
            <a href="#" class="block text-lg font-semibold hover:text-indigo-600">About</a>
            <a href="#" class="block text-lg font-semibold hover:text-indigo-600">Services</a>
            <a href="#" class="block text-lg font-semibold hover:text-indigo-600">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-2">
                    <span class="text-[#2E382E] font-medium">Made with</span>
                    <span class="animate-pulse">💖</span>
                    <span class="text-[#2E382E] font-medium">By</span>
                    <a href="https://linktr.ee/mustaphabouddahr" target="_blank" class="text-[#50C9CE] hover:text-[#45b0b4] font-semibold transition-colors">
                        Mustapha Bouddahr
                    </a>
                </div>
                <div class="flex items-center gap-4">
                    <a href="https://github.com/Must01" target="_blank"
                        class="flex items-center gap-2 text-gray-600 hover:text-[#50C9CE] transition-colors px-3 py-2 rounded-lg hover:bg-gray-50">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                        </svg>
                        <span class="font-medium">GitHub</span>
                    </a>
                    <a href="https://www.buymeacoffee.com/mustaphabouddahr" target="_blank"
                        class="group flex items-center gap-2 bg-[#FFDD00] hover:bg-[#FFDD00]/90 text-black font-semibold px-4 py-2 rounded-full shadow-md hover:shadow-lg transform hover:scale-[1.02] transition-all duration-300">
                        <span class="text-xl group-hover:rotate-12 transition-transform duration-300">☕</span>
                        <span>Buy me a coffee</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>

</body>
</html>
