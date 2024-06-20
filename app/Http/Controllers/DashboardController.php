<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View {
        return view('dashboard',[
            'totalUsageCount' => Auth()->user()->usageHistories->count(),
            'totalCards' => Auth()->user()->cards->count(),
            'availableCards' => CardType::all()
        ]);
    }
}
