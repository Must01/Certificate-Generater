<div class="relative w-full bg-[#faf8f5] border shadow-lg rounded-lg overflow-hidden" style="aspect-ratio: 297/210;">

    <div class="absolute inset-0 flex flex-col p-1 sm:p-2 md:p-3 lg:p-4 xl:p-5">

        <div class="flex flex-col items-center text-center w-full mb-0.5">
            <div x-show="logoPreview" class="mb-0.5 flex justify-center items-center h-6 sm:h-8 md:h-10 lg:h-12 xl:h-12 overflow-hidden flex-shrink-0">
                <img :src="logoPreview" class="max-w-full max-h-full object-contain" alt="Custom logo">
            </div>

            <h1 class="text-xs sm:text-base md:text-xl lg:text-2xl xl:text-3xl font-bold text-[#2c3e50] mb-0.5 px-0.5" style="font-family: Playfair, serif;">
                {{ __('app.cert_title') }}
            </h1>

            <div class="bg-[#C1A144] w-6 sm:w-10 md:w-14 lg:w-18 xl:w-20 h-px sm:h-0.5"></div>
        </div>

        <div class="flex flex-col items-center text-center w-full flex-grow justify-center gap-y-0.5 py-0.5">
            <p class="text-[8px] sm:text-[9px] md:text-xs lg:text-sm">
                {{ __('app.presented_to') }}
            </p>

            <div x-text="fullName || '{{ __('app.name_demo') }}'"
                 class="text-[#27AE60] font-semibold text-sm sm:text-base md:text-lg lg:text-xl xl:text-2xl border border-amber-300 px-1.5 sm:px-2 md:px-3 lg:px-5 py-0.5 rounded text-center max-w-[95%] break-words leading-tight">
            </div>

            <p class="text-[7px] sm:text-[8px] md:text-[9px] lg:text-xs">
                {{ __('app.for_outstanding') }}
            </p>

            <p x-text="course || '{{ __('app.course_demo') }}'"
               class="text-gray-800 font-bold text-[9px] sm:text-xs md:text-sm lg:text-base text-center max-w-[95%] break-words px-0.5 sm:px-1">
            </p>

            <p x-text="date ? new Date(date).toLocaleDateString('en-US', { year:'numeric', month:'long', day:'numeric' }) : '{{ __('app.date_demo') }}'"
               class="text-[8px] sm:text-[9px] md:text-xs lg:text-sm text-center">
            </p>

            <img src="{{ asset('images/award.png') }}"
                 class="w-4 h-4 sm:w-6 sm:h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mt-0.5"
                 alt="Award badge" />
        </div>

        <div class="flex justify-around items-end w-full mt-1 sm:mt-1.5 flex-shrink-0">
            <div class="text-center w-2/5 flex flex-col items-center">
                <p class="text-gray-500 text-[8px] sm:text-[9px] md:text-xs lg:text-sm leading-tight break-words px-0.5">
                    <span x-text="academy || '{{ __('app.academy_demo') }}'"></span>
                </p>
                <div class="border-t border-gray-300 mt-0.5 pt-0.5 w-4/5">
                    <p class="text-[7px] sm:text-[8px] md:text-[9px] lg:text-xs text-gray-400">
                        {{ __('app.academy_label') }}
                    </p>
                </div>
            </div>

            <div class="text-center w-2/5 flex flex-col items-center">
                <p class="text-gray-500 text-[8px] sm:text-[9px] md:text-xs lg:text-sm leading-tight break-words px-0.5">
                    <span x-text="director || '{{ __('app.director_demo') }}'"></span>
                </p>
                <div class="border-t border-gray-300 mt-0.5 pt-0.5 w-4/5">
                    <p class="text-[7px] sm:text-[8px] md:text-[9px] lg:text-xs text-gray-400">
                        {{ __('app.director_label') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
