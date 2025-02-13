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
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css">
    <link rel="stylesheet" href="{{asset('tcw/css/demo.css')}}">
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
<!-- Fixed Header -->
<nav class="navbar navbar-expand-lg navbar-light no-bg fixed-top">
    <a class="navbar-brand" href="/"><img src="{{asset('theme_tcw/assets/img/logos/logo.png')}}" class="d-inline-block align-top img-fluid" alt="Logo"></a>
    <button class="navbar-toggler open-drawer" type="button">
        <i class="fas fa-stream"></i>
    </button>
</nav>

<!-- Drawer Menu -->
<div id="myDrawer" class="drawer">
    <div class="menu_item">
        <a href="/">Home</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item">
        <a href="{{route('about')}}">About</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item submenu-enable" data-toggle="shop">
        <a href="javascript:void(0)">Shop</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item">
        <a href="{{route('shop.checkout')}}">Cart</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item">
        <a href="{{route('track')}}">Track Order</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item">
        <a href="{{route('contact')}}">Help</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="bottom_menu">
        <a href="/register" class="btn btn-tcw-grad mb-2">Register</a>
        <a href="/login" class="btn btn-tcw">Login</a>
    </div>
    <div class="submenu-item shop-submenu">
        <div class="divider"></div>
        <p class="cat-menu-title">Shop by Category</p>
        <div class="menu-list">
            @foreach($cardTypes as $cardType)
                <a href="{{ route('shop.category', ['ct_slug' => $cardType->slug]) }}" class="badge badge-primary badge-tcw">{{$cardType->name}}</a>
            @endforeach
        </div>
    </div>
</div>
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
                    <input type="email" name="EMAIL" id="email" placeholder="Enter your email">
                    <button type="button" class="button">Subscribe</button>
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

<!-- Bootstrap JS and dependencies -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pixi.js/5.3.3/pixi.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Le83b4qAAAAAAANYy4UUrWaDjO8hvnpUle49HHf"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="{{asset('tcw/js/script.js')}}"></script>
@stack('scripts')
<script>
    function toggleDrawer() {
        if(document.getElementById("myDrawer").style.left === '0px'){
            document.getElementById("myDrawer").style.left ="-100%";
        } else {
            document.getElementById("myDrawer").style.left = "0";
        }
    }
    document.querySelector('.open-drawer').addEventListener('click', toggleDrawer);
    $(document).on('click','.submenu-enable', function(){
        let targetMenu = $(this).data('toggle');
        $(`.${targetMenu}-submenu`).toggleClass('active')
    });
</script>

</body>
</html>
