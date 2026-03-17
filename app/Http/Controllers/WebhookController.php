<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    /**
     * Meta requires a GET request to verify the webhook URL.
     */
    public function verify(Request $request)
    {
        $verifyToken = 'your_custom_verify_token_here'; // Set this to any string you want

        if ($request->query('hub_mode') == 'subscribe' && 
            $request->query('hub_verify_token') == $verifyToken) {
            return response($request->query('hub_challenge'), 200);
        }

        return response('Invalid token', 403);
    }

    /**
     * Meta sends a POST request with the actual message status.
     */
    public function handle(Request $request)
    {
        $data = $request->all();

        // Log the full response so we can see the "Error Code"
        Log::info('WhatsApp Webhook Received:', $data);

        // Check for specific delivery failures
        if (isset($data['entry'][0]['changes'][0]['value']['statuses'])) {
            $status = $data['entry'][0]['changes'][0]['value']['statuses'][0];
            
            if ($status['status'] === 'failed') {
                Log::error('WhatsApp Delivery Failed!', [
                    'recipient' => $status['recipient_id'],
                    'error' => $status['errors'][0]['message'] ?? 'Unknown Error',
                    'code' => $status['errors'][0]['code'] ?? 'No Code'
                ]);
            }
        }

        return response('EVENT_RECEIVED', 200);
    }
}
