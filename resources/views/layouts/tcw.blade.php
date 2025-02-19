@props([
    'title' => 'The Connect Wave | Where every Connection Counts',
    'image' => 'https://res.cloudinary.com/shubhambhattacharya/image/upload/v1737799590/tcw_-_og_images_lpgrox.png',
    'description' => "Select any Valentine's Day love card at flat INR 999. NO HIDDEN CHARGES | FREE SHIPPING",
    'url' => 'url()->current()'
    
])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('tcw/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('tcw/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('tcw/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('tcw/images/site.webmanifest')}}">
    <title>{{$title}}</title>
    <meta property="og:title" content="{{$title}}">
    <meta property="og:description" content="{{$description}}">
    <meta property="og:image" content="{{$image}}">
    <meta property="og:url" content="{{$url}}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="theconnectwave.com">

    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css">
    <link rel="stylesheet" href="{{asset('tcw/css/tcw.css')}}?v=3">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-W47VSRBZ');</script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-X6NRK3KNXE"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-X6NRK3KNXE');
    </script>
    <script>
    (function (c, s, q, u, a, r, e) {
        c.hj=c.hj||function(){(c.hj.q=c.hj.q||[]).push(arguments)};
        c._hjSettings = { hjid: a };
        r = s.getElementsByTagName('head')[0];
        e = s.createElement('script');
        e.async = true;
        e.src = q + c._hjSettings.hjid + u;
        r.appendChild(e);
    })(window, document, 'https://static.hj.contentsquare.net/c/csq-', '.js', 5299451);
</script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W47VSRBZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
    <div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                This is a Bootstrap 5 toast notification!
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
    <div class="topMarqDiv">
        <div class="topMarq">
            <div>✦ new break up card on sale now. Flat inr 999 only. ✦ hurry! ✦</div>
            <div>✦ new break up card on sale now. Flat inr 999 only. ✦ hurry! ✦</div>
            <div>✦ new break up card on sale now. Flat inr 999 only. ✦ hurry! ✦</div>
            <div>✦ new break up card on sale now. Flat inr 999 only. ✦ hurry! ✦</div>
        </div>
    </div>
    <header class="stick-header">
        <div class="container-fluid">
            <div class="row">
                <div class="main-menu">
                    <div class="menu-item">
                        <div class="left-menu-items">
                            <button type="button" class="btn btn-tcw-outline-invert" id="toggleMenu">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                            <button type="button" class="btn btn-tcw-outline-invert icon-slow" id="toggleSearch">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                    <div class="logo-item text-center">
                        <!-- Visible on desktop, hidden on mobile -->
                        <a class="brand-logo d-none d-md-block" href="/">
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/w_400,h_120,c_thumb/tcw-logo_ar5xnj.png" 
                                class="d-inline-block align-top img-fluid" 
                                alt="Logo">
                        </a>

                        <!-- Visible on mobile, hidden on desktop -->
                        <a class="brand-logo d-md-none" href="/">
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/c_thumb,w_200,g_face/v1739722086/logo_frvdbc.png" 
                                class="d-inline-block align-top img-fluid mob-logo" 
                                alt="Logo">
                        </a>
                    </div>
                    <div class="cart-item">
                        <a href="{{route('shop.checkout')}}" class="btn btn-tcw-outline-invert" id="cartMenu">
                            <i class="fa-solid fa-bag-shopping"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- menu start -->
    <div class="menu-section">
        <div class="divider"></div>
        <div>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="/"><span>HOME</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="{{route('about')}}"><span>ABOUT</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="javascript:void(0)" id="shopMenu"><span>SHOP</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="{{route('shop.checkout')}}"><span>CART</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="{{route('track')}}"><span>TRACK</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="{{route('contact')}}"><span>HELP</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- menu end -->
    <!-- sub menu section start  -->
    <div class="submenu-section">
        <div class="back-menu">
            Back
        </div>
        <div>
            <ul class="navbar-nav ms-auto">
                @foreach($cardTypes as $cardType)
                <li class="nav-item">
                    <a class="nav-link menu-link" data-aos="flip-up" href="{{ route('shop.category', ['ct_slug' => $cardType->slug]) }}"><span>{{$cardType->name}}</span></a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- sub menu section end  -->
<main>
{{$slot}}
</main>
<footer class="container-fluid p-4 dark_bg">
    <div class="row">
        <div class="col-lg-3 col-md-12 mb-4 mb-md-0 justify-content-start">
            <h5 class="text-uppercase">About TCW</h5>
            <p>At Connect Wave, our mission is to empower professionals and businesses by revolutionizing the way they network. We believe in the power of connections and strive to make every interaction seamless, impactful, and memorable.</p>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase">Corporate Address</h5>
            <ul class="list-unstyled mb-0">
                <li>
                    Third Floor, TF-112A/TF-112B, Vitthal Malya Road,
                    UB City, Bengaluru, Karnataka 560001
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0">Policies</h5>
            <ul class="list-unstyled">
                <li>
                    <a href="{{route('shipping')}}" class="text-light">Shipping Policy</a>
                </li>
                <li>
                    <a href="{{route('cancellation')}}" class="text-light">Refund</a>
                </li>
                <li>
                    <a href="{{route('terms')}}" class="text-light">Terms & Conditions</a>
                </li>
                <li>
                    <a href="{{route('privacy')}}" class="text-light">Privacy Policy</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
            <h5 class="text-uppercase mb-0">Subscribe to Newsletter</h5>
            <div class="newsletter js-rollover" data-radius="50">
                <form method="GET" action="" class="newsletter-form" target="_blank">
                    <input type="hidden" name="u" value="d08fe605a9149dc54a3c13f44">
                    <input type="hidden" name="id" value="96f67efdeb">
                    <input type="email" name="EMAIL" id="email" placeholder="Enter your email" class="form-input">
                    <button type="button" class="btn btn-tcw">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="col-12 text-center">
        <a class="" href="/">
            © {{date('Y')}} The Connect Wave.
        </a>
    </div>
</footer>
<!-- jQuery (Optional, if needed for other scripts) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Bootstrap 5 JS (Includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="{{asset('tcw/js/script.js')}}"></script>
<script>
    $(document).on('click','#toggleMenu',function(e){
        $('.menu-section').toggleClass('active');
        $('.submenu-section').removeClass('active');

    });
    $(document).on('click','#shopMenu',function(e){
        $('.menu-section').toggleClass('active');
        $('.submenu-section').toggleClass('active');
    });
    $(document).on('click','.back-menu',function(e){
        $('.menu-section').toggleClass('active');
        $('.submenu-section').toggleClass('active');
    });
</script>
@stack('scripts')
</body>
</html>
