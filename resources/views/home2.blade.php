<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'The Connect Wave') }}</title>
<!-- Bootstrap 5 CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
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
                    <a href="#"><i class="fa-solid fa-ellipsis-vertical"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <section class="dark_section lg-pt abs-bg">
        <!-- <hr class="scroll_hr"> -->
        <div class="scroll-hint">
            <span class="scroll_text"> <i class="fa-solid fa-arrow-left"></i>Scroll</span>
        </div>
        <div class="container-fluid">
            <div class="row align-items-center" style="height: 100%;">
                <div class="col-lg-12 text-center zindex-1">
                    <h1 class="title-hero">The Connect Wave</h1>
                    <p class="sub_title">Where every connection counts</p>
                    <button type="button" class="btn btn-tcw btn-md mt-3">Get Started <i class="fa-solid fa-arrow-right"></i></button>
                </div>
                <div class="col-lg-12 text-center zindex-1">
                    <video autoplay  playsinline loop id="video-play" muted class="w-100 mt-3">
                        <source src="{{asset('tcw/videos/black.mp4')}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="dark_section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <h1 class="section-title">Features</h1>
                <div class="text-center flex-section mt-5 slick-container">
                    <div class=" feature-container">
                        <div class="card feature-card">
                            <div class="card-body ios-andoird-bg">
                                <h5 class="card-title">Compatible with iOS & <br>Android</h5>
                                <!-- <p class="card-text">Share & Connect without worrying about the type of device. TCW smart connect card works with every device with ease.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class=" feature-container">
                        <div class="card feature-card">
                            <div class="card-body no-app-bg">
                                <h5 class="card-title">No App Required</h5>
                                <!-- <p class="card-text">Share & Connect without worrying about the type of device. TCW smart connect card works with every device with ease.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class=" feature-container">
                        <div class="card feature-card">
                            <div class="card-body custom-bg">
                                <h5 class="card-title">Fully Customizable</h5>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            </div>
                        </div>
                    </div>
                    <div class=" feature-container">
                        <div class="card feature-card">
                            <div class="card-body save-bg">
                                <h5 class="card-title text-black">Environemnt Friendly</h5>
                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 slide-nav-icon mt-4">
                    <i class="fa-solid fa-circle-chevron-left prev"></i>
                    <i class="fa-solid fa-circle-chevron-right next"></i>
                </div>
            </div>
        </div>
    </section>
    <section class="dark_section lg-pt">
        <div class="container">
            <div class="row align-items-center">
                <h1 class="section-title">Why choose TCW over paper business cards?</h1>
                <div class="col-lg-12 text-center mt-5">
                    <img src="{{asset('tcw/images/product/feature.png')}}" class="img-fluid w-75" />
                </div>
            </div>
        </div>
    </section>
    <section class="dark_section">
        <div class="container">
            <div class="row align-items-center">
                <h1 class="section-title">Our Produts wall of fame.</h1>
                <div class="col-lg-12 text-center mt-5">
                    <div class="card" style="width: 18rem;">
                    
                        <img class="card-img-top" src="{{asset('tcw/images/products/event-planner.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">For Event Planner</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="dark_section text-center text-lg-start lg-pt pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-md-0 justify-content-start">
                    <h5 class="text-uppercase">About TCW</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Important Links</h5>
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
                    <h5 class="text-uppercase mb-0">Policies</h5>
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
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-0">Subscribe to Newsletter</h5>
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
            © 2024 The Connect Wave.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript" src="{{asset('tcw/js/script.js')}}"></script>

</body>
</html>