<x-app>
    <div class="min-h-screen py-16 sm:py-24 lg:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2E382E] font-playfair mb-6">Generate Your Certificate</h1>
                <p class="text-lg sm:text-xl text-gray-600">Fill in the details below to create a professional certificate. Preview your certificate in real-time before downloading.</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12 items-start">
                <!-- Left: Form -->
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="p-8 lg:p-10">
                        <form action="{{ route('certificate.generate') }}" method="POST" class="space-y-8">
                            @csrf
                            <!-- Form Header -->
                            <div class="flex items-center space-x-4 pb-6 border-b border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-[#50C9CE]/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-[#2E382E]">Certificate Details</h2>
                                    <p class="text-sm text-gray-500">All fields are required</p>
                                </div>
                            </div>

                            <div class="grid gap-6">
                                <div class="group">
                                    <label for="full_name" class="block text-sm font-semibold text-[#2E382E] mb-2">Recipient's Full Name</label>
                                    <div class="relative">
                                        <input type="text" id="full_name" name="full_name" required
                                            placeholder="John Doe"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300" />
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-[#50C9CE]">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="course" class="block text-sm font-semibold text-[#2E382E] mb-2">Course Name</label>
                                    <div class="relative">
                                        <input type="text" id="course" name="course" required
                                            placeholder="Web Development Fundamentals"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300" />
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-[#50C9CE]">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="group">
                                        <label for="director" class="block text-sm font-semibold text-[#2E382E] mb-2">Director's Name</label>
                                        <div class="relative">
                                            <input type="text" id="director" name="director" required
                                                placeholder="Dr. Jane Smith"
                                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300" />
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-[#50C9CE]">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="group">
                                        <label for="academy" class="block text-sm font-semibold text-[#2E382E] mb-2">Academy Name</label>
                                        <div class="relative">
                                            <input type="text" id="academy" name="academy" required
                                                placeholder="Tech Academy"
                                                class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300" />
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-[#50C9CE]">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="group">
                                    <label for="date" class="block text-sm font-semibold text-[#2E382E] mb-2">Completion Date</label>
                                    <div class="relative">
                                        <input type="date" id="date" name="date" required value="{{ date('Y-m-d') }}"
                                            class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300" />
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400 group-focus-within:text-[#50C9CE]">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-6">
                                <button type="submit"
                                    class="w-full bg-[#50C9CE] text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-[#45b0b4] hover:scale-[1.02] transition-all duration-300 flex items-center justify-center space-x-2">
                                    <span>Generate Certificate</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </button>
                                <p class="text-center text-sm text-gray-500 mt-4">Your certificate will be generated as a PDF download</p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Preview -->
                <div class="lg:sticky lg:top-8">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden p-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#50C9CE]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-[#2E382E]">Certificate Preview</h3>
                                <p class="text-sm text-gray-500">Live preview of your certificate</p>
                            </div>
                        </div>

                        <div class=" rounded-lg border border-gray-200 overflow-hidden bg-white shadow-lg">
                            @if(file_exists(public_path('images/certificate.pdf')))
                                <embed src="{{ asset('images/certificate.pdf') }}" type="application/pdf" class="w-full h-full" />
                            @else
                                <div class="relative group">
                                    <img src="{{ asset('images/certificate.png') }}" alt="Certificate Preview" class="w-full h-full object-contain" />
                                    <div class="absolute inset-0 bg-[#50C9CE]/10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                        <span class="bg-white/90 px-4 py-2 rounded-full text-sm font-medium text-[#2E382E] shadow-lg">Preview</span>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 flex p-4 bg-[#50C9CE]/5 rounded-lg">
                            <p class="text-sm text-gray-600 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Preview updates as you type in the form
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
