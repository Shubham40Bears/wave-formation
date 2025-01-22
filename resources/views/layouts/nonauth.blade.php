<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'The Connect Wave') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{asset('tcw/css/demo.css')}}">
</head>
<body>

<!-- Fixed Header -->
<nav class="navbar navbar-expand-lg navbar-light no-bg fixed-top">
    <a class="navbar-brand" href="#"><img src="{{asset('theme_tcw/assets/img/logos/logo.png')}}" class="d-inline-block align-top img-fluid" alt="Logo"></a>
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
    <div class="menu_item">
        <a href="{{route('shop')}}">Shop</a>
        <i class="fas fa-long-arrow-alt-right"></i>
    </div>
    <div class="menu_item">
        <a href="{{route('shop.checkout')}}">Cart</a>
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
                    B 701, Treasure Island Socitey, <br/>
                    Pimple Saudagar, Pune.
                    Pin Code: 411027
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
</script>

</body>
</html>
