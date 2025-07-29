<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="h-full bg-[#50C9CE] scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('app.nav_title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    @if(app()->getLocale() == 'ar')
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Cairo', sans-serif; }
        </style>
    @endif
    <script src="https://unpkg.com/lucide@latest"></script>

</head>
<body class="h-full">
<div class="min-h-full">

    <header class="absolute inset-x-0 top-0 z-50">
        <nav aria-label="Global" class="flex items-center justify-between p-5 lg:px-8">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <h2 class="font-bold text-gray-800 text-xl">{{ __('app.nav_title') }}</h2>
                </a>
            </div>

            <!-- Mobile menu toggle -->
            <div class="flex lg:hidden">
                <button id="open-menu" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">{{ __('app.open_menu') }}</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <!-- Desktop nav links -->
            <div class="hidden lg:flex lg:gap-x-12">
                <x-nav-link href="/" :active="request()->is('/')">
                    {{ __('app.nav_home') }}
                </x-nav-link>
                <x-nav-link href="/generate" :active="request()->is('generate')">
                    {{ __('app.nav_generate') }}
                </x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">
                    {{ __('app.contact') }}
                </x-nav-link>
            </div>

            <!-- Language switcher & GitHub -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end items-center gap-4">
                <!-- Language Switcher -->
                <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-lg p-1 border border-white/20">
                    <a href="{{ url('lang/en') }}"
                       class="px-3 py-1.5 text-sm font-medium rounded-md transition-all duration-200 {{ app()->getLocale() === 'en' ? 'bg-white text-[#2E382E] shadow-sm' : 'text-gray-700 hover:text-[#2E382E] hover:bg-white/50' }}">
                        EN
                    </a>
                    <a href="{{ url('lang/ar') }}"
                       class="px-3 py-1.5 text-sm font-medium rounded-md transition-all duration-200 {{ app()->getLocale() === 'ar' ? 'bg-white text-[#2E382E] shadow-sm' : 'text-gray-700 hover:text-[#2E382E] hover:bg-white/50' }}">
                        عربي
                    </a>
                </div>

                <!-- GitHub Icon -->
                <a href="https://github.com/Must01" target="_blank" class="p-2 text-gray-700 hover:text-[#2E382E] transition-colors rounded-lg hover:bg-white/10">
                    <img src="{{ asset('images/github.png') }}" alt="GitHub" class="w-6 h-6">
                </a>
            </div>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="fixed inset-0 z-50 bg-white p-6 lg:hidden hidden">
            <div class="flex items-center justify-between mb-6">
                <div class="text-xl font-bold text-[#2E382E]">{{ __('app.menu') }}</div>
                <button id="close-menu" class="p-2 text-gray-700 hover:text-[#2E382E] rounded-lg hover:bg-gray-100">
                    <span class="sr-only">{{ __('app.close_menu') }}</span>
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 18L18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>

            <nav class="space-y-4 flex flex-col text-center mb-8">
                <x-nav-link href="/" :active="request()->is('/')" class="block py-2">
                    {{ __('app.nav_home') }}
                </x-nav-link>
                <x-nav-link href="/generate" :active="request()->is('generate')" class="block py-2">
                    {{ __('app.nav_generate') }}
                </x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')" class="block py-2">
                    {{ __('app.contact') }}
                </x-nav-link>
            </nav>

            <!-- Mobile Language Switcher -->
            <div class="flex justify-center mb-6">
                <div class="flex justify-between gap-1.5 bg-gray-100 rounded-lg p-1">
                    <a href="{{ url('lang/en') }}"
                       class="px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 {{ app()->getLocale() === 'en' ? 'bg-white text-[#2E382E] shadow-sm' : 'text-gray-600 hover:text-[#2E382E]' }}">
                        English
                    </a>
                    <a href="{{ url('lang/ar') }}"
                       class="px-4 py-2 text-sm font-medium rounded-md transition-all duration-200 {{ app()->getLocale() === 'ar' ? 'bg-white text-[#2E382E] shadow-sm' : 'text-gray-600 hover:text-[#2E382E]' }}">
                        العربية
                    </a>
                </div>
            </div>

            <!-- Mobile GitHub Link -->
            <div class="flex justify-center">
                <a href="https://github.com/Must01" target="_blank" class="flex items-center gap-2 text-gray-600 hover:text-[#2E382E] transition-colors">
                    <img src="{{ asset('images/github.png') }}" alt="GitHub" class="w-5 h-5">
                    <span>GitHub</span>
                </a>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-2 {{ app()->getLocale() == 'ar' ? 'space-x-reverse' : '' }}">
                    <span class="text-[#2E382E] font-medium">{{ __('app.made_with') }}</span>
                    <span class="animate-pulse">💖</span>
                    <span class="text-[#2E382E] font-medium"> {{ __('app.by') }} </span>
                    <a href="https://mustaphabouddahr.netlify.app" target="_blank" class="text-[#50C9CE] mr-1 hover:text-[#45b0b4] font-semibold transition-colors">
                        {{ __('app.name') }}
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
                    <a href="https://ko-fi.com/mustaphabouddahr" target="_blank"
                        class="group flex items-center gap-2 bg-[#FFDD00] hover:bg-[#FFDD00]/90 text-black font-semibold px-4 py-2 rounded-full shadow-md hover:shadow-lg transform hover:scale-[1.02] transition-all duration-300">
                        <span class="text-xl group-hover:rotate-12 transition-transform duration-300">☕</span>
                        <span>{{ __('app.buy_coffee') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div>

<script>
// Mobile menu toggle
document.addEventListener('DOMContentLoaded', function() {
    const openMenuBtn = document.getElementById('open-menu');
    const closeMenuBtn = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');

    openMenuBtn?.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    closeMenuBtn?.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
});
</script>

</body>
</html>
