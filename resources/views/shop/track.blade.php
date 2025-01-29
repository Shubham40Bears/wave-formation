<x-nonauth-layout title="Track you order | The Connect Wave">
    <section id="checkout" class="py-5 my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 header-sec">
                    <p class="heading m-0">Track your order</p>
                    <p class="subheading">Enter your Order id received over email</p>
                </div>
                <div class="col-lg-12">
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control no-border" placeholder="Order ID" id="orderId" value="{{$orderId ? $orderId : ''}}">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-secondary" id="trackOrder">Track</button>
                            </div>
                            
                        </div>
                    </form>
                    <div><p class="text-danger text-center mt-3" id="errorsec"></div>
                    <div class="tracking-info mt-4 d-none">
                    <div class="timeline">
                            <!-- Step 1 -->
                            <div class="timeline-step completed" id="placed">
                                <div class="timeline-badge"><i class="fas fa-check"></i></div>
                                <div class="timeline-content">
                                <h5>Order Placed</h5>
                                <p class="text-muted">Your order has been successfully placed.</p>
                                </div>
                            </div>
                            <div class="timeline-step" id="processing">
                                <div class="timeline-badge"><i class="fas fa-check"></i></div>
                                <div class="timeline-content">
                                <h5>Order Processing</h5>
                                <p class="text-muted">We are processing your order and we will ship it in 24 hours.</p>
                                </div>
                            </div>
                            <!-- Step 2 -->
                            <div class="timeline-step" id="packed">
                                <div class="timeline-badge"><i class="fas fa-box"></i></div>
                                <div class="timeline-content">
                                <h5>Order Packed</h5>
                                <p class="text-muted">Your order is packed and ready for shipment.</p>
                                </div>
                            </div>
                            <!-- Step 3 -->
                            <div class="timeline-step" id="shipped">
                                <div class="timeline-badge"><i class="fas fa-shipping-fast"></i></div>
                                <div class="timeline-content">
                                <h5>Shipped</h5>
                                <p class="text-muted">Your order is on its way to the delivery address.</p>
                                </div>
                            </div>
                            <!-- Step 4 -->
                            <div class="timeline-step" id="outfordelivery">
                                <div class="timeline-badge"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="timeline-content">
                                <h5>Out for Delivery</h5>
                                <p class="text-muted">Your order is out for delivery.</p>
                                </div>
                            </div>
                            <!-- Step 5 -->
                            <div class="timeline-step" id="completed">
                                <div class="timeline-badge"><i class="far fa-check-circle"></i></div>
                                <div class="timeline-content">
                                <h5>Delivered</h5>
                                <p class="text-muted">Your order has been delivered.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
        $(document).on('ready', function () {
            const orderId = $('#orderId').val();
            if(orderId.length > 0){
                $('#trackOrder').click();
            }
        });
        $(document).on('click','#trackOrder', function() {
            const orderId = $('#orderId').val();
            $(this).html('<i class="fas fa-circle-notch fa-spin"></i>');
            $('#errorsec').html('');
            axios.get(`/api/track/order/${orderId}`)
                .then(function(response) {
                    $('.timeline-step').removeClass('completed');
                    $('#placed').addClass('completed');
                    const trackResponse = response.data;
                    $.each(trackResponse.orderStatus, function(index, orderStatusData) {
                        $(`#${orderStatusData.status}`).addClass('completed');
                    });
                    $('.tracking-info').removeClass('d-none');
                    $('#trackOrder').html('Track');
                }).catch(function(error){
                    $('#trackOrder').html('Track');
                    if(error.status === 404){
                        $('#errorsec').html('Order Not found, please try with a valid Order Id')
                    } else {
                        $('#errorsec').html('Something went wrong, Please try again later')
                    }
                });
        });
    </script>
    @endpush
</x-nonauth-layout>