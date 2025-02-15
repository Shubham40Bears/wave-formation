<x-tcw-layout>
<!-- Bootstrap Carousel -->
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565162/6_dpkbtp.png" class="d-block w-100" alt="Slide 1">
                <div class="carousel-text">
                    <p class="head-text">Text goes here</p>
                    <a type="button" class="btn btn-lnk">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565163/5_rvclnc.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-text">
                    <p class="head-text">Text goes here</p>
                    <a type="button" class="btn btn-lnk">Shop Now</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1739565162/2_ujjfzs.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-text">
                    <p class="head-text">Text goes here</p>
                    <a type="button" class="btn btn-lnk">Shop Now</a>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>

        <!-- Carousel Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
        </div>
    </div>
    @push('scripts')
    <script>
        
    </script>
    @endpush
</x-tcw-layout>