<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class History extends Component
{
    public $orders;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('login');
        }
        $this->orders = Order::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
    }


    public function render()
    {


        return view('livewire.history');
    }
}