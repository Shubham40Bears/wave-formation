<x-tcw-layout>
<!-- Bootstrap Carousel -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565162/6_dpkbtp.png" class="d-block w-100" alt="Slide 1">
                <div class="carousel-text">
                    <p class="head-text mb-0">TAP. CONNECT. IMPRESS!</p>
                    <p class="sub-text">Make an impact with a smart NFC card.</p>
                    <a href="{{route('shop')}}" class="btn btn-lnk">Shop Now <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565163/5_rvclnc.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-text">
                    <p class="head-text mb-0">One Tap Can Say It All!</p>
                    <p class="sub-text">NFC cards that make sharing seamless.</p>
                    <a href="{{route('shop')}}" class="btn btn-lnk">Shop Now <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565162/2_ujjfzs.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-text">
                    <p class="head-text mb-0">Ditch the Paper, Go Digital!</p>
                    <p class="sub-text">Upgrade to NFC-powered sharing today.</p>
                    <a href="{{route('shop')}}" class="btn btn-lnk">Shop Now <i class="fa-solid fa-arrow-right-long"></i></a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <i class="fa-solid fa-arrow-left-long"></i>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <i class="fa-solid fa-arrow-right-long"></i>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
</div>
    <section class="container pt-5 pb-5 how-it-works">
        <div class="col-12 header-sec">
            <p class="heading m-0">how it <span class="head-highlight">works</span></p>
            <p class="subheading">it's simple & easy</p>
        </div>
        <div class="demo-list">
            <div class="row demoitems d-flex flex-column-reverse flex-md-row">
                <div class="col-md-6 mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="box works-box bss-card" data-link="https://res.cloudinary.com/shubhambhattacharya/video/upload/v1739740620/Elegant_Beige_Launching_Soon_Instagram_Reel_nqrakr.mp4">
                                <h4><i class="fa-solid fa-id-card-clip"></i> Business Cards</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box works-box" data-link="https://res.cloudinary.com/shubhambhattacharya/video/upload/v1739743733/Elegant_Beige_Launching_Soon_Instagram_Reel_1_bmbnx4.mp4">
                                <h4><i class="fa-solid fa-heart-circle-bolt"></i> Love Cards</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box works-box" data-link="https://res.cloudinary.com/shubhambhattacharya/video/upload/v1739992456/Elegant_Beige_Launching_Soon_Instagram_Reel_2_azzldu.mp4">
                                <h4><i class="fa-solid fa-cake-candles"></i> Birthady Cards</h4>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box works-box">
                                <h4><i class="fa-solid fa-heart-crack"></i> Breakup Cards</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 video-container">
                    <video width="" autoplay loop muted playsinline>
                        <source src="" type="video/mp4" id="demo-video">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
    </section>
    <section class="container pt-5 pb-5 lastest-products">
        <div class="col-12 header-sec">
            <p class="heading m-0"><span class="head-highlight">Latest</span> Products</p>
            <p class="subheading">Fresh Arrivals, Just for you</p>
        </div>
        <div class="container mt-4">
            <div class="row g-3">
                @foreach($latestProducts as $latestProduct)
                <div class="col-md-3">
                    <a href="{{route('shop.details',['product_slug' => $latestProduct->slug])}}" target="_blank" class="no-decor">
                        <div class="prod-cont position-relative">
                            <div class="ribbon-box">
                                <div class="ribbon ribbon-top-right">
                                    <span>₹ {{$latestProduct->sales_price ?? $latestProduct->price}}</span>
                                </div>
                            </div>
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{$latestProduct->images[0]}}" class="image-box img-fluid" alt="Image 1">
                            <div class="action-items px-2">
                                <p class="prod-name-sm">
                                    <span>{{$latestProduct->name}}</span>
                                    <span><i class="fa-regular fa-eye"></i></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- <div class="col-md-3 shop-more-block">
                    <a href="#" class="shop-more">See More<br/><i class="fa-solid fa-arrow-right-long"></i></a>
                </div> -->
            </div>
            <div class="text-center mt-3">
                <a href="{{route('shop')}}" class="btn btn-tcw">View Store <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </section>
    <section class="container pt-5 pb-5 featured-products">
        <div class="col-12 header-sec">
            <p class="heading m-0"><span class="head-highlight">Best Selling</span> Products</p>
            <p class="subheading">Most loved items from our list</p>
        </div>
        <div class="container mt-4">
            <div class="row g-3">
                @foreach($bestSellingProducts as $bestSellingProduct)
                <div class="col-md-3">
                    <a href="{{route('shop.details',['product_slug' => $bestSellingProduct->slug])}}" target="_blank" class="no-decor">
                        <div class="prod-cont position-relative">
                            <div class="ribbon-box">
                                <div class="ribbon ribbon-top-right">
                                    <span>₹ {{$bestSellingProduct->sales_price ?? $bestSellingProduct->price}}</span>
                                </div>
                            </div>
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{$bestSellingProduct->images[0]}}" class="image-box img-fluid" alt="Image 1">
                            <div class="action-items px-2">
                                <p class="prod-name-sm">
                                    <span>{{$bestSellingProduct->name}}</span>
                                    <span><i class="fa-regular fa-eye"></i></span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- <div class="col-md-3 shop-more-block">
                    <a href="#" class="shop-more">See More<br/><i class="fa-solid fa-arrow-right-long"></i></a>
                </div> -->
            </div>
            <div class="text-center mt-3">
                <a href="{{route('shop.category',['ct_slug' => 'love-cards'])}}" class="btn btn-tcw">View More <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </section>
    <section class="container pt-5 pb-5 featured-products">
        <div class="col-12 header-sec">
            <p class="heading m-0">Raving  <span class="head-highlight">Reviews </span></p>
            <p class="subheading">Praise That Speaks!</p>
        </div>
        <div class="container mt-4">
            <div id="reviewCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739988374/WhatsApp_Image_2025-02-08_at_6.27.47_PM_gbcmzy.jpg" class="d-flex" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739988366/whatsapp_chat_rohan_rr7cxr.png" class="d-flex" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739988366/whatsapp_chat_salman_clbmhf.png" class="d-flex" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                    <i class="fa-solid fa-arrow-left-long text-dark"></i>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                    <i class="fa-solid fa-arrow-right-long text-dark"></i>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="text-center mt-3">
                <a href="{{route('shop')}}" class="btn btn-tcw">Grab Yours Now!! <i class="fa-solid fa-arrow-right-long"></i></a>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        $(document).on('click','.works-box', function(){
            var video = $('video')[0];
            var source = $('#demo-video');

            source.attr('src', $(this).data('link'));
            video.load();
            video.play();

            $('.works-box').removeClass('active');
            $(this).addClass('active');
        });
        $(document).ready(function(){
            $('.bss-card').trigger('click');
        });
    </script>
    @endpush
</x-tcw-layout>