<x-nonauth-layout>
<section id="shop" class="py-5 my-5">
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
                <div class="card h-100 prod-card">
                    @if($product->stock === 0)
                        <div class="sold-out-label position-absolute top-0 start-50 translate-middle-x bg-danger text-white py-1 px-3 rounded-3">
                            Sold Out
                        </div>
                    @else
                        @if($product->sales_price)
                            <!-- <div class="position-absolute top-0 start-50 translate-middle-x bg-danger text-white sale-label">SALE</div> -->
                            <div class="box">
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
                            <h5 class="fw-bolder">{{$product->name}}</h5>
                            <small>{{$product->description}}</small>
                            <br/>
                            <small>Material Type: {{$product->category->name}}</small>
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
                        <p class="no-stock">Out of stock</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
        </section>
</x-nonauth-layout>