<x-app>
  <div class="min-h-screen py-16 sm:py-24 lg:py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <!-- Header -->
      <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#2E382E] font-playfair mb-6">
          {{ __('app.generate_page_title') }}
        </h1>
        <p class="text-lg sm:text-xl text-gray-600">
          {{ __('app.generate_page_description') }}
        </p>
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
                  <!-- icon omitted for brevity -->
                </div>
                <div>
                  <h2 class="text-xl font-bold text-[#2E382E]">
                    {{ __('app.form_header_title') }}
                  </h2>
                  <p class="text-sm text-gray-500">
                    {{ __('app.form_header_subtitle') }}
                  </p>
                </div>
              </div>

              <div class="grid gap-6">
                {{-- Full Name --}}
                <div class="group">
                  <label for="full_name" class="block text-sm font-semibold text-[#2E382E] mb-2">
                    {{ __('app.field_full_name') }}
                  </label>
                  <input
                    type="text" id="full_name" name="full_name" required
                    placeholder="{{ __('app.field_full_name') }}"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300"
                  />
                </div>

                {{-- Course Name --}}
                <div class="group">
                  <label for="course" class="block text-sm font-semibold text-[#2E382E] mb-2">
                    {{ __('app.field_course_name') }}
                  </label>
                  <input
                    type="text" id="course" name="course" required
                    placeholder="{{ __('app.field_course_name') }}"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300"
                  />
                </div>

                {{-- Director & Academy --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div class="group">
                    <label for="director" class="block text-sm font-semibold text-[#2E382E] mb-2">
                      {{ __('app.field_director_name') }}
                    </label>
                    <input
                      type="text" id="director" name="director" required
                      placeholder="{{ __('app.field_director_name') }}"
                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300"
                    />
                  </div>
                  <div class="group">
                    <label for="academy" class="block text-sm font-semibold text-[#2E382E] mb-2">
                      {{ __('app.field_academy_name') }}
                    </label>
                    <input
                      type="text" id="academy" name="academy" required
                      placeholder="{{ __('app.field_academy_name') }}"
                      class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300"
                    />
                  </div>
                </div>

                {{-- Completion Date --}}
                <div class="group">
                  <label for="date" class="block text-sm font-semibold text-[#2E382E] mb-2">
                    {{ __('app.field_completion_date') }}
                  </label>
                  <input
                    type="date" id="date" name="date" required value="{{ date('Y-m-d') }}"
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#50C9CE] bg-white shadow-sm transition-all duration-300"
                  />
                </div>
              </div>

              <div class="pt-6">
                <button
                  type="submit"
                  class="w-full bg-[#50C9CE] text-white font-bold py-3 px-6 rounded-lg shadow-lg hover:bg-[#45b0b4] hover:scale-[1.02] transition-all duration-300 flex items-center justify-center space-x-2"
                >
                  <span>{{ __('app.button_generate') }}</span>
                  <!-- arrow icon omitted -->
                </button>
                <p class="text-center text-sm text-gray-500 mt-4">
                  {{ __('app.note_pdf_download') }}
                </p>
              </div>
            </form>
          </div>
        </div>

        <!-- Right: Preview -->
        <div class="lg:sticky lg:top-8">
          <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden p-8">
            <div class="flex items-center space-x-4 mb-6">
              <div class="w-10 h-10 rounded-full bg-[#50C9CE]/10 flex items-center justify-center">
                <!-- icon omitted -->
              </div>
              <div>
                <h3 class="text-xl font-bold text-[#2E382E]">
                  {{ __('app.preview_panel_title') }}
                </h3>
                <p class="text-sm text-gray-500">
                  {{ __('app.preview_panel_subtitle') }}
                </p>
              </div>
            </div>

            <div class="rounded-lg border border-gray-200 overflow-hidden bg-white shadow-lg">
              @if(file_exists(public_path('images/certificate.pdf')))
                <embed src="{{ asset('images/certificate.pdf') }}" type="application/pdf" class="w-full h-full" />
              @else
                  <img src="{{ asset('images/certificate.png') }}" alt="{{ __('app.preview_panel_title') }}" class="w-full h-full object-contain" />
              @endif
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</x-app>
