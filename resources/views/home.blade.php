<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'The Connect Wave') }}</title>
<!-- Bootstrap 5 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('tcw/css/landing.css')}}">
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('theme_tcw/assets/img/logos/logo.png')}}" alt="Logo" class="d-inline-block align-text-top img-fluid w-3">
                The Connect Wave
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="dark_section">
        <div class="container-fluid">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-lg-12 text-center zindex-1">
                    <p>We Are</p>
                    <h1>The Connect Wave</h1>
                    <p>Where every connection matters</p>
                </div>
                <div class="col-lg-12 text-center zindex-1">
                    <!-- <video autoplay  playsinline loop id="video-play" muted class="w-100 mt-3">
                        <source src="{{asset('tcw/videos/black.mp4')}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video> -->
                    <div id="animation-container"></div>
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-dark">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!" class="text-dark">Link 1</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 2</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 3</a>
                        </li>
                        <li>
                            <a href="#!" class="text-dark">Link 4</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Company, Inc.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const container = document.getElementById('animation-container');
        const imageUrls = [];
        for (let i = 00000; i <= 00255; i++) {
        imageUrls.push(`/tcw/seq/img_1_${i.toString().padStart(5, '0')}.png`);
        }
        const images = [];
        imageUrls.forEach(url => {
            const img = new Image();
            img.src = url;
            img.style.opacity = 0;
            img.style.position = 'absolute';
            images.push(img);
            container.appendChild(img); // Append immediately
        });
        const animation = anime({
            targets: images,
            opacity: [0, 1],
            duration: 1000 / 60, // Adjust duration based on desired FPS (here, targeting 60 FPS)
            easing: 'linear',
            loop: true,
            autoplay: false,
            delay: anime.stagger(33.33),
        });
        animation.play();
    </script>
</body>
</html>