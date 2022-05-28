<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $total_keranjang = 0;

    protected $listeners = [
        'masukKeranjang' => 'updateKeranjang'
    ];

    public function updateKeranjang()
    {
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($order) {
                $this->total_keranjang = OrderDetail::where('order_id', $order->id)->count();
            } else {
                $this->total_keranjang = 0;
            }
        }
    }

    public function mount()
    {
        if (Auth::user()) {
            $order = Order::where('user_id', Auth::user()->id)->where('status', 0)->first();
            if ($order) {
                $this->total_keranjang = OrderDetail::where('order_id', $order->id)->count();
            } else {
                $this->total_keranjang = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            'brands' => Brand::all(),
            'total_keranjang' => $this->total_keranjang,
        ]);
    }
}