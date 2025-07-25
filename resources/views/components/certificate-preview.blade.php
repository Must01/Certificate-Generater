<div class="relative w-full bg-[#faf8f5] border shadow-lg rounded-lg overflow-hidden" style="aspect-ratio: 297/210;">

    <!-- Main Content Container -->
    <div class="absolute inset-0 flex flex-col p-1 sm:p-2 md:p-4 lg:p-4">

        <!-- Top Section with Logo -->
        <div class="flex flex-col items-center text-center w-full">
            <!-- Custom Logo (if uploaded) -->
            <div x-show="logoPreview" class="mb-1">
                <img :src="logoPreview" class="w-3 h-3 sm:w-6 sm:h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 object-contain" alt="Custom logo">
            </div>

            <!-- Title -->
            <h1 class="text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl font-bold text-[#2c3e50] mb-1 px-1" style="font-family: Playfair, serif;">
                {{ __('app.cert_title') }}
            </h1>

            <!-- Underline -->
            <div class="bg-[#C1A144] w-8 sm:w-12 md:w-16 lg:w-20 xl:w-24 h-px sm:h-0.5"></div>
        </div>

        <!-- Middle Section - Flexible -->
        <div class="flex flex-col items-center text-center w-full flex-1 justify-center space-y-1 sm:space-y-2">
            <!-- Presented to -->
            <p class="text-gray-600 text-xs sm:text-sm md:text-base">
                {{ __('app.presented_to') }}
            </p>

            <!-- Full Name -->
            <div x-text="fullName || '{{ __('app.name_demo') }}'"
                 class="text-[#27AE60] font-semibold text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl border border-amber-300 px-2 sm:px-3 md:px-4 lg:px-6 py-1 rounded text-center max-w-[90%] break-words">
            </div>

            <!-- For outstanding -->
            <p class="text-gray-800 font-bold  text-[8px] sm:text-xs md:text-base">
                {{ __('app.for_outstanding') }}
            </p>

            <!-- Course -->
            <p x-text="course || '{{ __('app.course_demo') }}'"
               class="text-gray-800 font-bold text-xs sm:text-sm md:text-base lg:text-lg text-center max-w-[95%] break-words px-2">
            </p>

            <!-- Date -->
            <p x-text="date ? new Date(date).toLocaleDateString('en-US', { year:'numeric', month:'long', day:'numeric' }) : '{{ __('app.date_demo') }}'"
               class="text-gray-600 italic text-xs sm:text-sm md:text-base text-center">
            </p>

            <!-- Award Badge -->
            <img src="{{ asset('images/award.png') }}"
                 class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6 lg:w-8 lg:h-8 mt-1"
                 alt="Award badge" />
        </div>

        <!-- Bottom Section - Fixed -->
        <div class="flex justify-between items-end w-full mt-1 sm:mt-2">
            <!-- Academy block -->
            <div class="text-center flex-1 max-w-[40%]">
                <p class="text-gray-500 text-xs sm:text-sm md:text-base leading-tight truncate"
                   x-text="academy || '{{ __('app.academy_demo') }}'">
                </p>
                <div class="border-t border-gray-300 mt-1 pt-1">
                    <p class="text-xs sm:text-xs md:text-sm text-gray-400">
                        {{ __('app.academy_label') }}
                    </p>
                </div>
            </div>

            <!-- Spacer -->
            <div class="flex-1"></div>

            <!-- Director block -->
            <div class="text-center flex-1 max-w-[40%]">
                <p class="text-gray-500 text-xs sm:text-sm md:text-base leading-tight truncate"
                   x-text="director || '{{ __('app.director_demo') }}'">
                </p>
                <div class="border-t border-gray-300 mt-1 pt-1">
                    <p class="text-xs sm:text-xs md:text-sm text-gray-400">
                        {{ __('app.director_label') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
