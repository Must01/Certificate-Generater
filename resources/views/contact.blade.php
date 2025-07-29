<x-app>
  <div class="min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 lg:py-32">
      <div class="max-w-3xl mx-auto text-center mb-16 lg:mb-20">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-[#2E382E] font-playfair mb-6">
          {{ __('app.contact_title') }}
        </h1>
        <p class="text-lg sm:text-xl text-gray-600">
          {{ __('app.contact_subtitle') }}
        </p>
      </div>

      <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 sm:p-8 lg:p-10">
          <div class="text-center mb-10">
            <h2 class="text-2xl sm:text-3xl font-bold text-[#2E382E] font-playfair mb-4">
              {{ __('app.all_links') }}
            </h2>
            <p class="text-gray-600">{{ __('app.all_links_subtitle') }}</p>
          </div>

          <div class="grid lg:grid-cols-2 gap-4 sm:grid-cols-1">
            <!-- Portfolio -->
            <a href="https://mustaphabouddarh.netlify.app" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-indigo-500 hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-indigo-500/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=111134&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-indigo-500 transition-colors">
                  {{ __('app.portfolio') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.portfolio_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-500 transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- PayPal -->
            <a href="https://www.paypal.me/mustaphabouddahr" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-blue-500 hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://www.svgrepo.com/show/452082/paypal.svg" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-blue-500 transition-colors">
                  {{ __('app.paypal') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.paypal_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- Linktree -->
            <a href="https://linktr.ee/mustaphabouddahr" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=x03G5TG9OoEO&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">
                  {{ __('app.linktree') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.linktree_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- Gmail -->
            <a href="mailto:mustaphabouddahr.dev@gmail.com"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=P7UIlhbpWzZm&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">
                  {{ __('app.email') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.email_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/mustapha_bouddahr" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-pink-500 hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-pink-500/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=Xy10Jcu1L2Su&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-pink-500 transition-colors">
                  {{ __('app.instagram') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.instagram_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-pink-500 transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/Must01" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=62856&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">
                  {{ __('app.github') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.github_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- Ko‑fi -->
            <a href="https://ko-fi.com/mustaphabouddahr" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#FF5E5B] hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-[#FF5E5B]/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=wWs0Mvy8dMp2&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#FF5E5B] transition-colors">
                  {{ __('app.kofi') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.kofi_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-[#FF5E5B] transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/mustapha-bouddahr-830787338/" target="_blank"
              class="flex items-center p-4 rounded-xl border border-gray-100 hover:border-[#50C9CE] hover:shadow-md transition-all duration-300 group">
              <div class="w-12 h-12 bg-[#50C9CE]/10 rounded-xl flex items-center justify-center mr-4">
                <img src="https://img.icons8.com/?size=100&id=13930&format=png&color=000000" alt="">
              </div>
              <div class="flex-1 mr-2">
                <h3 class="font-semibold text-[#2E382E] group-hover:text-[#50C9CE] transition-colors">
                  {{ __('app.linkedin') }}
                </h3>
                <p class="text-sm text-gray-500">{{ __('app.linkedin_desc') }}</p>
              </div>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-[#50C9CE] transition-colors" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5l7 7-7 7"/>
              </svg>
            </a>

          </div>
        </div>
      </div>
    </div>
  </div>
</x-app>
