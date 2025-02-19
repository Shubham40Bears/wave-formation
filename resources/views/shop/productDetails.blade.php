<x-tcw-layout :image="'https://res.cloudinary.com/shubhambhattacharya/image/upload/'.$product->images[0]"
:title="$product->name" :description="$product->description">
    <section id="" class="py-5 my-5">
        <div class="container">
		<div class="card single-prod-card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-4">
							<div class="preview-pic tab-content">
								@foreach($product->images as $index => $image)
									<div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="pic-{{ $index + 1 }}">
										<img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{ $image }}" class="img-fluid" />
									</div>
								@endforeach   
							</div>

							<ul class="preview-thumbnail nav nav-tabs mt-3">
								@foreach($product->images as $index => $image)
									<li class="nav-item">
										<a class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab" href="#pic-{{ $index + 1 }}">
											<img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/w_150,h_150,c_thumb/{{ $image }}" class="img-thumbnail" />
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$product->name}}</h3>
						<!-- <div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div> -->
						<p class="product-description">{!! $product->description !!}</p>
						<p class="product-description">Category: {{$product->cardType->name}}</p>
						<p class="product-description">Material: {{$product->category->name}}</p>
						<p class="product-description">Customizeable: Yes</p>
						@if($product->sales_price) 
                                <p class="mt-2">
                                    <del class="text-muted">₹{{ number_format($product->regular_price, 2) }}</del> 
                                    <span class="text-success">₹{{ number_format($product->sales_price, 2) }}</span>
                                </p>
                            @else
                                <p>₹{{ number_format($product->regular_price, 2) }}</p>
                            @endif
						<!-- <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p> -->
						
						<div class="action d-flex">
							<a class="btn btn-tcw w-80 text-uppercase w-100" href="{{route('shop.product.custom',['product_slug' => $product->slug])}}">buy now</a>
							<!-- <a class="btn btn-tcw sm-btn w-15" href="#"><span class="fa fa-heart"></span></a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="container pt-5 pb-5 featured-products">
        <div class="col-12 header-sec">
            <p class="heading m-0"><span class="head-highlight">Related</span> Products</p>
            <p class="subheading">You may also like</p>
        </div>
        <div class="container mt-4">
            <div class="row g-3">
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-3">
                    <a href="{{route('shop.details',['product_slug' => $relatedProduct->slug])}}" target="_blank" class="no-decor">
                        <div class="prod-cont position-relative">
                            <div class="ribbon-box">
                                <div class="ribbon ribbon-top-right">
                                    <span>₹ {{$relatedProduct->sales_price ?? $relatedProduct->price}}</span>
                                </div>
                            </div>
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{$relatedProduct->images[0]}}" class="image-box img-fluid" alt="Image 1">
                            <div class="action-items px-2">
                                <p class="prod-name-sm">
                                    <span>{{$relatedProduct->name}}</span>
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
</x-tcw-layout>