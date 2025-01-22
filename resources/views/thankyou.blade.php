<x-nonauth-layout>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="border border-3 border-success"></div>
            <div class="card  bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="75" height="75"
                        fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Thank You !</h1>
                    <p>We've received your order for <strong>{{$order->product->name}}</strong> with order id: <strong>{{$order->order_id}}</strong> and starting to process it.</p>
                    <p>Your payment id for this order is <strong>{{$order->payments()->first()->razorpay_payment_id}}</strong></p>
                    <p>You can track your order by clicking <a>here</a>.</p>
                    <p>We have sent you an email with the order and tracking details</p>
                    <p>For any queries write to us at <a href="mailto: support@theconnectwave.com">support@theconnectwave.com</a> or call us at <a href="tel:+918208935473">+91 820 893 5473</a></p>
                    <button class="btn btn-outline-success">Login</button>
                    <button class="btn btn-outline-success">Track without Login</button>
                </div>
            </div>
        </div>
    </div>
</x-nonauth-layout>