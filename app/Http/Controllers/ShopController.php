<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\CardType;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\RazorpayResponse;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Razorpay\Api\Api;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    public function index(){
        // Fetch paginated products
        $products = Product::orderBy('updated_at', 'DESC')->paginate(10);
        // dd($products);

        // Return the view with paginated products
        return view('shop.shop', compact('products'));
    }
    public function getByCardType($cardTypeSlug){
        $cardType = CardType::where('slug', $cardTypeSlug)->firstOrFail();

        $products = Product::where('card_type_id', $cardType->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);
        return view('shop.shop', compact('products','cardType'));
    }
    public function productDetails(Request $request, $product_slug){
        // Fetch paginated products
        $product = Product::where('slug', $product_slug)->first();
        $relatedProducts = Product::where('card_type_id', $product->card_type_id)
            ->where('id', '!=', $product->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(4);
        // Return the view with paginated products
        return view('shop.productDetails', compact('product','relatedProducts'));
    }
    public function customiseCard(Request $request, $product_slug){
        // Fetch paginated products
        $product = Product::where('slug', $product_slug)->first();
        if ($product) {
            // Add the product ID to the session
            session(['product_id' => $product->id, 'slug' => $product_slug]);
        }
        // Return the view with paginated products
        return view('shop.customiseProduct', compact('product'));
    }

    public function checkout() {
        $product_slug = session('slug');
        $product = Product::where('slug', $product_slug)->first();
        return view('shop.buy', compact('product'));
    }
    public function checkoutSave(Request $request) {
        $product = Product::findOrFail($request->pid);
        // Create user if not exists
        $user = User::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->firstName.' '.$request->lastName,
                'password' => (string) Str::uuid()
            ]
        );

        // Create user address
        $userAddress = UserAddress::create([
            'user_id' => $user->id, // Assuming the user is authenticated
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'phone' => $request->phone
        ]);

        // Create order
        $order = Order::create([
            'order_id' => Order::generateOrderId(),
            'user_id' => $user->id,
            'product_id' => $product->id,
            'order_data' => $request->formData,
            'status' => Order::STATUS_PROCESSING, // Use the enum value
            'amount' => $product->sales_price ? $product->sales_price : $product->regular_price,
            'address_id' => $userAddress->id
        ]);

        // Create rzp data
        $rzpData = json_decode($request->rzpData);
        $paymentData = new RazorpayResponse();
        $paymentData->order_id = $order->id;
        $paymentData->razorpay_order_id = $rzpData->razorpay_order_id;
        $paymentData->razorpay_payment_id = $rzpData->razorpay_payment_id;
        $paymentData->razorpay_signature = $rzpData->razorpay_signature;
        $paymentData->response_data = $rzpData;
        $paymentData->save();

        // Save order status as processing
        OrderStatus::create([
            'order_id' => $order->id,
            'status' => Order::STATUS_PROCESSING,
            'remarks' => 'Order has been created and is being processed.',
            'status_updated_at' => now(),
        ]);

        Mail::to($user->email)->send(new OrderConfirmation($order));

        return response()->json([
            'success' => true,
            'order_id' => $order->order_id,
        ]); 

    }

    public function generateOrder(Request $request) {
        $productId = $request->product;

        // Get product by ID
        $product = Product::findOrFail($productId);
        $amount = $product->sales_price ? $product->sales_price : $product->regular_price;
        $amount = (float) $amount * 100; // Convert to paise
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $order = $api->order->create([
                'amount' => $amount, // Amount in paise
                'currency' => 'INR',
                'receipt' => 'rcpt_'.Carbon::now().'_tcw',
                'payment_capture' => 1,
            ]);
            
            
            return response()->json([
                'success' => true,
                'order_id' => $order->id,
                'amount' => $amount,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function thankyou(Request $request, $order_id) {
        session()->forget(['product_id', 'slug']);
        $order = Order::where('order_id', $order_id)->first();
        return view('thankyou', compact('order'));
    }
}
