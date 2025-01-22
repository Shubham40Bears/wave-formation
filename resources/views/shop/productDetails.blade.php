<x-nonauth-layout>
    <section id="" class="py-5 my-5">
        <div class="container">
		<div class="card single-prod-card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
                          @foreach($product->images as $images)
                            <div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="pic-{{ $loop->index + 1 }}"><img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/{{$images}}" /></div>
                          @endforeach   
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
                          @foreach($product->images as $images)
                                <li class="{{ $loop->first ? 'active' : '' }}"><a data-target="#pic-{{ $loop->index + 1 }}" data-toggle="tab"><img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/w_150,h_150,c_thumb/{{$images}}" /></a></li>
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
						<p class="product-description">{{$product->description}}</p>
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
						
						<div class="action">
							<a class="btn btn-tcw w-80 text-uppercase" href="{{route('shop.product.custom',['product_slug' => $product->slug])}}">buy now</a>
							<a class="btn btn-tcw sm-btn w-15" href="#"><span class="fa fa-heart"></span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-nonauth-layout>