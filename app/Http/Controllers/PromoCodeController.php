<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    public function applyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:promo_codes,code',
        ]);

        $promo = PromoCode::where('code', $request->code)->first();

        if (!$promo->isUsable()) {
            return response()->json(['message' => 'Promo code is invalid or expired'], 400);
        }

        $promo->useCode();

        return response()->json([
            'message' => 'Promo code applied successfully',
            'discount' => $promo->discount,
            'discount_type' => $promo->discount_type
        ]);
    }
}
