<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'brands' => Brand::take(4)->get(),
            'products' => Product::take(4)->get()
        ]);
    }
}