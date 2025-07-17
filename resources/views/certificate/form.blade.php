<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>Certificate Generator</title>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">

    {{-- LEFT: Form --}}
    <div class="form-container">
      <div class="header">
        <h1>Certificate Generator</h1>
        <p class="subtitle">Fill in the details to generate your certificate</p>
      </div>

      <form action="{{ route('certificate.generate') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="full_name">Full Name</label>
          <input type="text" id="full_name" name="full_name" required placeholder="Enter recipient's full name">
        </div>

        <div class="form-group">
          <label for="course">Course Name</label>
          <input type="text" id="course" name="course" required placeholder="Enter course name">
        </div>

        <div class="form-group">
          <label for="director">Director's Name</label>
          <input type="text" id="director" name="director" required placeholder="Enter director's name">
        </div>

        <div class="form-group">
          <label for="academy">Academy Name</label>
          <input type="text" id="academy" name="academy" required placeholder="Enter academy name">
        </div>

        <div class="form-group">
          <label for="date">Completion Date</label>
          <input type="date" id="date" name="date" required value="{{ date('Y-m-d') }}">
        </div>

        <button type="submit">Generate Certificate</button>
      </form>

      <div class="form-footer">
        <p>Your certificate will be generated as a PDF download</p>
      </div>
    </div>

    {{-- RIGHT: Preview --}}
    <div class="preview-container">
      <img id="background" src="{{ asset('images/background4.jpg') }}" alt="Graduate" class="bg-girl">

      <div class="certificate-overlay">
        @if(file_exists(public_path('images/certificate.pdf')))
          <embed src="{{ asset('images/certificate.pdf') }}" type="application/pdf" width="100%" height="100%">
        @else
          <img src="{{ asset('images/certificate.png') }}" alt="Certificate Preview" style="width:100%; height:auto;">
        @endif
      </div>
    </div>

  </div>

</body>

<script>
    const images = [
        "/images/background1.jpg",
        "/images/background2.jpg",
        "/images/background3.jpg",
        "/images/background4.jpg",
    ];

    let idx = 0;
    const bg = document.getElementById("background");

    bg.style.transition = "filter .5s";

    // Ensure blur is removed only after image loads
    bg.onload = () => {
        bg.style.filter = "blur(0)";
    };

    setInterval(() => {
        // Blur out
        bg.style.filter = "blur(2px)";
        // Wait for blur-out to finish before changing image
        setTimeout(() => {
            idx = (idx + 1) % images.length;
            if (bg.src !== location.origin + images[idx]) {
                bg.src = images[idx];
            } else {
                // If image is cached and onload doesn't fire, remove blur manually
                bg.style.filter = "blur(0)";
            }
        }, 500);
    }, 5000);
</script>
</html>
