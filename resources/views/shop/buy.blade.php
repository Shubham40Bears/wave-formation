<x-nonauth-layout>
    <section id="checkout" class="py-5 my-5">
        @if($product)
        <div class="container">
        <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$product->name}}</h6>
                <small class="text-muted">Customizeable PVC Card x 1</small>
              </div>
              <span class="text-muted">₹ {{ number_format($product->sales_price / 1.18, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">SGST</h6>
                <small class="text-muted">Customizeable PVC Card x 1</small>
              </div>
              <span class="text-muted">₹ {{ number_format(($product->sales_price / 1.18) * 0.09, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">CGST</h6>
                <small class="text-muted">Customizeable PVC Card x 1</small>
              </div>
              <span class="text-muted">₹ {{ number_format(($product->sales_price / 1.18) * 0.09, 2) }}</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Shipping</h6>
                <small class="text-muted">Free shipping eligible</small>
              </div>
              <span class="text-muted">₹ 0</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total</span>
              <strong>₹ {{ number_format($product->sales_price, 2) }}</strong>
            </li>
          </ul>

          <form class="card p-2">
            @csrf
            <div class="input-group">
              <input type="text" class="form-control no-border" placeholder="Promo code" name="promo">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-4">Billing address</h4>
          <form class="needs-validation" novalidate method="POST" id="checkoutForm">
            <input type="hidden" name="pid" value="{{$product->id}}">
            <div class=" myt-5 form-group">
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder=" " value="" required>
                  <label for="firstName">First name</label>
              </div>
              <div class="myt-5 form-group">
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder=" " value="" required>
                  <label for="lastName">Last name</label>
              </div>
            <div class="myt-5 form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder=" ">
                <label for="email">Email</label>
            </div>
            <div class="myt-5 form-group">
                <input type="email" class="form-control" id="phone" name="phone" placeholder=" ">
                <label for="phone">Contact Number</label>
            </div>

            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="address" name="address_1" placeholder=" " required>
                <label for="address">Address</label>
            </div>

            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="address2" name="address_2" placeholder=" ">
                <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            </div>
            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="pincode" name="pincode" placeholder=" " oninput="fetchPostOffices()">
                <label for="address2">Pincode</label>
                <ul id="postOfficeSuggestions" name="postOfficeSuggestions" class="list-group position-absolute w-100" style="z-index: 1000; max-height: 200px; overflow-y: auto; display: none;">
                    <!-- Suggestions will be added dynamically -->
                </ul>
            </div>

            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="city" name="city" placeholder=" " disabled>
                <label for="address2">City</label>
            </div>
            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="state" name="state" placeholder=" " disabled>
                <label for="address2">State</label>
            </div>
            <div class="myt-5 form-group">
                <input type="text" class="form-control" id="country" name="country" placeholder=" " disabled>
                <label for="address2">Country</label>
            </div>
            <p>You will be able to login using the email provided for order tracking and other queries. Please check your email for details.</p>
            <hr class="mb-4">
            <button class="btn btn-tcw-move btn-lg btn-block" type="button" id="checkoutPay">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div>
        </div>
        @else
        <div class="container">
            <div class="row">
                <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center">
                            <img src="https://res.cloudinary.com/shubhambhattacharya/image/upload/v1735416127/cart-xmark-svgrepo-com.svg" width="130" height="auto" class="img-fluid mb-4 mr-3">
                            <h3 class="nexa-bold-font"><strong>Your Cart is Empty</strong></h3>
                            <h4 class="ext-text">Let's add something amazing today.</h4>
                            <a href="{{route('shop')}}" class="btn btn-tcw cart-btn-transform mt-3" data-abc="true">Continue shopping</a>
                            
                        
                        </div>
                </div>
            </div>
        </div>
        @endif
    </section>
    @if($product)
    @push('scripts')
    <script>
        $(document).on('click','#checkoutPay', function () {
            $(this).attr('disabled', true);
            $(this).html('<i class="fas fa-sync fa-spin"></i> Processing your order');
            const firstName = $('#firstName').val();
            const lastName = $('#lastName').val();
            const email = $('#email').val();
            axios
            .post(
                "{{ route('generateOrder') }}",
                { product: "{{ $product->id }}" },
                {
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                }
            )
            .then((response) => {
                const data = response.data;
                if (data.success) {
                    const options = {
                        key: "{{ env('RAZORPAY_KEY') }}",
                        amount: data.amount,
                        currency: "INR",
                        name: "The Connect Wave",
                        description: "Payment for {{$product->name}}",
                        order_id: data.order_id,
                        handler: function (response) {
                            localStorage.setItem('rzp_dt', JSON.stringify(response));
                            $('#checkoutForm').submit();
                        },
                        prefill: {
                            name: firstName + " " + lastName,
                            email: email,
                        },
                        theme: {
                            color: "#000000",
                        },
                    };

                    const razorpay = new Razorpay(options);
                    razorpay.open();
                } else {
                    alert("Failed to initiate payment. Please try again.");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("An error occurred while initiating payment. Please try again.");
            }).finally(() => {
                $(this).attr('disabled', false);
                $(this).html('Continue to checkout');
            });
        });

        $(document).on('submit','#checkoutForm', function(e) {
            e.preventDefault();
            $('#checkoutPay').attr('disabled', true);
            $("#checkoutPay").html('<i class="fas fa-sync fa-spin"></i> Confirming Payment');
            const formData = $(this).serializeArray();
            $(this).find('input:disabled').each(function() {
                formData.push({
                    name: $(this).attr('name'),
                    value: $(this).val(),
                });
            });
            // Get additional formData from localStorage
            const storedFormData = localStorage.getItem('formData');
            const storedData = storedFormData ? JSON.parse(storedFormData) : {};
            const rzpData = localStorage.getItem('rzp_dt') || {};

            const mergedData = {
                formData: storedFormData,
                rzpData,
                ...formData.reduce((acc, item) => {
                    acc[item.name] = item.value;
                    return acc;
                }, {}),
            };
            axios
            .post(
                "{{ route('shop.checkoutSave') }}",
                mergedData,
                {
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                }
            )
            .then((response) => {
                const data = response.data;
                if (data.success) {
                    localStorage.removeItem('formData');
                    localStorage.removeItem('rzpData');
                    window.location.pathname = "/thankyou/"+data.order_id;
                } else {
                    alert("Failed to initiate payment. Please try again.");
                }
            })
        });
        
    </script>
    @endpush
    @endif
</x-nonauth-layout>