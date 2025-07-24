<x-app>
    <div class="min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 lg:py-32">
            <div class="max-w-3xl mx-auto text-center mb-16 lg:mb-20">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[#2E382E] font-playfair mb-6">{{ __('app.contact_title') }}</h1>
                <p class="text-lg sm:text-xl text-gray-600">{{ __('app.contact_subtitle') }}</p>
            </div>

            <div class="max-w-3xl mx-auto">
                <!-- All Links -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 lg:p-10">
                    <div class="text-center mb-10">
                        <h2 class="text-2xl sm:text-3xl font-bold text-[#2E382E] font-playfair mb-4">{{ __('app.all_links') }}</h2>
                        <p class="text-gray-600">{{ __('app.all_links_subtitle') }}</p>
                    </div>

                    <div class="space-y-6">
                        <!-- Linktree -->
                        <a href="https://linktr.ee/mustaphabouddahr" target="_blank" class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
                            <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-[#2E382E]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M7.5 4.5h9v2h-9zm0 13h9v2h-9zm0-6.5h9v2h-9z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">{{ __('app.linktree') }}</h3>
                                <p class="text-sm text-gray-500">{{ __('app.linktree_desc') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Gmail -->
                        <a href="mailto:mustaphabouddahr.dev@gmail.com" class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
                            <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-[#2E382E]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">{{ __('app.email') }}</h3>
                                <p class="text-sm text-gray-500">{{ __('app.email_desc') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Github -->
                        <a href="https://github.com/Must01" target="_blank" class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
                            <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-[#2E382E]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">{{ __('app.github') }}</h3>
                                <p class="text-sm text-gray-500">{{ __('app.github_desc') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- LinkedIn -->
                        <a href="#" target="_blank" class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
                            <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-[#2E382E]" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">{{ __('app.linkedin') }}</h3>
                                <p class="text-sm text-gray-500">{{ __('app.linkedin_desc') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <!-- Buy Me a Coffee -->
                        <a href="https://www.buymeacoffee.com/mustaphabouddahr" target="_blank" class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
                            <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                                <span class="text-xl">☕</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">{{ __('app.buy_coffee') }}</h3>
                                <p class="text-sm text-gray-500">{{ __('coffee_desc') }}</p>
                            </div>
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
