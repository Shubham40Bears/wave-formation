<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $latestProducts = Product::orderBy('created_at', 'desc')->paginate(4);
        $cardType = CardType::where('slug', 'love-cards')->firstOrFail();
        $bestSellingProducts = Product::where('card_type_id', $cardType->id)
            ->orderBy('updated_at', 'DESC')
            ->paginate(4);
        return view('home', compact('latestProducts','bestSellingProducts'));
    }
    public function about(){
        return view('pages.about');
    }
    public function contact(){
        return view('pages.contact');
    }

    public function terms(){
        return view('pages.terms');
    }
    public function cancellation(){
        return view('pages.cancellation');
    }
    public function shipping(){
        return view('pages.shipping');
    }
    public function privacy(){
        return view('pages.privacy');
    }
}
