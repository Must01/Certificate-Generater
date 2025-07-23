<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Certificate Generator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-violet-400 to-blue-400 min-h-screen flex items-center justify-center text-gray-800">

    <div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden"></div>

        {{-- LEFT: Form --}}
        <div class="md:w-1/2 w-full p-6 flex flex-col justify-center bg-gray-50">
            <div class="text-center mb-6">
                <h1 class="font-serif text-3xl font-bold text-violet-600 mb-2">Certificate Generator</h1>
                <p class="text-sm text-gray-500">Fill in the details to generate your certificate</p>
            </div>

            <form action="{{ route('certificate.generate') }}" method="POST" class="flex flex-col gap-4">
                @csrf

                <div>
                    <label for="full_name" class="block text-xs font-semibold text-gray-700 mb-1 uppercase">Full Name</label>
                    <input type="text" id="full_name" name="full_name" required placeholder="Enter recipient's full name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400 bg-white" />
                </div>

                <div>
                    <label for="course" class="block text-xs font-semibold text-gray-700 mb-1 uppercase">Course Name</label>
                    <input type="text" id="course" name="course" required placeholder="Enter course name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400 bg-white" />
                </div>

                <div>
                    <label for="director" class="block text-xs font-semibold text-gray-700 mb-1 uppercase">Director's Name</label>
                    <input type="text" id="director" name="director" required placeholder="Enter director's name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400 bg-white" />
                </div>

                <div>
                    <label for="academy" class="block text-xs font-semibold text-gray-700 mb-1 uppercase">Academy Name</label>
                    <input type="text" id="academy" name="academy" required placeholder="Enter academy name"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400 bg-white" />
                </div>

                <div>
                    <label for="date" class="block text-xs font-semibold text-gray-700 mb-1 uppercase">Completion Date</label>
                    <input type="date" id="date" name="date" required value="{{ date('Y-m-d') }}"
                        class="w-full px-3 py-2 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-violet-400 bg-white" />
                </div>

                <button type="submit"
                    class="bg-gradient-to-r from-violet-500 to-blue-500 text-white font-bold py-2 rounded-md shadow hover:scale-105 transition">Generate Certificate</button>
            </form>

            <div class="mt-4 text-center text-xs text-gray-400">
                <p>Your certificate will be generated as a PDF download</p>
            </div>
        </div>

        {{-- RIGHT: Preview --}}
        <div class="md:w-1/2 w-full relative flex flex-col items-center justify-center bg-white">
            <img src="{{ asset('images/background4.jpg') }}" alt="Graduate" class="w-full h-56 object-cover opacity-80" />

            <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-xs text-gray-400">Made with 💖 By Mustapha Bouddahr</span>

            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-4/5">
                @if(file_exists(public_path('images/certificate.pdf')))
                    <embed src="{{ asset('images/certificate.pdf') }}" type="application/pdf" class="w-full h-64 rounded shadow" />
                @else
                    <img src="{{ asset('images/certificate.png') }}" alt="Certificate Preview" class="w-full h-auto rounded shadow" />
                @endif
            </div>
        </div>

    </div>

</body>
</html>
