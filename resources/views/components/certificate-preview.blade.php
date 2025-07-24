<div class="relative flex justify-center w-full bg-[#faf8f5] border shadow-lg rounded-lg overflow-hidden" style="aspect-ratio: 297/210;">

    <!-- Custom Logo (if uploaded) -->
    <div x-show="logoPreview" class=" ">
        <img :src="logoPreview" class="w-12 mt-2 h-12 object-contain" alt="Custom logo">
    </div>

    <!-- Title -->
    <h1
        class="absolute text-xs md:text-lg lg:text-xl font-bold text-[#2c3e50]"
        style="top: 65px; left: 50%; transform: translateX(-50%); font-family: Playfair, serif;"
    >
        {{ __('app.cert_title') }}
    </h1>

    <!-- Underline -->
    <div
        class="absolute bg-[#C1A144]"
        style="top: 100px; left: 50%; transform: translateX(-50%); width: 160px; height: 2px;"
    ></div>

    <!-- Presented to -->
    <p
        class="absolute text-gray-600 text-sm"
        style="top: 120px; left: 50%; transform: translateX(-50%);"
    >
        {{ __('app.presented_to') }}
    </p>

    <!-- Full Name -->
    <div
        x-text="fullName || '{{ __('app.name_demo') }}'"
        class="absolute text-[#27AE60] font-semibold text-xl border border-amber-300 px-10 py-0.5 rounded-lg"
        style="top: 150px; left: 50%; transform: translateX(-50%);"
    ></div>

    <!-- for outstanding -->    
    <p
        class="absolute text-gray-800 font-bold text-xs"
        style="top: 195px; left: 50%; transform: translateX(-50%);"
    >
        {{ __('app.for_outstanding') }}
    </p>

    <!-- Course -->
    <p
        x-text="course || '{{ __('app.course_demo') }}'"
        class="absolute text-gray-800 font-bold text-sm"
        style="top: 225px; left: 50%; transform: translateX(-50%);"
    ></p>

    <!-- Date -->
    <p
        x-text="date ? new Date(date).toLocaleDateString('en-US', { year:'numeric', month:'long', day:'numeric' }) : '{{ __('app.date_demo') }}'"
        class="absolute text-gray-600 italic text-base"
        style="top: 255px; left: 50%; transform: translateX(-50%);"
    ></p>

    <!-- Award Badge -->
    <img
        src="{{ asset('images/award.png') }}"
        class="absolute"
        style="top: 290px; left: 50%; transform: translateX(-50%); width: 40px; height: 40px;"
        alt="Award badge"
    />

    <!-- Academy block -->
    <div
        class="absolute text-center"
        style="bottom: 30px; left: 60px; width: 120px;"
    >
        <p class="text-gray-500" x-text="academy || '{{ __('app.academy_demo') }}'"></p>
        <p class="mt-1 border-t border-gray-300 pt-1 text-xs text-gray-400">
            {{ __('app.academy_label') }}
        </p>
    </div>

    <!-- Director block -->
    <div
        class="absolute text-center"
        style="bottom: 30px; right: 60px; width: 120px;"
    >
        <p class="text-gray-500" x-text="director || '{{ __('app.director_demo') }}'"></p>
        <p class="mt-1 border-t border-gray-300 pt-1 text-xs text-gray-400">
            {{ __('app.director_label') }}
        </p>
    </div>
</div>
