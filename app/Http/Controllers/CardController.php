<?php

namespace App\Http\Controllers;

use BaconQrCode\Encoder\Encoders;
use BaconQrCode\ErrorCorrectionLevel\ErrorCorrectionLevelL;
use BaconQrCode\Renderer\Image\Svg;
use BaconQrCode\Writer;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(Request $request){
        return view('card.design');
    }
}
