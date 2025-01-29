<?php

namespace App\View\Components;

use App\Models\CardType;
use Illuminate\View\Component;
use Illuminate\View\View;

class NonauthLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $cardTypes = CardType::orderBy('created_at', 'desc')->get();
        return view('layouts.nonauth', compact('cardTypes'));
    }
}
