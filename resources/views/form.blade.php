<x-app>
    <div
        x-data="{
            fullName: '',
            course: '',
            director: '',
            academy: '',
            date: '',
            logoPreview: null,
            logoFile: null,
            handleLogoUpload(event) {
                const file = event.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    this.logoFile = file;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.logoPreview = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            },
            removeLogo() {
                this.logoPreview = null;
                this.logoFile = null;
                document.getElementById('logo').value = '';
            }
        }"
        class="min-h-screen py-16 sm:py-24 lg:py-32"
    >
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
                        <form action="{{ route('certificate.generate') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                            @csrf

                            <!-- Form Header -->
                            <div class="flex items-center space-x-4 pb-6 border-b border-gray-100">
                                <div class="w-10 h-10 rounded-full bg-[#50C9CE]/10 flex items-center justify-center">
                                    <svg class="w-5 h-5 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
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
                                {{-- Logo Upload --}}
                                <div class="group">
                                    <label for="logo" class="block text-sm font-semibold text-[#2E382E] mb-2">
                                        {{ __('app.field_logo') }} <span class="text-gray-400">({{ __('app.optional') }})</span>
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <input
                                            type="file"
                                            id="logo"
                                            name="logo"
                                            accept="image/*"
                                            @change="handleLogoUpload($event)"
                                            class="hidden"
                                        />
                                        <label for="logo" class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                            </svg>
                                            {{ __('app.upload_logo') }}
                                        </label>
                                        <button
                                            type="button"
                                            x-show="logoPreview"
                                            @click="removeLogo()"
                                            class="text-red-600 hover:text-red-800 text-sm font-medium"
                                        >
                                            {{ __('app.remove_logo') }}
                                        </button>
                                    </div>
                                    <div x-show="logoPreview" class="mt-3">
                                        <img :src="logoPreview" class="h-16 w-16 object-contain border border-gray-200 rounded-lg" alt="Logo preview">
                                    </div>
                                </div>

                                {{-- Full Name --}}
                                <div class="group">
                                    <label for="full_name" class="block text-sm font-semibold text-[#2E382E] mb-2">
                                        {{ __('app.field_full_name') }}
                                    </label>
                                    <input
                                        type="text" id="full_name" name="full_name" required
                                        x-model="fullName"
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
                                        x-model="course"
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
                                            x-model="director"
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
                                            x-model="academy"
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
                                        type="date" id="date" name="date" required
                                        x-model="date"
                                        value="{{ date('Y-m-d') }}"
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
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </button>
                                <p class="text-center text-sm text-gray-500 mt-4">
                                    {{ __('app.note_pdf_download') }}
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right: Live Preview -->
                <div class="lg:sticky lg:top-8">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden  p-2 sm:p-2 lg:p-4 xl:p-8">
                        <div class="flex items-center space-x-4 mb-6">
                            <div class="w-10 h-10 rounded-full bg-[#50C9CE]/10 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#50C9CE]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
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

                        <!-- Certificate Preview -->
                        <x-certificate-preview />
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Include Alpine.js --}}
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</x-app>
