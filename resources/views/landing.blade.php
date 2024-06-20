<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>{{ config('app.name', 'The Connect Wave') }}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('tcw/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{asset('tcw/plugins/themify-icons/themify-icons.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{asset('tcw/plugins/slick/slick.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{asset('tcw/plugins/Venobox/venobox.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{asset('tcw/plugins/aos/aos.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{asset('tcw/css/style.css')}}" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset('tcw/tcw/images/favicon.ico')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('tcw/tcw/images/favicon.ico')}}" type="image/x-icon">

</head>

<body>
  

<!-- navigation -->
<section class="fixed-top navigation">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="index.html"><img src="{{asset('tcw/images/tcw-logo.png')}}" alt="logo" class="logo"></a>
      <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- navbar -->
      <div class="collapse navbar-collapse text-center" id="navbar">
        <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
                  @auth
                      <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('/dashboard') }}">Dashboard</a>
                      </li>
                  @else
                      <li class="nav-item">
                        <a class="nav-link page-scroll" href="{{ url('/login') }}">Login</a>
                      </li>
                      @if (Route::has('register'))
                        <li class="nav-item">
                          <a class="nav-link page-scroll" href="{{ url('/login') }}">Register</a>
                        </li>
                      @endif
                  @endauth
          @endif
        </ul>
        <a href="#" class="btn btn-primary ml-lg-3 primary-shadow">Try Free</a>
      </div>
    </nav>
  </div>
</section>
<!-- /navigation -->

<!-- hero area -->
<section class="hero-section hero" data-background="" style="background-image: url({{asset('tcw/images/hero-area/banner-bg.png')}});">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center zindex-1">
        <h1 class="mb-3">Introducing : The Connect Wave</h1>
        <p class="mb-4">Empower Your Connections, Elevate Your Reach with Digital Visiting Cards<br>Say goodbye to outdated business cards and hello to seamless networking.</p>
        <a href="#" class="btn btn-secondary btn-lg">explore us</a>
        <!-- banner image -->
        <img class="img-fluid w-100 banner-image" src="{{asset('tcw/images/hero-area/banner-img.png')}}" alt="banner-img">
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <div id="scene">
    <img class="img-fluid hero-bg-1 up-down-animation" src="{{asset('tcw/images/background-shape/feature-bg-2.png')}}" alt="">
    <img class="img-fluid hero-bg-2 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="">
    <img class="img-fluid hero-bg-3 left-right-animation" src="{{asset('tcw/images/background-shape/seo-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-4 up-down-animation" src="{{asset('tcw/images/background-shape/green-dot.png')}}" alt="">
    <img class="img-fluid hero-bg-5 left-right-animation" src="{{asset('tcw/images/background-shape/blue-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-6 up-down-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="">
    <img class="img-fluid hero-bg-7 left-right-animation" src="{{asset('tcw/images/background-shape/yellow-triangle.png')}}" alt="">
    <img class="img-fluid hero-bg-8 up-down-animation" src="{{asset('tcw/images/background-shape/service-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-9 up-down-animation" src="{{asset('tcw/images/background-shape/team-bg-triangle.png')}}" alt="">
  </div>
</section>
<!-- /hero-area -->

<!-- feature -->
<section class="section feature mb-0" id="feature">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Awesome Features</h2>
        <p class="mb-100">In a world where connections are everything, presenting The Connect Wave, <br>your ultimate digital business card solution.</p>
      </div>
      <!-- feature item -->
      <div class="col-md-6 mb-80">
        <div class="d-flex feature-item">
          <div>
            <i class="ti-ruler-pencil feature-icon mr-4"></i>
          </div>
          <div>
            <h4>Integrated NFC</h4>
            <p>Seamlessly share your contact details by tapping your digital business card onto any NFC-enabled smartphone. With The Connect Wave, networking becomes as simple as a touch.</p>
          </div>
        </div>
      </div>
      <!-- feature item -->
      <div class="col-md-6 mb-80">
        <div class="d-flex feature-item">
          <div>
            <i class="ti-layout-cta-left feature-icon mr-4"></i>
          </div>
          <div>
            <h4>Device without NFC</h4>
            <p>No NFC? No problem! Easily connect by scanning the QR code using your device's camera. Whether you have an NFC-enabled device or not, connecting with The Connect Wave is effortless and seamless.</p>
          </div>
        </div>
      </div>
      <!-- feature item -->
      <div class="col-md-6 mb-80">
        <div class="d-flex feature-item">
          <div>
            <i class="ti-split-v-alt feature-icon mr-4"></i>
          </div>
          <div>
            <h4>Convenient Profile Updates</h4>
            <p>Updating your contact details on-the-go is simple and efficient. Whether you've changed jobs, moved locations, or updated your phone number, ensuring your connections have your most up-to-date information is effortless. </p>
          </div>
        </div>
      </div>
      <!-- feature item -->
      <div class="col-md-6 mb-80">
        <div class="d-flex feature-item">
          <div>
            <i class="ti-layers-alt feature-icon mr-4"></i>
          </div>
          <div>
            <h4>Lead Generation</h4>
            <p>Expand your network effortlessly. Any smart device, including tablets, can connect to your digital business card. Capture potential leads seamlessly, enhancing your networking capabilities and business opportunities.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <img class="feature-bg-1 up-down-animation" src="{{asset('tcw/images/background-shape/feature-bg-1.png')}}" alt="bg-shape">
  <img class="feature-bg-2 left-right-animation" src="{{asset('tcw/images/background-shape/feature-bg-2.png')}}" alt="bg-shape">
</section>
<!-- /feature -->

<!-- marketing -->
<section class="section-lg seo">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="seo-image">
          <img class="img-fluid" src="{{asset('tcw/images/marketing/marketing.png')}}" alt="form-img">
        </div>
      </div>
      <div class="col-md-5">
        <h2 class="section-title">With just a single tap, unlock boundless opportunities.</h2>
        <p>Stand out in your networking endeavors with The Connect Wave's digital business card. Effortlessly share comprehensive business and contact details with a mere tap, no need for any additional apps.
        </p>
      </div>
    </div>
  </div>
  <!-- background image -->
  <img class="img-fluid seo-bg" src="{{asset('tcw/images/backgrounds/seo-bg.png')}}" alt="seo-bg">
  <!-- background-shape -->
  <img class="seo-bg-shape-1 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-2 up-down-animation" src="{{asset('tcw/images/background-shape/seo-half-cycle.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-3 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-2.png')}}" alt="bg-shape">
</section>
<!-- /marketing -->

<!-- service -->
<section class="section-lg service">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-5 order-2 order-md-1">
        <h2 class="section-title">Tailor your card to reflect your unique style with <br>The Connect Wave</h2>
        <p class="mb-4">Our platform enables comprehensive customization, empowering you to craft both your card's design and profile content. Unleash the full potential of your brand expression by designing your own card, ensuring an unforgettable impression.</p>
        <ul class="pl-0 service-list">
          <li><i class="ti-layout-tab-window text-purple"></i>Data Protection</li>
          <li><i class="ti-layout-placeholder text-purple"></i>Secure</li>
          <li><i class="ti-support text-purple"></i>Effective support</li>
        </ul>
      </div>
      <div class="col-md-7 order-1 order-md-2">
        <img class="img-fluid layer-3" src="{{asset('tcw/images/service/service.png')}}" alt="service">
      </div>
    </div>
  </div>
  <!-- background image -->
  <img class="img-fluid service-bg" src="{{asset('tcw/images/backgrounds/service-bg.png')}}" alt="service-bg">
  <!-- background shapes -->
  <img class="service-bg-shape-1 up-down-animation" src="{{asset('tcw/images/background-shape/service-half-cycle.png')}}" alt="background-shape">
  <img class="service-bg-shape-2 left-right-animation" src="{{asset('tcw/images/background-shape/feature-bg-2.png')}}" alt="background-shape">
</section>
<!-- /service -->

<!-- marketing -->
<section class="section-lg seo">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="seo-image">
          <img class="img-fluid" src="{{asset('tcw/images/marketing/marketing.png')}}" alt="form-img">
        </div>
      </div>
      <div class="col-md-5">
        <h2 class="section-title">Empower your business growth while preserving the environment</h2>
        <p>Say goodbye to ordering excessive paper cards when a single digital TCW card suffices. With a staggering 90% of paper business cards discarded within a week, opt for a sustainable approach to networking, minimizing your carbon footprint while forging stronger connections.
        </p>
      </div>
    </div>
  </div>
  <!-- background image -->
  <img class="img-fluid seo-bg" src="{{asset('tcw/images/backgrounds/seo-bg.png')}}" alt="seo-bg">
  <!-- background-shape -->
  <img class="seo-bg-shape-1 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-2 up-down-animation" src="{{asset('tcw/images/background-shape/seo-half-cycle.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-3 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-2.png')}}" alt="bg-shape">
</section>
<!-- /marketing -->

<!-- pricing -->
<section class="section-lg pb-0 pricing" id="pricing">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Our Pricing</h2>
        <p class="mb-50">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu <br>
          fugiat nulla pariatur. Excepteur sint occaecat </p>
      </div>
      <div class="col-lg-10 mx-auto">
        <div class="row justify-content-center">
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-1">
              <h3>Free</h3>
              <h1><span>$</span>00</h1>
              <p>Far far away, behind the
                wordmountains, far from the
                countries Vokalia and
              </p>
              <a href="#" class="btn pricing-btn px-2">Get Started</a>
            </div>
          </div>
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-2">
              <h3>Standard</h3>
              <h1><span>$</span>75</h1>
              <p>Far far away, behind the
                wordmountains, far from the
                countries Vokalia and
              </p>
              <a href="#" class="btn pricing-btn px-2">Buy Now</a>
            </div>
          </div>
          <!-- pricing table -->
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="rounded text-center pricing-table table-3">
              <h3>Premium</h3>
              <h1><span>$</span>99</h1>
              <p>Far far away, behind the
                wordmountains, far from the
                countries Vokalia and
              </p>
              <a href="#" class="btn pricing-btn px-2">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <img class="pricing-bg-shape-1 up-down-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="background-shape">
  <img class="pricing-bg-shape-2 up-down-animation" src="{{asset('tcw/images/background-shape/seo-half-cycle.png')}}" alt="background-shape">
  <img class="pricing-bg-shape-3 left-right-animation" src="{{asset('tcw/images/background-shape/team-bg-triangle.png')}}" alt="background-shape">
</section>
<!-- /pricing -->

<!-- team -->
<section class="section-lg team" id="team">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Blog</h2>
        <p class="mb-100">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu<br>
          fugiat nulla pariatur. Excepteur sint occaecat </p>
      </div>
    </div>
    <div class="col-10 mx-auto">
      <div class="team-slider">
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="{{asset('tcw/images/team/team-1.jpg')}}" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Becroft</h4>
              <h6 class="text-color">web designer</h6>
            </div>
          </div>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. S eparated they</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="{{asset('tcw/images/team/team-2.jpg')}}" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>John Doe</h4>
              <h6 class="text-color">web developer</h6>
            </div>
          </div>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. S eparated they</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="{{asset('tcw/images/team/team-3.jpg')}}" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Erik Ligas</h4>
              <h6 class="text-color">Programmer</h6>
            </div>
          </div>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
            the blind texts. S eparated they</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="{{asset('tcw/images/team/team-1.jpg')}}" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>Erik Ligas</h4>
              <h6 class="text-color">Programmer</h6>
            </div>
          </div>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
            the blind texts. S eparated they</p>
        </div>
        <!-- team-member -->
        <div class="team-member">
          <div class="d-flex mb-4">
            <div class="mr-3">
              <img class="rounded-circle img-fluid" src="{{asset('tcw/images/team/team-2.jpg')}}" alt="team-member">
            </div>
            <div class="align-self-center">
              <h4>John Doe</h4>
              <h6 class="text-color">web developer</h6>
            </div>
          </div>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. S eparated they</p>
        </div>
      </div>
    </div>
  </div>
  <!-- backgound image -->
  <img src="{{asset('tcw/images/backgrounds/team-bg.png')}}" alt="team-bg" class="img-fluid team-bg">
  <!-- background shapes -->
  <img class="team-bg-shape-1 up-down-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="background-shape">
  <img class="team-bg-shape-2 left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-1.png')}}" alt="background-shape">
  <img class="team-bg-shape-3 left-right-animation" src="{{asset('tcw/images/background-shape/team-bg-triangle.png')}}" alt="background-shape">
  <img class="team-bg-shape-4 up-down-animation img-fluid" src="{{asset('tcw/images/background-shape/team-bg-dots.png')}}" alt="background-shape">
</section>
<!-- /team -->


<!-- client logo slider -->
<section class="section">
  <div class="container">
      <div class="client-logo-slider align-self-center">
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-1.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-2.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-3.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-4.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-5.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-1.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-2.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-3.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-4.png')}}" alt="client-logo"></a>
          <a href="#" class="text-center d-block outline-0 p-5"><img class="d-unset img-fluid" src="{{asset('tcw/images/clients-logo/client-logo-5.png')}}" alt="client-logo"></a>
      </div>
  </div>
</section>
<!-- /client logo slider -->

<!-- newsletter -->
<section class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2>Subscribe to our newsletter</h2>
        <p class="mb-5">Receive updates, news and deals</p>
      </div>
      <div class="col-lg-8 col-sm-10 col-12 mx-auto">
        <form action="#">
          <div class="input-wrapper position-relative">
            <input type="email" class="newsletter-form" id="newsletter" placeholder="Enter your email">
            <button type="submit" value="send" class="btn newsletter-btn">subscribe</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <img class="newsletter-bg-shape left-right-animation" src="{{asset('tcw/images/background-shape/seo-ball-2.png')}}" alt="background-shape">
</section>
<!-- /newsletter -->

<!-- footer -->
<footer class="footer-section footer" style="background-image: url(tcw/images/backgrounds/footer-bg.png')}});">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 text-center text-lg-left mb-4 mb-lg-0">
        <!-- logo -->
        <a href="index.html">
          <img class="img-fluid logo" src="{{asset('tcw/images/tcw-logo.png')}}" alt="logo">
        </a>
      </div>
      <!-- footer menu -->
      <nav class="col-lg-8 align-self-center mb-5">
        <ul class="list-inline text-lg-right text-center footer-menu">
          <!-- <li class="list-inline-item active"><a href="index.html">Home</a></li> -->
          <li class="list-inline-item"><a href="about.html">About</a></li>
          <li class="list-inline-item"><a class="feature.html" href="#feature">Feature</a></li>
          
          <li class="list-inline-item"><a class="page-scroll" href="#team">Team</a></li>
          <li class="list-inline-item"><a class="page-scroll" href="#pricing">Pricing</a></li>
          <li class="list-inline-item"><a href="contact.html">Contact</a></li>
        </ul>
      </nav>
      <!-- footer social icon -->
      <nav class="col-12">
        <ul class="list-inline text-lg-right text-center social-icon">
          <li class="list-inline-item">
            <a class="facebook" href="#"><i class="ti-facebook"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="twitter" href="#"><i class="ti-twitter-alt"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="linkedin" href="#"><i class="ti-linkedin"></i></a>
          </li>
          <li class="list-inline-item">
            <a class="black" href="#"><i class="ti-github"></i></a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="{{asset('tcw/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('tcw/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- slick slider -->
<script src="{{asset('tcw/plugins/slick/slick.min.js')}}"></script>
<!-- venobox -->
<script src="{{asset('tcw/plugins/Venobox/venobox.min.js')}}"></script>
<!-- aos -->
<script src="{{asset('tcw/plugins/aos/aos.js')}}"></script>
<!-- Main Script -->
<script src="{{asset('tcw/js/script.js')}}"></script>

</body>
</html>