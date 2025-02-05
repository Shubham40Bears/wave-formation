<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View {
        $user = Auth::user();
        $orders = $user->orders;
        return view('dashboard', compact('orders'));
    }
}
