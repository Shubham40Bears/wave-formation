<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\VcfProfileData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function track(Request $request, $orderId = null) {
        return view('shop.track', compact('orderId'));
    }
    public function updateOrderStatus(Order $order, string $status) {
        OrderStatus::create([
            'order_id' => $order->id,
            'status' => $status,
            'remarks' => 'Order has been created and is being processed.',
            'status_updated_at' => now(),
        ]);
    }

    public function trackOrder(Request $request, $orderId) {
        $order = Order::where('order_id', $orderId)->first();
        if ($order) {
            return response()->json([
                'success' => true,
                'order' => $order,
                'orderStatus' => $order->statuses,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Order not found.',
        ], 404);
    }

    public function generateVcfProfile($orderId) {
        $order = Order::find($orderId);
        if (!$order) {
            return ['success' => false, 'message' => 'Order not found'];
        }

        $orderData = json_decode($order->order_data);
            switch ($orderData->ps) {
                case 'love-cards':
                    $firstName = $orderData->yourName;
                    $lastName = $orderData->partnerName;
                    $profileDescription = $orderData->shortMessage;
                    $cardType = 'love';
                    $formattedImages = array_map(function ($url, $index) {
                        return [
                            'order' => $index + 1,
                            'url' => $url,
                        ];
                    }, $orderData->galleryImages, array_keys($orderData->galleryImages));
                    break;
                case 'birthday-cards':
                    $firstName = $orderData->recevierName;
                    $lastName = $orderData->senderName;
                    $profileDescription = $orderData->message;
                    $cardType = 'birthday';
                    $formattedImages = array_map(function ($url, $index) {
                        return [
                            'order' => $index + 1,
                            'url' => $url,
                        ];
                    }, $orderData->galleryImages, array_keys($orderData->galleryImages));
                    
                    break;
                
                default:
                    # code...
                    break;
            }
            try{
                VcfProfileData::create([
                    'profile_code' => (string) Str::uuid(),
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'profile_description' => $profileDescription,
                    'status' => 'active',
                    'card_type' => $cardType,
                    'photo_url' => $orderData->displayPicture[0],
                    'gallery' => $formattedImages,
                    'user_id' => $order->user_id,
                    'sns_links' => '',
                    'vcf' => 0,
                    'contact_number' => 0
                ]);
            } catch (\Exception $e) {
                Log::error('Error saving VcfProfileData:', [
                    'message' => $e->getMessage(),
                    'trace' => $e->getTraceAsString(),
                ]);
                return ['success' => false, 'message' => 'Order not found'];
            }

        return ['success' => true, 'message' => 'Profile generated successfully'];
    }
}
