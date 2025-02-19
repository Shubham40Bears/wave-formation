<x-tcw-layout>
<section id="shop" class="my-5 container">
    <div class="col-12 header-sec">
        <p class="heading m-0">shop</p>
        <p class="subheading">shop from our list of premium products.</p>
    </div>
    <div class="col-12 breadcrumb">
       <p class="text-center m-0"> <a href="/">Home</a> > <a href="{{route('shop')}}">Shop</a> 
        @if(isset($cardType))
            > <a href="javascript:void(0)" class="active">{{$cardType->name}}</a>
        @endif
       </p>
    </div>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-3 justify-content-center">
            @foreach($products as $product)
            <div class="col mb-5">
                <a href="{{route('shop.details',['product_slug' => $product->slug])}}" class="prod-card-links">
                <div class="card h-100 prod-card">
                    @if($product->stock === 0)
                        <div class="sold-out-label position-absolute top-0 start-50 translate-middle-x bg-danger text-white py-1 px-3 rounded-3">
                            Sold Out
                        </div>
                    @else
                        @if($product->sales_price)
                            <!-- <div class="position-absolute top-0 start-50 translate-middle-x bg-danger text-white sale-label">SALE</div> -->
                            <div class="ribbon-box">
                                <div class="ribbon ribbon-top-right"><span>sale</span></div>
                            </div>
                        @endif
                    @endif
                    <!-- Product images-->
                     <div class="product-images d-flex">
                         @foreach($product->images as $images)
                            <img class="card-img-top prod-img" src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{$images}}" alt="{{$product->name}}">
                          @endforeach   
                     </div>
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder text-dark">{{$product->name}}</h5>
                            <small class="text-dark">{!! Str::limit(strip_tags($product->description), 135, '...') !!}</small>
                            <br/>
                            <small class="text-dark">Material Type: {{$product->category->name}}</small>
                            <!-- Product price-->
                            <!-- Product price with regular price struck out and sale price displayed-->
                            @if($product->sales_price) 
                                <p class="mt-2">
                                    <del class="text-muted">₹{{ number_format($product->regular_price, 2) }}</del> 
                                    <span class="text-success">₹{{ number_format($product->sales_price, 2) }}</span>
                                </p>
                            @else
                                <p>₹{{ number_format($product->regular_price, 2) }}</p>
                            @endif
                        </div>
                    </div>
                    <!-- Product actions-->
                     @if($product->stock > 0)
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent d-flex justify-content-between align-items-center">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('shop.details',['product_slug' => $product->slug])}}"><i class="fas fa-eye"></i></a></div>
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#"><i class="far fa-heart"></i></a></div>
                        <div class="text-center w-65"><a class="btn btn-dark mt-auto w-100" href="{{route('shop.product.custom',['product_slug' => $product->slug])}}">Buy Now</a></div>
                    </div>
                    @else
                        <p class="no-stock text-center">Out of stock</p>
                    @endif
                </div>
            </a>
            </div>
            @endforeach
        </div>
        <nav aria-label="Page navigation example" class="pagination-container">
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($products->onFirstPage())
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-arrow-left-long"></i></span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true"><i class="fa-solid fa-arrow-left-long"></i></span>
                        </a>
                    </li>
                @endif

                <!-- Page Number Links -->
                @foreach ($products->links()->elements[0] as $page => $url)
                    <li class="page-item {{ $products->currentPage() == $page ? 'active' : '' }}">
                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                <!-- Next Page Link -->
                @if ($products->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true"><i class="fa-solid fa-arrow-right-long"></i></span>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link"><i class="fa-solid fa-arrow-right-long"></i></span>
                    </li>
                @endif
            </ul>
        </nav>

    </div>
</section>
@push('scripts')
<script>
if($('#shop .product-images').length > 0){
		$('.product-images').each(function () {
			const container = $(this); // The container with overflow hidden
			const images = container.find('.prod-img'); // Images inside the container
			let currentIndex = 0;
	
			function scrollNextImage() {
				// Calculate the scroll position for the next image
				const scrollWidth = container[0].scrollWidth / images.length; // Width of each image
				currentIndex = (currentIndex + 1) % images.length;
	
				// Scroll to the calculated position
				container.animate({ scrollLeft: currentIndex * scrollWidth }, 500); // Smooth scroll
			}
	
			// Start scrolling every 3 seconds
			setInterval(scrollNextImage, 3000);
		});
	}
</script>
@endpush
</x-tcw-layout>